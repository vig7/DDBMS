<!DOCTYPE html>
<style type="text/css">
	table{
		border:1px solid black;
		
	}
	td{

		border:1px solid black;
	}
	body{
		font-size: 2em;
	}
	.m1{
		margin-left: 40%;
		float: left;
		position: absolute;
		left: 10px;
		top: 50px;
	}
	div{
		position: absolute;
		left: 500px;
		top: 0px;
		
	}
</style>
<?php
$conn = mysqli_connect("localhost", "root", "", "state");
$link=pg_connect("host=localhost port=5432 dbname=demo user=postgres password=1234");
$fr=$_POST["fragment"];
$q="SELECT * FROM state where city='$fr'";
$sql=mysqli_query($conn,$q);
echo "<span>Delivery assignments for $fr</span>";?>

<table>
<?php

while($row=mysqli_fetch_assoc($sql)){
   echo" <tr>";
    echo"  <td>";
          echo $row['code'];
   echo"   </td>";
    echo"  <td>";
          echo $row['city'];
    echo"  </td>";
    echo"  <td>";
          echo $row['delivery'];
    echo"  </td>";
   echo" </tr>";
}
$sql=pg_query($q);

while($row=pg_fetch_assoc($sql)){
	   echo" <tr>";
    echo"  <td>";
          echo $row['code'];
   echo"   </td>";
    echo"  <td>";
          echo $row['city'];
    echo"  </td>";
    echo"  <td>";
          echo $row['delivery'];
    echo"  </td>";
   echo" </tr>";

}?>
</table>
<?php
$q="SELECT * FROM state where city!='$fr'";
$sql=mysqli_query($conn,$q);
echo "<div>Delivery assignments for other than $fr</div>";?>
<table class="m1">
<?php
while($row=mysqli_fetch_assoc($sql)){
   echo" <tr>";
    echo"  <td>";
          echo $row['code'];
   echo"   </td>";
    echo"  <td>";
          echo $row['city'];
    echo"  </td>";
    echo"  <td>";
          echo $row['delivery'];
    echo"  </td>";
   echo" </tr>";
}
$sql=pg_query($q);

while($row=pg_fetch_assoc($sql)){
	   echo" <tr>";
    echo"  <td>";
          echo $row['code'];
   echo"   </td>";
    echo"  <td>";
          echo $row['city'];
    echo"  </td>";
    echo"  <td>";
          echo $row['delivery'];
    echo"  </td>";
   echo" </tr>";

}?>
</table>
