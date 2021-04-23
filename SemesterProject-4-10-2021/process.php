<?php
       session_start();
          include("connection.php"); // connect to the database
            include("function.php");


          $receiver=$_GET['send'];
           $sender= $_SESSION["logged"];


            $query = mysql_query("SELECT * FROM friendship WHERE receiver = '" . $_SESSION["logged"] . "' AND sender = '" . $_GET['send'] . "' OR receiver = '" . $_GET['send'] . "' AND sender = '" . $_SESSION["logged"] . "' ");

            if(mysql_num_rows($query) > 0){
   
             $row = mysql_fetch_array($query); 

             echo"
             <script type=\"text/javascript\">
							alert(\"Friend requesr already sent\");
							window.location='home.php';
						</script>

            ";

             }
	
           else{
   
             $query = mysql_query("SELECT * FROM myfriends WHERE `myid`='" . $_SESSION["logged"] . "' AND `myfriends`='" . $_GET['send'] . "' OR`myid`='" . $_GET['send'] . "' AND `myfriends`='" . $_SESSION["logged"] . "'");
             
			 if(mysql_num_rows($query) > 0){
    
	         $row = mysql_fetch_array($query);

	       echo"
               <script type=\"text/javascript\">
							alert(\"Is already your friend\");
							window.location='home.php';
						</script>

              ";

            }

             else
     
	         {


              mysql_query("INSERT INTO friendship(receiver,sender) VALUES('$receiver','$sender') ") or
              die(mysql_error());
            
			 {
		    
			           echo "<script type=\"text/javascript\">
							alert(\"friend request sent\");
							window.location='home.php';
						</script>";
			
		
               }
	          }
            }		
 
             ?>


   
    