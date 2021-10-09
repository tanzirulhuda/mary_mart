<!-- <form name="nav">
<select name="SelectURL" class="selectpicker" onchange="window.open(document.nav.SelectURL.options[document.nav.SelectURL.selectedIndex].value)">
     <option value="" selected="">Choose:
     </option><option value="https://www.google.co.in">Google</option>
     <option value="http://www.thecreativehero.com/">Creative Hero</option>
     <option value="http://www.vipizone.com/">Vipizone</option>
     <option value="http://www.creativetweets.com">Creative Tweets</option>
  </select>
</form> -->

<!-- 
if (!$run_products) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
} -->


<?php 
require_once('db/db.php');
require_once('includes/functions.php');
add_cart();

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Mary Mart</title>
	<!--/tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--//tags -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" media="all" />
	<link href="css/font-awesome.css" rel="stylesheet">
	<!--pop-up-box-->
	<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
	<!--//pop-up-box-->
	<!-- price range -->
	<link rel="stylesheet" type="text/css" href="css/jquery-ui1.css">
	<!-- fonts -->
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" />
</head>

<body>
	<?php require_once("includes/header.php") ?>

  <div class="container">	
	<h2>Create Bootstrap Tags Input with jQuery, PHP & MySQL</h2>	
	<form method="post" class="form-horizontal" action="demo.php">	
		<div class="form-group">
			<label class="col-xs-3 control-label">Name:</label>
			<div class="col-xs-8">
				<input type="text" id="name" name="name" />				
			</div>
		</div>	
		<div class="form-group">
			<label class="col-xs-3 control-label">Your Skills:</label>
			<div class="col-xs-8">
				<input type="text" id="skills" name="skills" data-role="tagsinput"  />				
			</div>
		</div>
		<div class="form-group">	
			<label class="col-xs-3 control-label"></label>		
			<div class="col-xs-8">
				<input type="submit" name="submit" value="Save"/>
			</div>
		</div>  		
	</form>	
</div>

<div class="container">
  <form action="demo.php" method="post">
    <input type="text" name="query">
    <!-- <input type="button" value="Search" name="search"> -->
    <button type="submit" name="search">Search</button>
  </form>
</div>
<?php

if(isset($_POST['search'])){

  $query = $_POST['query'];
  $sql = "SELECT * FROM `developers` WHERE `skills` LIKE '%$query%'";
  $run = mysqli_query($conn, $sql);
  while ($row = $run->fetch_assoc()) {
    echo $row['skills']."<br>";
}
}

?>

	<?php include_once('./includes/cart.php') ?>
	<?php include_once('./includes/footer.php') ?>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js"></script>
  <script>
    $('#skills').tagsinput({
      confirmKeys: [13, 44],
      maxTags: 20
    });
  </script>
  <?php 

if(isset($_POST['skills']) && isset($_POST['name'])) {
	$name = $_POST['name'];
	$skills = $_POST['skills'];		
	$insert_query = "INSERT INTO developers (name, skills) VALUES ('".$name."', '".$skills."')";
	mysqli_query($conn, $insert_query) or die("database error: ". mysqli_error($conn));	
	echo $skills;		
} else {
	echo "Please Enter you name and skills!";
}

?>

</body>
</html>