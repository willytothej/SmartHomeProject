package com.phidgets.functions;
import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.util.Timer;
import java.util.TimerTask;

import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.client.HttpClient;
import org.apache.http.client.methods.HttpGet;
import org.apache.http.impl.client.HttpClientBuilder;
import org.json.JSONArray;
import org.json.JSONObject;

import com.phidgets.*;
import com.phidgets.event.*;

public class Motor  
{		
		static String url = "http://fluidityhome.azurewebsites.net/api/Service/PhidgetServer/DeviceStatus.php";
		static Timer timer2;
		static MyTimerTask2 myTimerTask2;
		
		public static double position;
		private static AdvancedServoPhidget servo;
		public static int servomotor1;
		
		public static final void main(String args[]) throws Exception {

		System.out.println(Phidget.getLibraryVersion());

		
		servo = new AdvancedServoPhidget();
		 servo.addAttachListener(new AttachListener() {
			public void attached(AttachEvent ae) {
				System.out.println("attachment of " + ae);
			}
		});
		servo.addDetachListener(new DetachListener() {
			public void detached(DetachEvent ae) {
				System.out.println("detachment of " + ae);
				try {
					servo.close();
				} catch (PhidgetException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}
			}
		});
		servo.addErrorListener(new ErrorListener() {
			public void error(ErrorEvent ee) {
				System.out.println("error event for " + ee);
			}
		}); 
		
		servo.addServoPositionChangeListener(new ServoPositionChangeListener(){
			public void servoPositionChanged(ServoPositionChangeEvent oe){
				System.out.println(oe);
			}
		}); 

		servo.openAny();
		System.out.println("waiting for AdvancedServo attachment...");
		servo.waitForAttachment();

		System.out.println("Serial: " + servo.getSerialNumber());
		System.out.println("Servos: " + servo.getMotorCount());
			try {
                //Initialize the Advanced Servo
                servo.setEngaged(0, true);
                servo.setSpeedRampingOn(0, false);
              
  	          	servo.setAcceleration(0,servo.getAccelerationMin(0));
  	          	servo.setVelocityLimit(0, 200);
  	          	servo.setPosition(0, 0);
  	          	
  	          	servo.setEngaged(1, true);
  	          	servo.setSpeedRampingOn(1, false);
            
	          	servo.setAcceleration(1,servo.getAccelerationMin(0));
	          	servo.setVelocityLimit(1, 200);
	          	servo.setPosition(1, 0);
  	          	
	          	servo.setEngaged(2, true);
                servo.setSpeedRampingOn(2, false);
              
  	          	servo.setAcceleration(2,servo.getAccelerationMin(0));
  	          	servo.setVelocityLimit(2, 200);
  	          	servo.setPosition(2, 0);
  	          	
  	          	servo.setEngaged(3, true);
  	          	servo.setSpeedRampingOn(3, false);
            
	          	servo.setAcceleration(3,servo.getAccelerationMin(0));
	          	servo.setVelocityLimit(3, 200);
	          	servo.setPosition(3, 0);

	          	timer2 = new Timer();
			    myTimerTask2 = new MyTimerTask2();
			    timer2.schedule(myTimerTask2, 0, 3000);
			
			}   catch (Throwable t) {
                    t.printStackTrace();
                }
		//servo.close();
		//servo = null;
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
		
		public static double getposition (int index) throws PhidgetException{
			 position = servo.getPosition(index);
			return index;
		}

		static class MyTimerTask2 extends TimerTask
	    {
			public void run() {
				int houseID = GlobalUser.RetrieveHouseID();
				int userID = GlobalUser.RetrieveUserID();
				String stringkey = GlobalUser.RetrieveStringKey();
				System.out.println("Checking Status for Motor");
				  HttpClient httpclient = HttpClientBuilder.create().build();
		            HttpGet httpget = new HttpGet(url + "?HouseID=" + houseID + "&userid=" + userID + "&loginstring=" + stringkey ); 
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
		                    	  
		                    	  System.out.println(i + "  " + jObj.getInt("DeviceID")  + " " + jObj.getInt("Status"));
		                    	  if (jObj.getInt("HouseID") == houseID) {
									if (jObj.getInt("DeviceID") == 9) {
						  	          	servo.setPosition(0, jObj.getInt("Status"));
									}
									else if (jObj.getInt("DeviceID") == 10) {
										servo.setPosition(1, jObj.getInt("Status"));
									}
									else if (jObj.getInt("DeviceID") == 11) {
										servo.setPosition(2, jObj.getInt("Status"));
									}
									else if (jObj.getInt("DeviceID") == 12) {
										servo.setPosition(3, jObj.getInt("Status"));	
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
}