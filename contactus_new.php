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
<table width="100%" height="450" cellspacing="0" cellpadding="0" border="0">
    <tr>
      <td width="50%" align="right" valign="top"><table width="98%" cellpadding="0" cellspacing="0" border="0" height="450"  align="right">
        <tr>
          <td height="55" align="center" bgcolor="#FFFFFF" class="heading">Contact Us</td>
        </tr>
        <tr>
          <td class="sub_heading">Head Office Address:</td>
        </tr>
        <tr>
          <td class="normal_text">Global Institute of Computer Science &amp; Technology, 123 Lodhi Colony, New Delhi</td>
        </tr>
        <tr>
          <td class="sub_heading">Branch Adress:</td>
        </tr>
        <tr>
          <td class="normal_text">Global Institute of Computer Science &amp; Technology, 542 Rana Bhawan, Eldeco Udyan-1, Lucknow</td>
        </tr>
        <tr>
          <td class="sub_heading">Contact Details:</td>
        </tr>
        <tr>
          <td class="normal_text">Vinod Kumar Singh Rana (9876543210)</td>
        </tr>
        <tr>
          <td class="normal_text">Sanjana Rana (7682763276)</td>
        </tr>
        <tr>
          <td class="sub_heading">Contact Id:</td>
        </tr>
        <tr>
          <td class="normal_text">contactus@gicst.com</td>
        </tr>
        <tr>
          <td class="sub_heading">Website:</td>
        </tr>
        <tr>
          <td class="normal_text">www.gicst.com</td>
        </tr>
      </table></td>
      <td width="50%" align="right" valign="top">
      <form method="post" name="form" onsubmit="return validate();" action="action.php?id=1">
      <table width="98%" border="0" cellspacing="0" cellpadding="0" height="393">
        <tr>
          <td height="55" align="center" bgcolor="#FFFFFF" class="heading">Feedback</td>
        </tr>
        <tr>
          <td height="50"  align="center" class="message"><?php echo $msg;?></td>
        </tr>
        <tr>
          <td height="295" align="right"><table width="100%" border="0" cellspacing="0" cellpadding="0" height="358">
            <tr>
              <td width="26%" height="51" align="right" class="normal_text">Name</td>
              <td width="5%" align="center" class="normal_text">:</td>
              <td width="65%"><label for="name"></label>
                <input name="name" type="text" class="text_box" id="name" />
              	<div id="n" class="error"></div>  
              </td>
              <td width="4%" align="center" valign="middle" class="star">*</td>
            </tr>
            <tr>
              <td height="50" align="right" class="normal_text">Contact No.</td>
              <td align="center" class="normal_text">:</td>
              <td><label for="cno"></label>
                <input name="cno" type="text" class="text_box" id="cno" />
              	<div id="c" class="error"></div>  
              </td>
              <td align="center" valign="middle" class="star">*</td>
            </tr>
            <tr>
              <td height="55" align="right" class="normal_text">Email-Id</td>
              <td align="center" class="normal_text">:</td>
              <td><label for="email"></label>
                <input name="email" type="text" class="text_box" id="email" />
              	<div id="e" class="error"></div>
              </td>
              <td align="center" valign="middle" class="star">*</td>
            </tr>
            <tr>
              <td height="125" align="right" class="normal_text">Feedback</td>
              <td align="center" class="normal_text">:</td>
              <td><label for="fb"></label>
                <textarea name="fb" cols="45" rows="5" class="text_area" id="fb"></textarea>
              	<div id="f" class="error"></div>
              </td>
              <td align="center" valign="middle" class="star">*</td>
            </tr>
            <tr>
              <td align="right" class="normal_text">&nbsp;</td>
              <td align="center" class="normal_text">&nbsp;</td>
              <td align="center"><input type="submit" name="Submit" id="Submit" value="Submit" /></td>
              <td align="center" valign="middle" class="star">&nbsp;</td>
            </tr>
          </table>
          </td>
        </tr>
      </table>
      </form>
      </td>
    </tr>
  </table>
 <?php include("footer.php");?>
 <script>
 	var chk_name=/^[a-zA-Z .]{2,40}$/;
	var chk_email=/^([a-zA-Z0-9.])+\@(([a-zA-Z0-9])+\.)+([a-zA-Z0-9]{2,4})+$/;
	var chk_cno=/^[0-9\-]{10,12}$/;
	var chk_fb=/^[a-zA-Z0-9,&?%()=! .]{10,100}$/;
	function validate()
	{
		var name = form.name.value;
		var email = form.email.value;
		var cno = form.cno.value;
		var fb = form.fb.value;
		var flag = 1;
		if(!chk_name.test(name))
		{
			document.getElementById("n").innerHTML = "Please enter a valid Name.";
			if(flag==1)
				form.name.focus();
			flag=0;
		}
		else
			document.getElementById("n").innerHTML = ""
		if(!chk_cno.test(cno))
		{
			document.getElementById("c").innerHTML = "Please enter a valid Contact Number.";
			if(flag==1)
				form.cno.focus();
			flag=0;
		}
		else
			document.getElementById("c").innerHTML = "";
		if(!chk_email.test(email))
		{
			document.getElementById("e").innerHTML = "Please enter a valid Email-Id.";
			if(flag==1)
				form.email.focus();
			flag=0;
		}
		else
			document.getElementById("e").innerHTML = "";
		if(!chk_fb.test(fb))
		{
			document.getElementById("f").innerHTML = "Please enter a valid Feedback (Min:10 characters Max:100 characters).";
			if(flag==1)
				form.fb.focus();
			flag=0;
		}
		else
			document.getElementById("f").innerHTML = "";
		if(flag==1)
			return true;
		else
			return false;
	}
</script>