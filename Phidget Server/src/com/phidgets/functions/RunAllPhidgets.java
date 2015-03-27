package com.phidgets.functions;
import com.phidgets.PhidgetException;

class ThreadDemo extends Thread {
   private String threadName;
   
   ThreadDemo( String name){
       threadName = name;
       System.out.println("Creating " +  threadName );
   }
   public void run() {
      System.out.println("Running " +  threadName );
   }
   
   public void start ()
   {
      System.out.println("Starting " +  threadName );
      OpenIFKit i = new OpenIFKit();
      try {
		i.main(null);
	} catch (Exception e) {
	}
   }

}

class ThreadDemo2 extends Thread {
	   private String threadName;
	   
	   ThreadDemo2( String name){
	       threadName = name;
	       System.out.println("Creating " +  threadName );
	   }
	   public void run() {
	      System.out.println("Running " +  threadName );
	   }
	   
	   public void start ()
	   {
	      System.out.println("Starting " +  threadName );
	      try {
			RFIDReader o = new RFIDReader();
		} catch (PhidgetException e) {
		}
	   }

	}

class ThreadDemo3 extends Thread {
	   private String threadName;
	   
	   ThreadDemo3( String name){
	       threadName = name;
	       System.out.println("Creating " +  threadName );
	   }
	   public void run() {
	      System.out.println("Running " +  threadName );
	   }
	   
	   public void start ()
	   {
	      System.out.println("Starting " +  threadName );
	      Motor a = new Motor();
	      try {
	    	  
			a.main(null);
		} catch (Exception e) {
			e.printStackTrace();
		}
	   }

	}

class ThreadDemo4 extends Thread {
	   private String threadName;
	   
	   ThreadDemo4( String name){
	       threadName = name;
	       System.out.println("Creating " +  threadName );
	   }
	   public void run() {
	      System.out.println("Running " +  threadName );
	   }
	   
	   public void start ()
	   {
	      System.out.println("Starting " +  threadName );
	      philiphue a = new philiphue();
	      try {
	    	  
			a.main(null);
		} catch (Exception e) {
			e.printStackTrace();
		}
	   }

	}


public class RunAllPhidgets {
   
   public void function()
   {
	   	  ThreadDemo T1 = new ThreadDemo( "Thread-1");
	      T1.start();
	      
	      ThreadDemo2 T2 = new ThreadDemo2( "Thread-2");
	      T2.start();
	      
	      ThreadDemo3 T3 = new ThreadDemo3("Thread-3");
	      T3.start();
	      
	      ThreadDemo4 T4 = new ThreadDemo4("Thread-4");
	      T4.start();
   }
   
   
}