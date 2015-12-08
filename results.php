<!DOCTYPE html>
<html>
<head>
	<title>View Results</title>
	<link rel="stylesheet" href="lib/css/bootstrap.min.css">
	<script src = "lib/jquery.js"></script>
	<script src = "lib/js/bootstrap.js"></script>
</head>
<body onload = "init()">
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Adrenaline Database</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.html">Home</a></li>
            <li  class = "active"><a href="results.php">View</a></li>
          </ul>
        </div>
      </div>
      </nav>
    <!--Begin Jumbo-->
    <div class="jumbotron" style = "text-align:center;margin-top: 30px">
	    <h1>Adrenaline: Purchase List</h1>
	    <p>Here you can view all purchases that we have currently. If you would like to return the the purchase page, then you can select the <i><b>Home</b></i> button.</p>
	</div>
	<!--Let's get this party started!-->
	<div class = "container">
  <?php
      $servername = "localhost:8889";
    $username = "root";
    $password = "root";
    $dbname = "purchases";
    $total = 0;
    $conn = new mysqli($servername, $username, $password,$dbname);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM data";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 0) {
      echo('<hr />
        <div class="jumbotron" style = "text-align:center;">
        <h1>Oops!</h1>
        <p>There are no purchases to display at this time!</p>
      </div>');
    }else{
      echo('
        <table class="table">
    <thead>
      <tr>
        <th>Purchase</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Card Number</th>
        <th>Package(s)</th>
        <th>Cost</th>
        <th>Firm</th>
      </tr>
    </thead>
    <tbody>');
      while($row = mysqli_fetch_assoc($result)) {
      echo('<tr>
        <td>'.$row['purchase'].'</td>
        <td>'.$row['fname'].'</td>
        <td>'.$row['lname'].'</td>
        <td>'.$row['cn'].'</td>
        <td>'.$row['pack'].'</td>
        <td>'.$row['cost'].'</td>
        <td>'.$row['firm'].'</td>
      </tr>');
      $total += $row['cost'];
    };
     
      echo('</tbody></table>');
    };
    echo('  <table class="table" style = "float:right;">
    <thead>
      <tr>
        <th>Total</th>
      </tr>
    </thead>
    <tbody><tr><td>'.$total.'</td></tr></tbody></table>')
  ?>

  </div>
      <footer class="footer">
            <div class="container">
              <p id = "Footer" class="foot text-muted">Adrenaline: Site by Tanner McKamey</p>
            </div>
      </footer>
</body>
</html>