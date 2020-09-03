<?php
	
	include("dbconfig.php");
	
	$img=$_FILES['photo']['name'];
	$name=$_POST['fname'];
	$story=$_POST['story'];
	$year=$_POST['year'];
	$generes=$_POST['generes'];
	$lang=$_POST['lang'];
	$country=$_POST['country'];
	$runtime=$_POST['runtime'];
	$rating=$_POST['rating'];
	$video=$_FILES['video1']['name'];
	
	move_uploaded_file($_FILES['photo']['tmp_name'],'images/'.$img) or die("here");
	move_uploaded_file($_FILES['video1']['tmp_name'],'images/'.$video) or die("here");
	$sql="insert into movies(photo,name,storyline,year,generes,lang,country,runtime,rating,video) values('$img','$name','$story','$year','$generes','$lang','$country','$runtime','$rating','$video')";
	$res=mysqli_query($conn,$sql)or die("here1");
	if($res==true)
	{
		
		header("Location:index.php");
	}
	else
	{
		mysqli_error();
	}
?>