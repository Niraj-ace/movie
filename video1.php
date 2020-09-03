<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
		<link href="dist/css/bootstrap.css" rel="stylesheet">
		<script src="dist/js/jquery.min.js"></script>
		<style>
			figure:hover{cursor: pointer;
				opacity: 0.3;}
			figure { display: table; }
			figcaption { display: table-caption; caption-side: bottom ; }
		</style>

		
	</head>
	<body>
		<nav class="navbar bg-dark navbar-dark">
			<a class="navbar-brand justify-content-start" href="admin.html">
   				<img src="logo.jpg" alt="Logo" style="width:70px;">
  			</a>
			<a href="index.php"><h2 style="color:white">MoviePage</h2></a>
		</nav> 
		<?php
			include("dbconfig.php");
			$name=$_POST['n'];
			$photo=$_POST['p'];
			$story=$_POST['s'];
			$year=$_POST['y'];
			$generes=$_POST['g'];
			$lang=$_POST['l'];
			$country=$_POST['c'];
			$runtime=$_POST['ru'];
			$rating=$_POST['ra'];
			$video=$_POST['v'];
			$sql="select * from movies";

			$res=mysqli_query($conn,$sql);
		
				echo "<div class='container-fluid'>
							<div class='row jumbotron'>
								<div class='col-sm-12 d-flex justify-content-center'>
									<iframe src='$video' width='100%' height='500'></iframe>
						  		</div>
								<div class='col-sm-12 d-flex justify-content-center'>
									<pre>



									</pre>
								</div>
							  	<div class='col-sm-12'>
					  			<div class='row'>
					  				<div class='col-sm-3'>
					  					<img src='$photo' height='200px' width='150px'>
					  				</div>
					  				<div class='col-sm-9'>
					  					<div class='row'>
							  				<div class='col-sm-12'>
												<h3>$name</h3>
								  			</div>
								  			<div class='col-sm-12 text-justify'>
												<p>$story</p>
								  			</div>
								  		</div>
							  			<div class='row'>
							  				<div class='col-sm-12'>
							  					<div class='row'>
							  						<div class='col-sm-6'>
									  					<p>Year :- <b>$year</b></p>
									  				</div>
									  				<div class='col-sm-6'>
									  					<p>Generes :- <b>$generes</b></p>
									  				</div>
							  					</div>
							  					<div class='row'>
							  						<div class='col-sm-6'>
									  					<p>Language :- <b>$lang</b></p>
									  				</div>
									  				<div class='col-sm-6'>
									  					<p>Country :- <b>$country</b></p>
									  				</div>
							  					</div>
							  					<div class='row'>
							  						<div class='col-sm-6'>
									  					<p>Runtime :- <b>$runtime</b></p>
									  				</div>
									  				<div class='col-sm-6'>
									  					<p>Rating :- <b>$rating/10</b></p>
									  				</div>
							  					</div>
							  				</div>
							  			</div>
							  		</div> 	 	
					  			</div>
					  		</div>
					  		<div class='col-sm-12 d-flex justify-content-center'>
									<pre>

									</pre>
								</div>
								<div class='col-sm-12 d-flex justify-content-center'>
									-----------Related Movies------------
									</div>
								<div class='col-sm-12 d-flex justify-content-center'>
									<pre>

									</pre>
								</div>";

					  	$sql="select * from movies where NOT name='$name' and generes='$generes'";
						$res=mysqli_query($conn,$sql);
						while($row=mysqli_fetch_object($res))
						{
						?>
						<script>
						$(document).ready(function(){
							 $(".<?php echo $row->id;?>").click(function(){
							 	var value=`${'<?php echo $row->name;?>'}`;
							 	var value1=`${'<?php echo 'images/'.$row->video;?>'}`;
							 	var value2=`${'<?php echo $row->storyline;?>'}`;
							 	var value3=`${'<?php echo $row->year;?>'}`;
							 	var value4=`${'<?php echo $row->generes;?>'}`;
							 	var value5=`${'<?php echo $row->lang;?>'}`;
							 	var value6=`${'<?php echo $row->country;?>'}`;
							 	var value7=`${'<?php echo $row->runtime;?>'}`;
							 	var value8=`${'<?php echo $row->rating;?>'}`;
							 	var value9=`${'<?php echo 'images/'.$row->photo;?>'}`;
							 	$('nav,.container-fluid').hide();
							 	console.log(value);
							 	$.ajax({
							        type: "POST",
							        url: "video1.php",
							        data: { 'n': value,'v':value1,'s': value2,'y':value3,'g': value4,'l':value5,'c': value6,'ru':value7,'ra':value8,'p':value9  }
							      }).done(function( msg ) {
							           $('#hu').html(msg);
							     });
							 	});
							});
						</script>
							<?php echo "
								<figure style='float:left; margin-left:20px'>
								    <img src='images/$row->photo' class='$row->id' height='200px' width='150px'>
									
								    <figcaption style='color:white; background:black; margin-top:-50px' class='text-center' size='3'>$row->name</figcaption>
							    </figure>";
						}


					echo "</div>
						</div>";
			?>
	</body>
</html>
