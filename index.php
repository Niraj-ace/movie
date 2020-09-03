<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
		<link href="dist/css/bootstrap.css" rel="stylesheet">
		<script src="dist/js/jquery.min.js"></script>
		 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
		<style>
			.carousel-inner img {
			    width: 100%;
			  }
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
			<form class="form-inline" >
				 <input class="form-control mr-sm-2" type="text" id="searchbar" placeholder="Search">
				<button class="btn btn-success" onclick="search_movie()" type="button">Search</button>
			</form>
		</nav> 
		<?php
			include("dbconfig.php");
			$sql="select * from movies order by id desc LIMIT 1";
			$res=mysqli_query($conn,$sql);
		?>
			<?php
				echo "<div class='container-fluid'>
							<div class='row jumbotron'>
								<div class='col-sm-12'>
								<div id='demo' class='carousel slide' data-ride='carousel'>
								  <ul class='carousel-indicators'>
								    <li data-target='#demo' data-slide-to='0' class='active'></li>
								    <li data-target='#demo' data-slide-to='1'></li>
								    <li data-target='#demo' data-slide-to='2'></li>
								  </ul>
								  <div class='carousel-inner'>";
					
					$row=mysqli_fetch_object($res);
					
							  echo "<div class='carousel-item active'>
								      <img src='images/$row->photo' alt='Los Angeles' width='1100' height='500'>
								      <div class='carousel-caption' style='background:black;opacity:0.7'>
								        <h3>$row->name</h3>
								        <p>$row->storyline</p>
								        <button class='btn btn-primary $row->id'>Watch</button>
								      </div>   
								    </div>";

				$sql="select * from movies order by id desc LIMIT 1,2";
				$res=mysqli_query($conn,$sql);
				while($row=mysqli_fetch_object($res))
				{

							echo "<div class='carousel-item'>
								      <img src='images/$row->photo' alt='Los Angeles' width='1100' height='500'>
								      <div class='carousel-caption' style='background:black;opacity:0.7'>
								        <h3>$row->name</h3>
								        <p>$row->storyline</p>
								        <button class='btn btn-primary $row->id'>Watch</button>
								      </div>   
								    </div>";
				}
								    
							echo "</div>
								  <a class='carousel-control-prev' href='#demo' data-slide='prev'>
								    <span class='carousel-control-prev-icon'></span>
								  </a>
								  <a class='carousel-control-next' href='#demo' data-slide='next'>
								    <span class='carousel-control-next-icon'></span>
								  </a>
								</div>
								</div>
								<div class='col-sm-12'>
									<pre>


									</pre>
								</div>
								";

			$sql="select * from movies order by id desc";
			$res=mysqli_query($conn,$sql);
				while($row=mysqli_fetch_object($res))
				{
			?>
					<script>
						function search_movie() { 
						    let input = document.getElementById('searchbar').value 
						    input=input.toLowerCase(); 
						    let x = document.getElementsByTagName('figure'); 
						      
						    for (i = 0; i < x.length; i++) {  
						        if (!x[i].innerHTML.toLowerCase().includes(input)) { 
						            x[i].style.display="none"; 
						        } 
						        else { 
						            x[i].style.display="table";                  
						        } 
						    } 
						}; 
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
			<?php
					echo "<figure style='float:left; margin-left:20px'>
						    <img src='images/$row->photo' class='$row->id' height='200px' width='150px'>
							
						    <figcaption style='color:white; background:black; margin-top:-50px' class='text-center' size='3'>$row->name</figcaption>
					    </figure>";	
				}
				echo "</div>
							</div>
							</div>
					<div id='hu'></div>";
			?>
	</body>
</html>
