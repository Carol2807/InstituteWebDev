<?php include("header.php");?>
<?php
	if(isset($_SESSION['msg']))
	{
		$msg=$_SESSION['msg'];
		unset($_SESSION["msg"]);
	}
	else
		$msg="";
?>
  <table width="100%" height="500" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td height="150" valign="top"><img src="images/login_banner11.jpg" width="100%" height="150" /></td>
    </tr>
    <tr>
      <td height="350" align="center" valign="top">
      <table width="98%" height="350" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="40%" align="center" valign="top"><img src="images/Login_Left.jpg" width="100%" height="350" /></td>
          <td align="center" valign="top">
          <table width="98%" height="350" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td height="70" align="center" class="heading">Login Details</td>
            </tr>
            <tr>
              <td height="50" align="center" class="normal_text sub_heading"><span class="normal_text">User ID is your Roll No. provided at the time of admission</span></td>
            </tr>
            <tr>
              <td height="30" align="center" class="message"><?php echo $msg;?></td>
            </tr>
            <tr>
              <td height="200" align="left" valign="top">
              <form method="post" name="form" onsubmit="return validate();" action="action.php?id=6">
              <table width="95%" height="214" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="23%" height="58" align="right" class="normal_text">User Id</td>
                  <td width="3%" align="center" class="normal_text">:</td>
                  <td width="69%" align="left">
                  	<input name="rno" type="text" class="text_box" id="rno" />
                  	<div id="r" class="error"></div> 
                  </td>
                  <td width="5%" align="center" class="star">*</td>
                </tr>
                <tr>
                  <td height="50" align="right" class="normal_text">Password</td>
                  <td align="center" class="normal_text">:</td>
                  <td align="left">
                  	<input name="pass" type="password" class="text_box" id="pass" />
                  	<div id="p" class="error"></div>  
                  </td>
                  <td align="center" class="star">*</td>
                </tr>
                <tr>
                  <td height="51" align="right" class="normal_text">&nbsp;</td>
                  <td align="center" class="normal_text">&nbsp;</td>
                  <td align="center" class="link"><a href="forgot.php">Forgot Password</a></td>
                  <td align="center" class="star">&nbsp;</td>
                </tr>
                <tr>
                  <td align="right" class="normal_text">&nbsp;</td>
                  <td align="center" class="normal_text">&nbsp;</td>
                  <td align="center"><input type="submit" name="Submit" id="Submit" value="Submit" /></td>
                  <td align="center" class="star">&nbsp;</td>
                </tr>
              </table>
              </form>
              </td>
            </tr>
          </table></td>
        </tr>
      </table></td>
    </tr>
  </table>
<?php include("footer.php");?>
<script>
	var chk_num = /^[0-9]{1,6}$/;
	var chk_pass = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#%^&*])[a-zA-Z0-9!@#$%^&*]{8,16}$/;
	function validate()
	{
		var rno = form.rno.value;
		var pass = form.pass.value;
		var flag = 1;
		if(!chk_num.test(rno))
		{
			document.getElementById('r').innerHTML = "Please enter a valid User ID.";
			if(flag=1)
				form.rno.focus;
			flag = 0;	
		}
		else
			document.getElementById('r').innerHTML = "";
		if(!chk_pass.test(pass))
		{
			document.getElementById('p').innerHTML = "Invalid Password. Password must contain a capital letter, a number and a special character. Paswword can be min 8 and max 16 char long.";
			if(flag=1)
				form.pass.focus;
			flag = 0;	
		}
		else
			document.getElementById('p').innerHTML = "";
		if(flag==1)
			return true;
		else
			return false;
	}
</script>