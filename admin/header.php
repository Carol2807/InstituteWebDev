<?php
	session_start();
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
<table width="100%" border="0" cellspacing="0" cellpadding="0" height="760">
  <tr>
    <td height="180"><img src="../images/LOGO.gif" alt="" width="100%" height="180" /></td>
  </tr>
  <tr>
    <td height="50" align="center" class="heading">Admin Page</td>
  </tr>
  <tr>
    <td height="500" align="left" valign="top">
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="15%" style="background-color:#222222;" valign="top">
        	<div id='cssmenu'>
				<ul>
					<li><a href='home.php'><span>Home</span></a></li>
					<li class='active has-sub'><a href='#'><span>Course</span></a>                                    
    					<ul>
        					<li><a href='Course_Add.php'><span>Add Course</span></a></li>
                            <li><a href='Course_Modify.php'><span>Modify Course</span></a></li>
      				  		<li><a href='Course_Delete.php'><span>Delete Course</span></a></li>
                        </ul>
   					</li>
   					<li class='active has-sub'><a href='#'><span>Student</span></a>
                    	<ul>
        					<li><a href='student.php'><span>Student's Admission Information</span></a></li>
                            <li><a href='stu_detail.php'><span>Student Details</span></a></li>
                        </ul>
                    </li>
                    <li><a href='int_fee.php'><span>Installment Fee Details</span></a></li>
   					<li class='active has-sub'><a href='#'><span>Display</span></a>
                    	<ul>
        					<li><a href='Display_f.php'><span>Feedback</span></a></li>
                            <li><a href='Display_e.php'><span>Enquiry</span></a></li>
      				  		<li><a href='Display_c.php'><span>Career</span></a></li>
                        </ul>
                    </li>
   					<li class='last'><a href='password.php'><span>Change Password</span></a></li>
   					<li><a href='logout.php'><span>Logout</span></a></li>
   				</ul>
			</div>
        </td>
        <td width="85%" valign="top" align="center">