package com.phidgets.functions;

import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;

import com.phidgets.*;
import com.phidgets.event.*;

public class OpenIFKit
{
	private static String sensorServerURL = "http://fluidityhome.azurewebsites.net/api/Service/PhidgetServer/Phidgets.php";
	private static int portUpdating = 0;
	public static void main(String[] args) throws Exception {
		InterfaceKitPhidget ik;
		
		final int houseid = GlobalUser.RetrieveHouseID();
		final int userid = GlobalUser.RetrieveUserID();
		final String stringKey = GlobalUser.RetrieveStringKey();
	
		System.out.println(Phidget.getLibraryVersion());

		final int[] valueArray = {0,0,0,0,0,0,0,0};
		
		ik = new InterfaceKitPhidget();
		ik.addAttachListener(new AttachListener() {
			public void attached(AttachEvent ae) {
				System.out.println("attachment of " + ae);
			}
		});
		ik.addDetachListener(new DetachListener() {
			public void detached(DetachEvent ae) {
				System.out.println("detachment of " + ae);
				
			}
		});
		ik.addErrorListener(new ErrorListener() {
			public void error(ErrorEvent ee) {
				System.out.println(ee);
			}
		});
		ik.addInputChangeListener(new InputChangeListener() {
			public void inputChanged(InputChangeEvent oe) {
				System.out.println(oe);
			}
		});
		ik.addOutputChangeListener(new OutputChangeListener() {
			public void outputChanged(OutputChangeEvent oe) {
				System.out.println(oe);
			}
		});
		
		
		
		ik.addSensorChangeListener(new SensorChangeListener() {
			public void sensorChanged(SensorChangeEvent se) {
				int temphigh = se.getValue() + 100;
				int templow = se.getValue() - 100;
				System.out.println(se.getIndex() + " : " + se.getValue() + " : " + temphigh + " : " + templow);
				if(se.getIndex() == 3 || se.getIndex() == 6){
				if(temphigh < valueArray[se.getIndex()] || templow > valueArray[se.getIndex()])
					{
					int portNumber = se.getIndex() + 1;
					if(portUpdating ==0)
					{
						uploadPhidgetsValue(portNumber,se.getValue(),houseid, userid, stringKey);
					}
					}
				}
				else
				{
					int portNumber = se.getIndex() + 1;
					if(portUpdating ==0)
					{
						uploadPhidgetsValue(portNumber,se.getValue(),houseid, userid, stringKey);
					}
				}
				valueArray[se.getIndex()] = se.getValue();
			}	
		});
		
		
		ik.openAny();
		System.out.println("waiting for InterfaceKit attachment...");
		ik.waitForAttachment();

		System.out.println(ik.getDeviceName());

		Thread.sleep(500);

		if (ik.getInputCount() > 8)
			System.out.println("input(7,8) = (" +
			  ik.getInputState(7) + "," +
			  ik.getInputState(8) + ")");
		for (int j = 0; j < 1000 ; j++) {
			for (int i = 0; i < ik.getOutputCount(); i++) {
				
				ik.setOutputState(i, true);
				
			}
			for (int i = 0; i < ik.getOutputCount(); i++)
				ik.setOutputState(i, false);
		}
		
	}
	
	public static void uploadPhidgetsValue(int port, int value, int housdID, int userid, String stringKey)
	{
		portUpdating = 1;
		URL url;
		HttpURLConnection conn;
		BufferedReader rd;
		 
		String fullURL = sensorServerURL + "?port=" + port + "&value=" + value + "&userid=" + userid+ "&houseid=" + userid+ "&loginstring=" + stringKey;
		System.out.println("DEBUG: Sending data to: "+fullURL);
        try {
            url = new URL(fullURL);
            conn = (HttpURLConnection) url.openConnection();
            conn.setRequestMethod("GET");
            rd = new BufferedReader(new InputStreamReader(conn.getInputStream()));
            rd.close();
         } catch (Exception e) {
            e.printStackTrace();
         }
       portUpdating = 0;
	}
	
}
