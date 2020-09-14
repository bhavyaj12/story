<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
 
  $host="localhost";
  $username="root";
  $password="";
  $databasename="prati";

  $connect=mysql_connect($host,$username,$password);
  $db=mysql_select_db($databasename);

  $user_ip=$_SERVER['REMOTE_ADDR'];

  $check_ip = mysql_query("select userip from storyview where story='story 2' and userip='$user_ip'");
  if(mysql_num_rows($check_ip)>=1)
  {
	
  }
  else
  {
    $insertview = mysql_query("insert into storyview values('','story 2','$user_ip')");
	$updateview = mysql_query("update totalview set totalvisit = totalvisit+1 where story='story 2' ");
  }

?>
<!DOCTYPE html>
<html>
<head>
	<title>Story 2</title>
	<link rel="stylesheet" type="text/css" href="stylestory.css">
</head>
<body>

<div class="header">
	<h2><u>Story 2 Title</u></h2>
</div>
<div class="content">
  	<br><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><br>
	<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p><br>
	<?php
    $stmt = mysql_query("select totalvisit from totalview where story='story 2' ");
	$stmt2 = mysql_query("select count(*) from storyview where story='story 2' ");
	?>

    <p>Total Reads: <?php echo mysql_num_rows($stmt);?></p>
	<p>Total Now: <?php echo mysql_num_rows($stmt2);?></p><br>
	
	
    <?php  
	if (isset($_SESSION['username'])) : ?>
    	
    	<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>
	
</div>
		
</body>
</html>