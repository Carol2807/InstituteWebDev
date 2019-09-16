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
  <table width="100%" height="394" cellspacing="0" cellpadding="0" border="0">
    <tr>
      <td width="50%" align="right" valign="top"><table width="98%" cellpadding="0" cellspacing="0" border="0" height="394"  align="right">
        <tr>
          <td height="54" align="center" class="heading">Contact Us</td>
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
          <td height="54" align="center" class="heading">Feedback</td>
        </tr>
        <tr>
          <td height="48"  align="right"><?php echo $msg;?></td>
        </tr>
        <tr>
          <td height="295" align="right"><table width="100%" border="0" cellspacing="0" cellpadding="0" height="295">
            <tr>
              <td width="29%" align="right" class="normal_text">Name</td>
              <td width="4%" align="center" class="normal_text">:</td>
              <td width="63%"><label for="name"></label>
                <input name="name" type="text" class="text_box" id="name" /></td>
              <td width="4%" align="center" class="star">*</td>
            </tr>
            <tr>
              <td align="right" class="normal_text">Contact No.</td>
              <td align="center" class="normal_text">:</td>
              <td><label for="cno"></label>
                <input name="cno" type="text" class="text_box" id="cno" /></td>
              <td align="center" class="star">*</td>
            </tr>
            <tr>
              <td align="right" class="normal_text">Email-Id</td>
              <td align="center" class="normal_text">:</td>
              <td><label for="email"></label>
                <input name="email" type="text" class="text_box" id="email" /></td>
              <td align="center" class="star">*</td>
            </tr>
            <tr>
              <td align="right" class="normal_text">Feedback</td>
              <td align="center" class="normal_text">:</td>
              <td><label for="fb"></label>
                <textarea name="fb" cols="45" rows="5" class="text_area" id="fb"></textarea></td>
              <td align="center" class="star">*</td>
            </tr>
            <tr>
              <td align="right" class="normal_text">&nbsp;</td>
              <td align="center" class="normal_text">&nbsp;</td>
              <td align="right"><input type="submit" name="Submit" id="Submit" value="Submit" /></td>
              <td align="center" class="star">&nbsp;</td>
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
		var arr=[];
		if(!chk_name.test(name))
			arr[arr.length]="Please enter a valid name";
		if(!chk_cno.test(cno))
			arr[arr.length]="Please enter a valid contact number";
		if(!chk_email.test(email))
			arr[arr.length]="Please enter a valid email id";
		if(!chk_fb.test(fb))
			arr[arr.length]="Please enter a valid feedback (min:10 characters max:100 characrters)";
		if(arr.length>0)
		{
			var msg = "Please enter the following detail(s) carefully :";
			for(var i=0; i<arr.length; i++)
				msg+= "\n"+(i+1)+". "+arr[i];
			alert(msg);
			return false;
		}
		return true;
	}
</script>