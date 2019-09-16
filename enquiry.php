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
<table width="100%" height="410" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="50%" height="410" align="left" valign="top">
      	<table width="100%" height="410" border="0" cellpadding="0" cellspacing="0">
        	<tr>
        		<td height="410" align="center" valign="middle"><img src="images/enquiry.gif" width="86%" height="490" /></td>
        	</tr>
        </table>
      <td align="center" valign="top">
      <table width="98%" border="0" cellpadding="0" cellspacing="0" height="410">
        <tr>
          <td height="55" align="center" class="heading">Enquiry Details </td>
        </tr>
        <tr>
          <td class="message" align="center" height="50"><?php echo $msg;?></td>
        </tr>
        <tr>
          <td align="center">
          <form method="post" name="form" onsubmit="return validate();" action="action.php?id=2">
          <table width="98%" border="0" cellspacing="0" cellpadding="0" height="420">
            <tr>
              <td width="26%" align="right" class="normal_text">Name</td>
              <td width="5%" align="center">:</td>
              <td width="66%" align="left"><label for="name"></label>
                <input name="name" type="text" class="text_box" id="name" /></td>
              <td width="3%" align="center" valign="middle" class="star">*</td>
            </tr>
            <tr>
              <td align="right" class="normal_text">Contact No.</td>
              <td align="center">:</td>
              <td align="left"><label for="cno"></label>
                <input name="cno" type="text" class="text_box" id="cno" /></td>
              <td align="center" valign="middle" class="star">*</td>
            </tr>
            <tr>
              <td align="right" class="normal_text">Email-Id</td>
              <td align="center">:</td>
              <td align="left"><label for="email"></label>
                <input name="email" type="text" class="text_box" id="email" /></td>
              <td align="center" valign="middle" class="star">*</td>
            </tr>
            <tr>
              <td align="right" class="normal_text">Gender</td>
              <td align="center">:</td>
              <td align="left" class="normal_text">
                <input name="gender" type="radio" value="M" checked="checked" /> Male
                <input name="gender" type="radio" value="F" /> Female
                <input type="radio" name="gender" value="O" /> Others
              </td>  
              <td align="center" valign="middle" class="star">*</td>
            </tr>
            <tr>
              <td height="113" align="right" class="normal_text">Enquiry</td>
              <td align="center">:</td>
              <td align="left"><label for="enq"></label>
                <textarea name="enq" cols="45" rows="5" class="text_area" id="enq"></textarea></td>
              <td align="center" valign="middle" class="star">*</td>
            </tr>
            <tr>
              <td height="54" align="right" class="normal_text">City</td>
              <td align="center">:</td>
              <td align="left"><label for="city">
                <select name="city" class="text_box" id="city">
                  <option value="Select City">Select City</option>
                  <option value="Lucknow">Lucknow</option>
                  <option value="Kanpur">Kanpur</option>
                  <option value="Delhi">Delhi</option>
                </select>
              </label></td>
              <td align="center" valign="middle" class="star">*</td>
            </tr>
            <tr>
              <td align="right" class="normal_text">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center"><input type="submit" name="Submit" id="Submit" value="Submit" /></td>
              <td align="center" valign="middle" class="star">&nbsp;</td>
            </tr>
          </table>
          </form>
          </td>
        </tr>
      </table></td>
    </tr>
  </table>
<?php include("footer.php");?>
<script>
	var chk_name=/^[a-zA-Z .]{2,40}$/;
	var chk_email=/^([a-zA-Z0-9.])+\@(([a-zA-Z0-9])+\.)+([a-zA-Z0-9]{2,4})+$/;
	var chk_cno=/^[0-9\-]{10,12}$/;
	var chk_enq=/^[a-zA-Z0-9,&?%()=! .]{10,100}$/;
	function validate()
	{
		var name = form.name.value;
		var email = form.email.value;
		var cno = form.cno.value;
		var enq = form.enq.value;
		var city = form.city.value;
		var gender = form.gender.value
		var arr=[];
		if(!chk_name.test(name))
			arr[arr.length]="Please enter a valid Name.";
		if(!chk_cno.test(cno))
			arr[arr.length]="Please enter a valid Contact Number.";
		if(!chk_email.test(email))
			arr[arr.length]="Please enter a valid Email-Id.";
		if(!chk_enq.test(enq))
			arr[arr.length]="Please enter a valid Enquiry (min:10 characters max:100 characrters).";
		if(city=="Select City")
			arr[arr.length]="Please select a valid City";
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