package com.phidgets.functions;
import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.File;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.FileReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.OutputStreamWriter;
import java.util.ArrayList;
import java.util.List;
import java.util.Scanner;

import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.client.HttpClient;
import org.apache.http.client.methods.HttpGet;
import org.apache.http.impl.client.HttpClientBuilder;
import org.json.JSONArray;
import org.json.JSONObject;


public class LoginSystem {

	static String url = "http://www.fluidityhome.me/api/Authenticate/Login.php";
	public static void main(String[] args) throws IOException
	{
		System.out.println("Welcome to the FluidHome Bridge System.");

		try {
			String filename = "Hamlet.txt";  
	            String[] lines = readLines(filename);  
	            
	            for (int i = 0 ; i<lines.length ; i++)   
	            {  
	                System.out.println(lines[i]);
	            }  
	            CompareUsernamePassword(lines[0],lines[1]);
		} catch (FileNotFoundException e) {
			function();
		}
	}

	protected static void function()
	{
		Scanner keyboard = new Scanner(System.in);
		System.out.flush();
		System.out.println("Welcome to the FluidHome Bridge System.\n"
				+ "Username : ");
		String username = keyboard.nextLine();
		System.out.println("Password : ");
		String password = keyboard.nextLine();
		CompareUsernamePassword(username,password);	
	}

	private static void CompareUsernamePassword(String username, String password) {
		HttpClient httpclient = HttpClientBuilder.create().build();
      
		HttpGet httpget = new HttpGet(url + "?username=" + username +"&password=" + password ); 
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
             
                  for(int i = 0; i < arr.length(); i++){
                	  
                	  JSONObject jObj = arr.getJSONObject(i);
                	 
                	  String houseidString = jObj.getString("HouseID");
                	  int houseidNumber = Integer.parseInt(houseidString);
                	  
                	  String useridString = jObj.getString("UserID");
                	  int useridNumber = Integer.parseInt(useridString);
                	  
                	  String keyString = jObj.getString("LoggedInString");
                	  
                	  System.out.println(houseidNumber + " " + useridNumber + " " + keyString);
                	  System.out.println(jObj.getString("HouseID") + "  " + jObj.getString("LoginSuccess"));
                	  
                	  
                	  if(jObj.getString("LoginSuccess").equals("true"))
                	  {
                		  File fout = new File("Hamlet.txt");
                			FileOutputStream fos = new FileOutputStream(fout);
                		 
                			BufferedWriter bw = new BufferedWriter(new OutputStreamWriter(fos));
                				bw.flush();
                				bw.write(username);
                				bw.newLine();
                				bw.write(password);
                				bw.close();
                				
                		  System.out.println("work!");
                		  System.out.println("Login Success!!");
                		  GlobalUser g = new GlobalUser();
                		  g.LoginStatus(true, houseidNumber, useridNumber, keyString);
                		  RunAllPhidgets runfile = new RunAllPhidgets();
                		  runfile.function();
                	  }
                	  else{
                		  System.out.println("Login ID or password doesn't found");
                		  Thread.sleep(5000);
                		  function();
                	  }

				}
                  instream.close();
            }
        }catch (Exception e) {
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
	
	public static String[] readLines(String filename) throws IOException   
	    {  
	        FileReader fileReader = new FileReader(filename);  
	          
	        BufferedReader bufferedReader = new BufferedReader(fileReader);  
	        List<String> lines = new ArrayList<String>();  
	        String line = null;  
	          
	        while ((line = bufferedReader.readLine()) != null)   
	        {  
	            lines.add(line);  
	        }  
	          
	        bufferedReader.close();  
	          
	        return lines.toArray(new String[lines.size()]);  
	    }     
	
}

