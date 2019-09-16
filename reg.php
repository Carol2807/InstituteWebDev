<?php include("header.php");?>
<?php
	if(isset($_SESSION['msg']))
	{
		$msg = $_SESSION['msg'];
		unset($_SESSION["msg"]);
	}
	else
		$msg = "";
?>
  <table width="100%" height="550" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td height="150" align="left" valign="top"><img src="images/registration1.png" width="100%" height="150" /></td>
    </tr>
    <tr>
      <td height="400" align="center" valign="middle">
      	<table width="98%" height="400" border="0" cellpadding="0" cellspacing="0">
      		<tr>
        		<td width="35%" height="400" align="center" valign="middle"><img src="images/reg.jpg" width="98%" height="395" /></td>
          		<td align="left" valign="top">
                <table width="100%" height="466" border="0" cellspacing="0" cellpadding="0">
          		  <tr>
          		    <td height="55" align="center" class="heading">Registration Details</td>
        		  </tr>
          		  <tr>
          		    <td height="10" align="center" valign="middle" class="sub_heading">&nbsp;</td>
        		  </tr>
          		  <tr>
          		    <td height="80" align="center" valign="top" class="sub_heading"><p>Enter the following details carefully :</p>
          		      <p class="normal_text">1) User ID is your Roll No. provided at the time of admission</p>
          		      <p class="normal_text">2) Registration No. is an 8 digit number provided at the time of admission</p></td>
        		  </tr>
                  <tr>
          		    <td height="10">&nbsp;</td>
        		  </tr>
                  <tr>
          		    <td height="30" align="center" class="message"><?php echo $msg;?></td>
        		  </tr>
          		  <tr>
          		    <td height="180" align="left" valign="top">
                    <form method="post" name="form" onsubmit="return validate();" action="action.php?id=4">
                    <table width="92%" height="200" border="0" cellpadding="0" cellspacing="0">
          		      <tr>
          		        <td width="21%" height="66" align="right" class="normal_text">User ID</td>
          		        <td width="4%" align="center" class="normal_text">:</td>
          		        <td width="69%">
                        	<input name="rno" type="text" class="text_box" id="rno" />
                        	<div id="no" class="error"></div>
                        </td>
          		        <td width="6%" align="center" class="star">*</td>
        		        </tr>
          		      <tr>
          		        <td height="69" align="right" class="normal_text">Registration Number</td>
          		        <td width="4%" align="center" class="normal_text">:</td>
          		        <td width="69%">
                        	<input name="reg" type="text" class="text_box" id="reg" />
                            <div id="re" class="error"></div>
                        </td>
          		        <td align="center" class="star">*</td>
        		        </tr>
          		      <tr>
          		        <td height="65" align="right" class="normal_text">&nbsp;</td>
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
      	</table>
      </td>
    </tr>
  </table>
<?php include("footer.php");?>
<script>
	var chk_num = /^[0-9]{1,6}$/;
	var chk_reg = /^([0-9]{4,4})+\-([0-9]{4,4})$/;
	function validate()
	{
		var rno = form.rno.value;
		var reg = form.reg.value;
		var flag = 1;
		if(!chk_num.test(rno))
		{
			document.getElementById('no').innerHTML = "Please enter a valid User ID.";
			if(flag=1)
				form.rno.focus;
			flag = 0;	
		}
		else
			document.getElementById('no').innerHTML = "";
		if(!chk_reg.test(reg))
		{
			document.getElementById('re').innerHTML = "Please enter a valid Registration Number.";
			if(flag=1)
				form.reg.focus;
			flag = 0;	
		}
		else
			document.getElementById('re').innerHTML = "";
		if(flag==1)
			return true;
		else
			return false;
	}
</script>