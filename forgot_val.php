<?php include("header.php");?>
<?php
	include("connect.php");
	$otp="";
	$msg="";
	echo $_SESSION['otp'];
	if(isset($_POST['Submit']))
	{
		$otp = $_POST['otp'];
		if($_SESSION['otp'] == $otp)
			header("Location:change_password.php");
		else
		{
			$msg = "Invalid OTP...";
			$otp = "";
		}
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
          <td align="center" valign="top"><table width="98%" height="293" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="120" align="center" valign="top" class="sub_heading"><p>Enter The OTP recieved...</p>
                <p class="normal_text">You will be able to change your password by entering the correct OTP,</p>
                <p class="normal_text">you recieved on your registered number.</p></td>
            </tr>
            <tr>
              <td height="33" align="center" class="message"><?php echo $msg;?></td>
            </tr>
            <tr>
              <td height="140" align="left">
              <form method="post" name="form" onsubmit="return validate();">
              <table width="90%" height="122" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="23%" height="60" align="right" class="normal_text">OTP</td>
                  <td width="5%" align="center" class="normal_text">:</td>
                  <td width="63%" align="center"><input name="otp" type="text" class="text_box" id="otp" value="<?php echo $otp;?>" />
                  <div id="o" class="error"></div> 
                  </td>
                  <td width="9%" align="left" class="star">*</td>
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
	var chk_num = /^[0-9]{1,6}$/;
	function validate()
	{
		var otp = form.otp.value;
		var flag = 1;
		if(!chk_num.test(otp))
		{
			document.getElementById('o').innerHTML = "Please enter a valid User ID.";
			if(flag=1)
				form.otp.focus;
			flag = 0;	
		}
		else
			document.getElementById('o').innerHTML = "";
		if(flag==1)
			return true;
		else
			return false;
	}
</script>