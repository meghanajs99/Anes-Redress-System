
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta content="text/html; charset=iso-8859-2" http-equiv="Content-Type">
<title>ViewComplaints</title>
<link rel="icon" type="image/ico" href="logo.jpg"/>
<link rel="stylesheet" href="styletable.css">
</head>
<body>
<ul>
   <li><a href="first.php">Home</a></li>

  <li style="float:right"><form action="logout.php" method="post">
    <input class="navinput" type="submit" name="Logout" value="logout">
</form></li>
<li style="float:right"><form action="viewfeedback.php" method="post">
    <input  class="navinput" type="submit" name="view" value="Feedbacks">
</form></li>
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Contact</a>
    <div class="dropdown-content">
     <a>Mr.S.Joshua Johnson</a><a>Asst.Professor</a><a>Cse Dept</a><a>joshua.cse@anits.edu.in</a><a>9573382650</a>
    </div>
</li>
</ul>
<br><br><br>
<?php
session_start();

$con = mysqli_connect("localhost","root","root","complaintdatabase");
if (mysqli_connect_errno())
 {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }

 /* if(!isset($_POST['type']))
  {
	   $type=$_SESSION['type'];
  }
  else
  {*/
	    $type=$_POST['type'];
  /*}*/
   $sql="SELECT * from complaints where type='$type'";

    if($type=="miscellaneous")
    {
       echo "<center><table><tr><th>ID</th><th>Userid</th><th>Department</th><th>Room No.</th><th>Type</th><th>Description</th><th>Status</th><th></th><th></th><th></th></tr>" ;
      }
      else
      {
        echo "<center><table><tr><th>ID</th><th>Userid</th><th>Department</th><th>Room No.</th><th>Type</th><th>Description</th><th>Status</th><th></th></tr>" ;
      }
	if ($result=mysqli_query($con,$sql))
  {
    while($row = mysqli_fetch_assoc($result)) {  
        echo "<td> " . $row["id"]. "</td>";
	echo "<td> " . $row["userid"]. "</td>";
		echo "<td> " . $row["department"]. "</td>";
		echo "<td> " . $row["roomno"]. "</td>";
		echo "<td> " . $row["type"]. "</td>";
		echo "<td> " . $row["description"]. "</td>";
		echo "<td> " . $row["status"]. "</td>";
	//	$_SESSION['id']=$row["id"];
    echo "<td><form id='update' action='edit.php' method='POST'>
	<input type='hidden' name='id' value='".$row["id"]."'>
	<input type='hidden' name='type' value='".$row["type"]."'>
   <input type='submit' class='buttonU' name='update' value='Update'/></form></td>";
		
		if($type=="miscellaneous")
		{
			 echo "<td><form id='banner' action='banner.php' method='POST'>
	<input type='hidden' name='cid' value='".$row["id"]."'>
	<input type='hidden' name='uid' value='".$row["userid"]."'>
	<input type='hidden' name='desc' value='".$row["description"]."'>
   <input type='submit' class='buttonU' name='addtobanner' value='Add to banner?'/></form></td>";
   echo "<td><form id=Delbanner' action='delbanner.php' method='POST'>
  <input type='hidden' name='cid' value='".$row["id"]."'>
  <input type='hidden' name='uid' value='".$row["userid"]."'>
  <input type='hidden' name='desc' value='".$row["description"]."'>
   <input type='submit' class='buttonU' name='deletebanner' value='Delete from banner?'/></form></td>";
  		}
		echo "<tr>"; 
    }
  }
	echo "</table></center>";
  
?> 
</body>
</html>