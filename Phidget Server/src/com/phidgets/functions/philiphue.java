package com.phidgets.functions;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.OutputStreamWriter;
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

public class philiphue {
	
	static String url = "http://fluidityhome.azurewebsites.net//api/Service/PhidgetServer/DeviceStatus.php";
	
	public static void main(String[] args) throws Exception {
		Timer timer3 = new Timer();
		MyTimerTask3 myTimerTask3 = new MyTimerTask3();
	    timer3.schedule(myTimerTask3, 0, 3000);
	}
	
	static class MyTimerTask3 extends TimerTask
    {
		public void run() {
			int HouseID = GlobalUser.RetrieveHouseID();
			int UserID = GlobalUser.RetrieveUserID();
			String StringKey = GlobalUser.RetrieveStringKey();
			
			
			System.out.println("Checking Status for Motor");
			  HttpClient httpclient = HttpClientBuilder.create().build();
	            HttpGet httpget = new HttpGet(url + "?HouseID=" + HouseID + "&loginstring=" + StringKey + "&userid=" + UserID ); 
	            HttpResponse response;
	            try 
	            {
	                response = httpclient.execute(httpget);
	                HttpEntity entity = response.getEntity();
	                if (entity != null) {
	                      InputStream instream = entity.getContent();
	                     
	                      String result= convertStreamToString(instream);
	                      JSONArray arr = new JSONArray(result);
	                      System.out.println(arr.length());
	                      
	                      for(int i = 0; i < 12; i++){
	                    	  
	                    	  JSONObject jObj = arr.getJSONObject(i);
	                    	  
	                    	  System.out.println(i + "  " + jObj.getInt("DeviceID")  + " " + jObj.getInt("Status")+ jObj.getInt("Status"));
	                    	  if (jObj.getInt("HouseID") == HouseID) {
								if (jObj.getInt("DeviceID") == 8) {
					  	          	if(jObj.getInt("Status") == 1)
					  	          	{
					  	          	 URL url = new URL("http://192.168.0.2/api/newdeveloper/lights/3/state");
					  	          	 HttpURLConnection connection = (HttpURLConnection) url.openConnection();
					  	          	 connection.setRequestMethod("PUT");
					  	          	 connection.setDoOutput(true);
					  	          	 connection.setRequestProperty("Content-Type", "application/json");
					  	          	 connection.setRequestProperty("Accept", "application/json");
					  	          	 OutputStreamWriter osw = new OutputStreamWriter(connection.getOutputStream());
					  	          	 osw.write(String.format("{\"on\":true}"));
					  	          	 osw.flush();
					  	          	 osw.close();
					  	          	 System.err.println(connection.getResponseCode());
					  	          	}
					  	          	else if(jObj.getInt("Status") == 0)
					  	          	{
					  	           URL url = new URL("http://192.168.0.2/api/newdeveloper/lights/3/state");
					  	           HttpURLConnection connection = (HttpURLConnection) url.openConnection();
					  	           connection.setRequestMethod("PUT");
					  	           connection.setDoOutput(true);
					  	           connection.setRequestProperty("Content-Type", "application/json");
					  	           connection.setRequestProperty("Accept", "application/json");
					  	           OutputStreamWriter osw = new OutputStreamWriter(connection.getOutputStream());
					  	           osw.write(String.format("{\"on\":false}"));
					  	           osw.flush();
					  	           osw.close();
					  	           System.err.println(connection.getResponseCode());
					  	          		
					  	          	}
								}
								else
								{
								
								}
							}
	                          
						}
	                      instream.close();
	                }
	            }catch (Exception e) {
	        }
		}
	
    }

	private static String convertStreamToString(InputStream instream) {
    BufferedReader reader = new BufferedReader(new InputStreamReader(instream));
    StringBuilder sb = new StringBuilder();
    String line = null;
    try {
        while ((line = reader.readLine()) != null) {
            sb.append(line + "\n");
        }
    } catch (IOException e) {
        e.printStackTrace();
    } finally {
        try {
            instream.close();
        } catch (IOException e) {
            e.printStackTrace();
        }
    }
    return sb.toString();
}   	
	
}
