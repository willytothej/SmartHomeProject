package com.phidgets.functions;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;
import java.util.Timer;
import java.util.TimerTask;

import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.client.HttpClient;
import org.apache.http.client.methods.HttpGet;
import org.apache.http.impl.client.HttpClientBuilder;
import org.json.JSONArray;
import org.json.JSONObject;

import com.phidgets.Phidget;
import com.phidgets.PhidgetException;
import com.phidgets.RFIDPhidget;
import com.phidgets.event.AttachEvent;
import com.phidgets.event.AttachListener;
import com.phidgets.event.DetachEvent;
import com.phidgets.event.DetachListener;
import com.phidgets.event.TagGainEvent;
import com.phidgets.event.TagGainListener;
import com.phidgets.event.TagLossEvent;
import com.phidgets.event.TagLossListener;

public class RFIDReader implements TagLossListener, TagGainListener 
{
	// URL of sensor server
	
	RFIDPhidget phid;
	int houseid ;
	int userid ;
	String stringkey;
	
	static String Globalurl = "http://fluidityhome.azurewebsites.net/api/Service/PhidgetServer/readRFID.php";
	
    public RFIDReader() throws PhidgetException
    {
		houseid = GlobalUser.RetrieveHouseID();
		userid = GlobalUser.RetrieveUserID();
		stringkey = GlobalUser.RetrieveStringKey();
		
        phid = new RFIDPhidget();
        
        try {
            System.out.println("Loading driver...");
            Class.forName("com.mysql.jdbc.Driver");
            System.out.println("Driver loaded!");
        } catch (ClassNotFoundException e) {
            throw new RuntimeException(
                    "Cannot find the driver in the classpath!", e);
        }
        System.out.println("waiting for RFID attachment...");
        System.out.println(Phidget.getLibraryVersion());
        System.out.println("call check");      
        
        
	    phid.addTagLossListener(this);
	    phid.addTagGainListener(this);
        phid.addDetachListener(new DetachListener()
        {
			public void detached(DetachEvent arg0) {
				System.out.println("The RFID is now detatched!");	
			}	
        });
	    
        phid.addAttachListener(new AttachListener()
        {

			public void attached(AttachEvent arg0) {
				System.out.println("The RFID is now attached!");
			}
        	
        }
);
        phid.openAny();
        phid.waitForAttachment();

        System.out.println(phid.getDeviceType());
        System.out.println("Serial Number " + phid.getSerialNumber());
        System.out.println("Device Version " + phid.getDeviceVersion());
        System.out.println("Attached " + phid.isAttached());
        phid.setAntennaOn(true);

        // sleeping around, just to avoid the program finishing
        while (true)
            try {
                Thread.sleep(1000);
            } catch (Throwable t) {
                t.printStackTrace();
            }
    }

    
    public void tagLost(TagLossEvent arg0) {
        System.out.println(arg0);
    }

    public void tagGained(TagGainEvent arg0) {
        System.out.println(arg0);
        final String tagValue = arg0.getValue();
        
        new Thread(new Runnable() {
            public void run() {
                uploadSensorValue(tagValue,houseid);
            }
        }).start();
        
       // uploadSensorValue(tagValue,houseid);
    }
    
    public static String uploadSensorValue(String sensorValue, int houseid){
        URL url;
        HttpURLConnection conn;
        BufferedReader rd;
        String fullURL = Globalurl + "?houseid=" + houseid + "&cardid="+sensorValue + "&loginstring="+sensorValue + "&userid="+sensorValue;
        System.out.println("DEBUG: Sending data to: "+fullURL);
       
        String line = "";
        String result = ""  ;
        try {
           url = new URL(fullURL);
           conn = (HttpURLConnection) url.openConnection();
           conn.setRequestMethod("GET");
           rd = new BufferedReader(new InputStreamReader(conn.getInputStream()));

           int i = 0;
           while ((line = rd.readLine()) != null) {
               result += line;
               i++;
           }
           rd.close();
           
           JSONArray arr = new JSONArray(result);
           JSONObject jObj = arr.getJSONObject(0);
           String a = arr.getJSONObject(0).getString("LoginSuccess");
           System.out.println("DEBUG: Response line from server > " + a );
        } catch (Exception e) {
           e.printStackTrace();
        }
       
    return "Done";
    }
       
}
