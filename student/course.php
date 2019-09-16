<?php 
	include('header.php'); 
	if(isset($_POST['Login']))
		header("Location:login.php");
?>
<?php 
	include("connect.php"); 
	$r=$_SESSION['rno'];
	$sql = mysqli_query($con,"select cc,fees,module from stu_detail where rno='$r'") or die("Error - ".mysqli_error($con));
	$rs = mysqli_fetch_array($sql);
	$cc = $rs[0];
	$cf = $rs[1];
	$m = $rs[2];
	$sql = mysqli_query($con,"select name,dur,career from courses where code='$cc'") or die("Error - ".mysqli_error($con));
	$rs = mysqli_fetch_array($sql);
?>
	<table width="100%" height ="700" border="0" cellspacing="0" cellpadding="0">
    	<tr>
 			<td height="250" valign="top">
            <table width="100%" height="250" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="25%" height="250" align="left" valign="top"><img src="../images/stu1.png" width="100%" height="250" /></td>
                  <td width="75%" valign="middle"><img src="../images/cooltext330646319437785.png" width="100%" height="150" /></td>
                </tr>
            </table>
            </td>        
        </tr>
        <tr>
        	<td height="450" valign="top">
            <table width="96%" height="450" border="0" cellpadding="0" cellspacing="0">
        	  <tr>
        	    <td width="30%" align="right" class="sub_heading">Course Code</td>
        	    <td width="4%" align="center" class="normal_text">:</td>
        	    <td width="66%" align="left"><input name="textfield" type="text" class="text_box" id="textfield" value="<?php echo $cc; ?>" readonly="readonly" /></td>
      	    </tr>
        	  <tr>
        	    <td align="right" class="sub_heading">Course Name</td>
        	    <td align="center" class="normal_text">:</td>
        	    <td align="left"><input name="textfield2" type="text" class="text_box" id="textfield2" value="<?php echo $rs[0]; ?>" readonly="readonly" /></td>
      	    </tr>
        	  <tr>
        	    <td align="right" class="sub_heading">Duration</td>
        	    <td align="center" class="normal_text">:</td>
        	    <td align="left"><input name="textfield3" type="text" class="text_box" id="textfield3" value="<?php echo $rs[1]; ?>" readonly="readonly" /></td>
      	    </tr>
        	  <tr>
        	    <td align="right" class="sub_heading">Fees</td>
        	    <td align="center" class="normal_text">:</td>
        	    <td align="left"><input name="textfield4" type="text" class="text_box" id="textfield4" value="<?php echo $cf; ?>" readonly="readonly" /></td>
      	    </tr>
        	  <tr>
        	    <td align="right" class="sub_heading">Modules</td>
        	    <td align="center" class="normal_text">:</td>
        	    <td align="left"><input name="textfield5" type="text" class="text_box" id="textfield5" value="<?php echo $m; ?>" readonly="readonly" /></td>
      	    </tr>
        	  <tr>
        	    <td align="right" class="sub_heading">Career</td>
        	    <td align="center" class="normal_text">:</td>
        	    <td align="left"><input name="textfield6" type="text" class="text_box" id="textfield6" value="<?php echo $rs[2]; ?>" readonly="readonly" /></td>
      	    </tr>
      	  </table></td>
        </tr>
	</table>
<?php include('footer.php'); ?>