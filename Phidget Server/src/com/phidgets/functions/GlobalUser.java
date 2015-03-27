package com.phidgets.functions;
import java.io.BufferedReader;
import java.io.FileNotFoundException;
import java.io.FileReader;
import java.io.IOException;

public class GlobalUser {

	private static GlobalUser instance;
	private static boolean UserLoggedIn;
	private static int HouseID;
	private static int UserID;
	private static String StringKey;
	 
	 
	public GlobalUser() {
		 UserLoggedIn = false;
		 HouseID = 0;
		 UserID = 0;
		 StringKey = "";
		 
	}
	
	public void LoginStatus(boolean loggedinstatus, int houseID, int userid, String stringkey) {
		UserLoggedIn = loggedinstatus;
		HouseID = houseID;
		UserID = userid;
		StringKey = stringkey;
	}	

	public static boolean CheckLoggedIn() {
		return UserLoggedIn;
	}

	public static int RetrieveHouseID() {
		return HouseID;
	}
	
	public static int RetrieveUserID() {
		return UserID;
	}

	public static String RetrieveStringKey() {
		return StringKey;
	}
	
	public static synchronized GlobalUser getInstance() {
		if (instance == null) {
			instance = new GlobalUser();
		}
		return instance;
	}
}
