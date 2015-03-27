package com.register.newcard;

import java.awt.EventQueue;

import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JTextField;
import javax.swing.JButton;

import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.client.HttpClient;
import org.apache.http.client.methods.HttpGet;
import org.apache.http.impl.client.HttpClientBuilder;
import org.json.JSONArray;
import org.json.JSONObject;

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
import com.phidgets.functions.GlobalUser;

import java.awt.event.ActionListener;
import java.awt.event.ActionEvent;
import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;

public class cardDetailsInterface implements TagLossListener, TagGainListener {
	RFIDPhidget phid;
	String urlString = "http://www.fluidityhome.me/api/Service/PhidgetServer/";
	String houseid = "" ;
	int useridNumber = GlobalUser.RetrieveUserID();
	String stringkey = GlobalUser.RetrieveStringKey();
	
	boolean editableButton = false;
	public void setTextFieldValue_1(String value, String status)
	{
		System.out.println(value + " : " + status);
		textField_1.setText(value);
		lblStatus.setText(status);
	}
	
	public void setEnablebtnNewButton_1()
	{
		btnNewButton_1.setEnabled(true);
	}
	
	public void setDisablebtnNewButton_1()
	{
		btnNewButton_1.setEnabled(false);
	}

	private JFrame frame;
	private JTextField textField;
	private JLabel lblUserCardId;
	private JTextField textField_1;
	private JButton btnNewButton_1;
	private JLabel lblStatus;
	private JTextField textField_2;
	private JLabel lblRfidValue;

	/**
	 * Launch the application.
	 */
	public static void main(String[] args) {
		EventQueue.invokeLater(new Runnable() {
			public void run() {
				try {
					cardDetailsInterface window = new cardDetailsInterface();
					window.frame.setVisible(true);
				} catch (Exception e) {
					e.printStackTrace();
				}
			}
		});
	}

	/**
	 * Create the application.
	 * @throws PhidgetException 
	 */
	public cardDetailsInterface() throws PhidgetException {
		initialize();
		phid  = new RFIDPhidget();
		phid.addAttachListener(new AttachListener()
		{
			public void attached(AttachEvent arg0) {
				System.out.println("Attachment of " + arg0);
			}
			
		});
		
		 phid.addTagLossListener(this);
		 phid.addTagGainListener(this);
	     phid.addDetachListener(new DetachListener()
	        {
				public void detached(DetachEvent arg0) {
						System.out.println("The RFID is now detatched!");	
				}	
	        });
	     
	     phid.openAny();
	     phid.waitForAttachment();
	}

	/**
	 * Initialize the contents of the frame.
	 */
	private void initialize() {
		frame = new JFrame();
		frame.setBounds(100, 100, 450, 300);
		frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		frame.getContentPane().setLayout(null);
		
		JLabel lblUsername = new JLabel("Username");
		lblUsername.setBounds(65, 16, 69, 16);
		frame.getContentPane().add(lblUsername);
		
		textField = new JTextField();
		textField.setBounds(55, 34, 167, 28);
		frame.getContentPane().add(textField);
		textField.setColumns(10);
		
		lblUserCardId = new JLabel("User Card ID (Database)");
		lblUserCardId.setBounds(65, 74, 157, 16);
		frame.getContentPane().add(lblUserCardId);
		
		textField_1 = new JTextField();
		textField_1.setBounds(55, 91, 167, 28);
		frame.getContentPane().add(textField_1);
		textField_1.setColumns(10);
	//	textField_1.setEditable(false);
		
		JButton btnNewButton = new JButton("Get Details");
		btnNewButton.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				findIDFunction(textField.getText()); 
				editableButton = true;
			}
		});
		btnNewButton.setBounds(266, 35, 132, 28);
		frame.getContentPane().add(btnNewButton);
		
		btnNewButton_1 = new JButton("Change Value");
		btnNewButton_1.setEnabled(false);
		btnNewButton_1.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				updateIDFunction(textField_2.getText());
				editableButton = false;
				
			}
		});
		btnNewButton_1.setBounds(266, 91, 132, 95);
		frame.getContentPane().add(btnNewButton_1);
		
		lblStatus = new JLabel("Please Insert Your Username!");
		lblStatus.setBounds(128, 219, 182, 16);
		frame.getContentPane().add(lblStatus);
		
		textField_2 = new JTextField();
		textField_2.setBounds(55, 156, 167, 28);
		frame.getContentPane().add(textField_2);
		textField_2.setColumns(10);
		textField_2.setEditable(false);
		
		lblRfidValue = new JLabel("RFID Value");
		lblRfidValue.setBounds(65, 139, 69, 16);
		frame.getContentPane().add(lblRfidValue);
	}

	public void tagGained(TagGainEvent arg0) {
		textField_2.setText(arg0.getValue());
		if(editableButton){
			setEnablebtnNewButton_1();
		}
	}

	public void tagLost(TagLossEvent arg0) {
		textField_2.setText("No Card!");
		setDisablebtnNewButton_1();
	}
	
	
	public void findIDFunction(String username) 
	{
		
		HttpClient httpclient = HttpClientBuilder.create().build();
        HttpGet httpget = new HttpGet("getrfid.php?username=" + username); 
        HttpResponse response;
       
        System.out.println("trying get");

        try 
        {
            response = httpclient.execute(httpget);
            HttpEntity entity = response.getEntity();
            if (entity != null) {
                  InputStream instream = entity.getContent();
                  System.out.println("converting response");
                  String result= convertStreamToString(instream);
                  JSONArray arr = new JSONArray(result);
                  System.out.println("" + arr.length());
                  for(int i = 0; i < arr.length(); i++){
                	  JSONObject jObj = arr.getJSONObject(i);
                	  
                	  String b = arr.getJSONObject(i).getString("CheckSuccess");
                      String d = arr.getJSONObject(i).getString("UniqueCardID");
                      houseid = arr.getJSONObject(i).getString("houseID");
                    if(b.equals("true")){
                    	System.out.println("User Found!");
                    	setTextFieldValue_1(d, "User Found!");
                      } 
        }
                  
                  instream.close();
            }
        }catch (Exception e) {
        	
    }
		
	}
	
	public void updateIDFunction(String value) 
	{
		URL url;
		HttpURLConnection conn;
		BufferedReader rd;
		 
		String fullURL = urlString + "updateuuid.php" + "?value=" + value + "&houseid=" + houseid + "&userid" + useridNumber + "&stringkey" + stringkey;
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
        
        System.out.println("Update Done!");
        lblStatus.setText("Update Successful!");
        
        textField.setText("");
        textField_1.setText("");
        textField_2.setText("");
        editableButton = false;
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
