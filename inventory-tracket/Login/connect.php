<?php
ob_start(); // it was added to execute header location.
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname ="its";

	session_start(); 

  
	  // Create connection
	$conn = new mysqli($servername, $username, $password,$dbname);
  
	  // Check connection
	if ($conn->connect_error) {
		die("Connection failed: ");
	}

	$admin_sorgu= "Select * from admins"; // We defined sql query for admins
	$user_sorgu= "Select * from users"; // We defined sql query for users
	$admin_data = $conn->query($admin_sorgu); // We execute the sql query
	$user_data = $conn->query($user_sorgu);// We execute the sql query


	$itemC_data = $conn->query("Select * from items"); // We defined executed sql query for number of items
	$ic = 0; // it keeps number of items
	while($rowI = $itemC_data->fetch_assoc()){ // We are passing on all items 
		$ic+=1; // For every items we add 1
	}
	$roomC_data = $conn->query("Select * from rooms");// We defined executed sql query for number of rooms
	$rc = 0; // it keeps number of rooms
	while($rowR = $roomC_data->fetch_assoc()){ // We are passing on all rooms
		$rc+=1; // For every rooms we add 1
	}
	$totalEquipments = $ic + $rc; // We define addition of items and rooms
	$_SESSION["iCount"] = $ic; // We assign number of items to use on other page
	$_SESSION["rCount"] = $rc; // We assign number of rooms to use on other page
 
 	$_SESSION["eqCount"] = $totalEquipments; // We asssign addition of number of items and rooms to use on other page



	$itemC_data_A = $conn->query("Select * from items where StatusID = 2"); // We defined executed sql query for number of items which are available
	$ica = 0; // it keeps number of items which are available
	while($rowIA = $itemC_data_A->fetch_assoc()){ // We are passing on all items which are available
		$ica+=1;  // For every available items we add 1
	}
	$roomC_data_A = $conn->query("Select * from rooms where StatusID = 2"); // We defined executed sql query for number of rooms which are available
	$rca = 0; // it keeps number of rooms which are available
	while($rowRA = $roomC_data_A->fetch_assoc()){ // We are passing on all rooms which are available
		$rca+=1;  // For every available rooms we add 1
	}
	$totalEquipmentsA = $ica + $rca; // We define addition of items and rooms which are available
	$_SESSION["iCountA"]= $ica; // We assign number of items which are available to use on other page
	$_SESSION["rCountA"] = $rca; // We assign number of rooms which are availableto use on other page
	$_SESSION["eqCountA"] = $totalEquipmentsA; // We asssign addition of number of items and rooms which are available to use on other page

	
	$itemC_data_AinOneDay = $conn->query("SELECT * FROM itemborrowing WHERE (ReturnDate-CURRENT_DATE)<=1");  // We defined executed sql query for number of items which are available in 1 day
	$icaOneDay=0; // it keeps number of items which are available in one day
	while($rowIAO = $itemC_data_AinOneDay->fetch_assoc()){ // We are passing on all items which are available in one day;
		$icaOneDay+=1; // For every available items in one day, we add 1
	} 
	$roomC_data_AinOneDay = $conn->query("SELECT * FROM roomborrowing WHERE (ReturnDate-CURRENT_DATE)<=1"); // // We defined executed sql query for number of rooms which are available in 1 day
	$rcaOneDay=0; // it keeps number of rooms which are available in one day
	while($rowRAO = $roomC_data_AinOneDay->fetch_assoc()){ // We are passing on all rooms which are available in one day;
		$rcaOneDay+=1; // For every available rooms in one day, we add 1
	}
	$totalEquipmentsAinOneDay = $icaOneDay + $rcaOneDay; // We define addition of items and rooms which are available in one day
	$_SESSION["iCountAinOneDay"] = $icaOneDay; // We assign number of items which are available in one day to use on other page
	$_SESSION["rCountAinOneDay"] = $rcaOneDay; // We assign number of rooms which are available in one day to use on other page
	$_SESSION["eqCountAinOneDay"] = $totalEquipmentsAinOneDay; // We asssign addition of number of items and rooms which are available in one day to use on other page


	$itemrequests_data = $conn->query("SELECT * FROM itemrequest"); // We defined executed sql query for number of item requests 
	$irequests = 0; // it keeps number of item requests 
	while($rowIR = $itemrequests_data->fetch_assoc()){ // We are passing on all item requests 
		$irequests+=1; // For every item request, we add 1
	}
	$roomrequests_data = $conn->query("SELECT * FROM roomrequest"); // We defined executed sql query for number of room requests 
	$rrequests = 0; // it keeps number of room requests
	while($rowRR = $roomrequests_data->fetch_assoc()){ // We are passing on all room requests 
		$rrequests+=1; // For every room request, we add 1
	}
	$totalRequests = $irequests + $rrequests; // it keeps total requests
	$_SESSION["totalRequests"] = $totalRequests; // We assign total number of requests to use on other page




	$itemrequestsA_data = $conn->query("SELECT * FROM itemrequest WHERE Response = 0 or Response = 1"); // We defined executed sql query for number of item requests which were responsed
	$irequestsA = 0; // it keeps number of item requests which were responsed
	while($rowIR = $itemrequestsA_data->fetch_assoc()){ // We are passing on item requests which were responsed
		$irequestsA+=1; // For every item requests which were responsed, we add 1
	}
	$roomrequestsA_data = $conn->query("SELECT * FROM roomrequest WHERE Response = 0 or Response = 1"); // We defined executed sql query for number of room requests which were responsed
	$rrequestsA = 0; // it keeps number of room requests which were responsed
	while($rowRR = $roomrequestsA_data->fetch_assoc()){ // We are passing on room requests which were responsed
		$rrequestsA+=1; // For every room requests which were responsed, we add 1
	}
	$totalRequestsA = $irequestsA + $rrequestsA; // it keeps total requests which were responsed
	$_SESSION["totalRequestsA"] = $totalRequestsA; // We assign total number of requests which were responsed to use on other page
	$_SESSION["totalRequestsNotA"] = $totalRequests-$totalRequestsA; // We assign total number of requests which were not responsed to use on other page

	






	

	if($admin_data->num_rows>0)  //Admin Login Control
	{

    	while($row = $admin_data->fetch_assoc()){
			if(isset($_POST['adminoruser']))
			{

				if($_POST['adminoruser']=="admin")
				{
					if(isset($_POST['username'])&&isset($_POST['password']))
    				{
    		  			if($_POST['username']== $row['Username']&&$_POST['password']== $row['Password'])
    		  			{
						$_SESSION["adminname"]=$_POST['username'];
      				 	header('Location:/Login/admin.php');
      					}
    				}
				}
		
			}

    
    	}
	}

	if($user_data->num_rows>0)  //User Login Control
	{

    	while($row = $user_data->fetch_assoc()){
			if(isset($_POST['adminoruser']))
			{

				if($_POST['adminoruser']=="user")
				{
					if(isset($_POST['username'])&&isset($_POST['password']))
    				{
    		  			if($_POST['username']== $row['StudentNumber']&&$_POST['password']== $row['Password'])
    		  			{
							$_SESSION["username"]=$_POST['username'];
      				 		header('Location:/Login/main.php');
      					}
    				}	
				}
		
			}

    
    	}
	}



	if (isset($_POST['signup'])) // We check passwords are equal or not
	{
			   
		if($_POST['password']==$_POST['passwordAgain'])
		{
			$user_send_data= "INSERT INTO `users`(`FirstName`, `LastName`, `PhoneNumber`, `Email`, `Password`, `StudentNumber`, `Faculty`, `Department`) VALUES ('".$_POST['firstName']."','".$_POST['lastName']."','".$_POST['phoneNumber']."','".$_POST['email']."','".$_POST['password']."','".$_POST['studentNumber']."','".$_POST['faculty']."','".$_POST['department']."')";
					 $conn->query($user_send_data); //Addition to database with query
					 header('Location:/Login/index.php');

		}
		else
		{
			echo "Passwords are not same";
		}
						

						 
	}


	$conn->close();


	
ob_end_flush();
?>