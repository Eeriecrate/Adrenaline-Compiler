<!DOCTYPE html>
<html>
<head>
	<title>Submit</title>
	<link rel="stylesheet" href="lib/css/bootstrap.min.css">
	<script src = "lib/jquery.js"></script>
	<script src = "lib/js/bootstrap.js"></script>
</head>
<body>
<?php
	$fname = $_POST["fname"];
	$lname = $_POST["lname"];
	$firm = $_POST["firm"];
	$cost = 0;
	//INIT PURCHASES
	$pack = "";
	if($_POST["p1"] == '1'){
	$pack = $pack."1,";
	$cost += 250;
	};
	if($_POST["p2"] == '1'){
	$pack = $pack."2,";
	$cost += 250;
	};
	if($_POST["p3"] == '1'){
	$pack = $pack."3,";
	$cost += 2500;
	};
	if($_POST["p4"] == '1'){
	$pack = $pack."4,";
	$cost += 400;
	};
	if($_POST["p5"] == '1'){
	$pack = $pack."5,";
	$cost += 200;
	};
	if($_POST["p6"] == '1'){
	$pack = $pack."6,";
	$cost += 200;
	};
	if($_POST["p7"] == '1'){
	$pack = $pack."7,";
	$cost += 200;
	};
	if($_POST["p8"] == '1'){
	$pack = $pack."8,";
	$cost += 500;
	}
	$pack = substr($pack,0,strlen($pack)-1);
	//END INIT
	$cnumb = $_POST["number"];
	if($fname == "" || $firm == "" || $lname == "" || $cnumb == "" || ($_POST["p1"] == "" && $_POST["p2"] == "" && $_POST["p3"] == "" && $_POST["p4"] == "" && $_POST["p5"] == "" && $_POST["p6"] == "" && $_POST["p7"] == "" && $_POST["p8"] == "")){
		  	echo('
    		<div class="jumbotron" style = "text-align:center;">
	   		<h1>Oops!</h1>
	   		<p>It would appear that you left something out when filling out the order form!<hr /> Please press <i><b>backspace</b></i> on your keyboard to return to the form.</p>
			</div>');
	}else{
		//If you find yourself asking why I don't use sanitation for my database, it's because there's no need when our trusted employees are the ones inputting data.
		$servername = "127.0.0.1:8889";
		$username = "root";
		$password = "root";
		$dbname = "purchases";
		$conn = new mysqli($servername, $username, $password,$dbname);

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		$sql = "SELECT cn FROM  data WHERE cn = ".$cnumb.";";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) != 0) {
			echo('
    		<div class="jumbotron" style = "text-align:center;">
	   		<h1>Oops!</h1>
	   		<p>That Messecard number has already purchased from our firm!<hr /> Please press <i><b>backspace</b></i> on your keyboard to return to the form.</p>
			</div>');
		}else{

		$sql = "INSERT INTO data (fname, lname, pack, cn, firm, cost) VALUES ('".$fname."','".$lname."','".$pack."','FIRM ".$cnumb."','".$firm."','".$cost."')";
		if (mysqli_query($conn, $sql)) {
    	echo('	<div class="jumbotron" style = "text-align:center;">
	   		<h1>Success!</h1>
	   		<p>'.$fname.' '.$lname.' was successfuly added to the database!<hr /> Please click the button below to return the form.</p>
	   		 <button type="button" class = "btn" formaction="index.html">Home</button>
			</div>');
			} else {
   			 echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			};
		};


	}
?>
<script>
	$('.btn').click(function(){
		window.location.replace("index.html");
	});
</script>
</body>
</html>