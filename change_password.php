<?php include("header.php");?>
<?php 
	include("connect.php"); 
	$r=$_SESSION['id'];
	$ap="";
	$cp="";
	$msg="";
	if(isset($_POST['Submit']))
	{
		$ap=$_POST["newp"];
		$cp=$_POST["confirmp"];
		$sql=mysqli_query($con,"UPDATE login SET password='$_POST[newp]' where id = '$r'")or die("Some error occurred : ".mysqli_error($con));
		$msg="Password Changed";
		header("Location:login.php");
	}
?>
<table width="100%" height="600" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td height="250"><img src="images/banner_forgot_password_img.gif" width="100%" height="250" /></td>
    </tr>
    <tr>
      <td valign="top" height="350"><table width="98%" height="350" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td valign="top" width="25%"><img src="images/forgot-password-form.jpg" alt="" width="100%" height="350" /></td>
          <td align="center" valign="top"><table width="98%" height="290" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="77" align="center" valign="middle" class="sub_heading"><p>Change Password...</p></td>
            </tr>
            <tr>
              <td height="33" align="center" class="message"><?php echo $msg;?></td>
            </tr>
            <tr>
              <td height="140" align="left">
              <form method="post" name="form" onsubmit="return validate();">
              <table width="95%" height="180" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="28%" height="60" align="right" class="normal_text">New Password</td>
                  <td width="5%" align="center" class="normal_text">:</td>
                  <td width="58%" align="center"><input name="newp" type="password" class="text_box" id="newp" value="<?php echo $ap;?>" />
                  <div id="r" class="error"></div> 
                  </td>
                  <td width="9%" align="left" class="star">*</td>
                </tr>
                <tr>
                  <td height="60" align="right" class="normal_text">Confirm Password</td>
                  <td align="center" class="normal_text">:</td>
                  <td align="center"><input name="confirmp" type="password" class="text_box" id="confirmp" value="<?php echo $cp;?>" /></td>
                  <td align="left" class="star">*</td>
                </tr>
                <tr>
                  <td height="60" align="right" class="normal_text">&nbsp;</td>
                  <td align="center" class="normal_text">&nbsp;</td>
                  <td align="center"><input type="submit" name="Submit" id="Submit" value="Submit" /></td>
                  <td align="left" class="star">&nbsp;</td>
                </tr>
              </table>
              </form>
              </td>
            </tr>
          </table></td>
          <td width="25%" valign="top"><img src="images/forgot_password.jpg" width="100%" height="350" /></td>
        </tr>
      </table></td>
    </tr>
  </table>
<?php include("footer.php");?>
<script>
	var chk_pass = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#%^&*])[a-zA-Z0-9!@#$%^&*]{8,16}$/;
	function validate()
	{
		var newp = form.newp.value;
		var confirmp = form.confirmp.value;
		var flag = 1;
		if(!chk_pass.test(newp))
		{
			document.getElementById('n').innerHTML = "Invalid Password. Password must contain a capital letter, a number and a special character. Paswword can be min 8 and max 16 char long.";
			if(flag=1)
				form.newp.focus;
			flag = 0;	
		}
		else
			document.getElementById('o').innerHTML = "";
		if(confirmp!=newp)
		{
			document.getElementById('c').innerHTML = "Please enter the same Password.";
			if(flag=1)
				form.confirmp.focus;
			flag = 0;	
		}
		else
			document.getElementById('c').innerHTML = "";
		if(flag==1)
			return true;
		else
			return false;
	}
</script>