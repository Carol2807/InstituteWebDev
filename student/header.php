<?php
	session_start();
	include("connect.php");
	$r=$_SESSION['rno'];
	$sql = mysqli_query($con,"select name,cc from stu_detail where rno='$r'") or die("Error - ".mysqli_error($con));
	$rs = mysqli_fetch_array($sql);
	$n = $rs[0];
	$cc = $rs[1];
	$sql = mysqli_query($con,"select name from courses where code = '$cc'") or die("Error - ".mysqli_error($con));
	$rs = mysqli_fetch_array($sql);
	if(isset($_POST['Logout']))
		header("Location:login.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="../css/mystyle.css"/>
<script type="text/javascript" src="css/jquery-latest.min.js"></script>
<script type="text/javascript" src="css/script_menu.js"></script>
<link rel="stylesheet" type="text/css" href="css/styles_menu.css"/>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0" >
  <tr>
    <td height="180"><img src="../images/LOGO.gif" alt="" width="100%" height="180" /></td>
  </tr>
  <tr>
<td height="50">
    <table width="100%" height="50" border="0" cellpadding="0" cellspacing="0">
      <tr class="sub_heading2">
        <td align="center">User Id : <?php echo $r;?></td>
        <td align="center">Name : <?php echo $n;?></td>
        <td align="center">Course : <?php echo $rs[0];?></td>
        <td align="center"><input type="submit" name="Logout" id="Logout" value="Logout" /></td>
      </tr>
    </table></td>  </tr>
  <tr>
    <td align="left" valign="top">
    <table width="100%"  border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="15%" style="background-color:#222222;" valign="top">
        	<div id='cssmenu'>
				<ul>
					<li><a href='home.php'><span>Home</span></a></li>
					<li><a href='course.php'><span>My Course Deatils</span></a></li>
   					<li><a href='fees.php'><span>My Fees Details</span></a></li>
   					<li class='last'><a href='change_password.php'><span>Change Password</span></a></li>
   					<li><a href='logout.php'><span>Blah</span></a></li>
   				</ul>
			</div>
        </td>
        <td width="85%" valign="top">