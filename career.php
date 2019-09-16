<?php include("header.php");?>
<?php
	if(isset($_SESSION['n']))
	{
		$n=$_SESSION['n'];
		$cno=$_SESSION['cno'];
		$e=$_SESSION['e'];
		$c=$_SESSION['c'];
		$q=$_SESSION['q'];	
		$msg=$_SESSION['msg'];
		unset($_SESSION["n"]);
	}
	else
	{
		$msg="";
		$n="";
		$cno="";
		$e="";
		$c="Select City";
		$q="Select Qualification";
	}
?>
  <table width="100%" height="680" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td height="180"><img src="images/career_banner.jpg" width="100%" height="180" /></td>
    </tr>
    <tr>
      <td height="500"><table width="100%" height="500" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="45%"><img src="images/Career.jpg" width="100%" height="500" /></td>
          <td align="center" valign="top"><table width="98%" height="500" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td height="55" align="center" class="heading">Details</td>
            </tr>
            <tr>
              <td height="50" align="center" class="message"><?php echo $msg;?></td>
            </tr>
            <form method="post" name="form" onsubmit="return validate();" action="action.php?id=3" enctype="multipart/form-data">
            <tr>
              <td height="395" align="center" valign="top"><table width="98%" height="380" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="27%" align="right" class="normal_text">Name</td>
                  <td width="4%" align="center">:</td>
                  <td width="66%"><input name="name" type="text" class="text_box" id="name" value="<?php echo $n;?>" />
                  	<div class="error" id="n"></div>
                  </td>
                  <td width="3%" align="center" class="star">*</td>
                </tr>
                <tr>
                  <td align="right" class="normal_text">Contact No.</td>
                  <td align="center">:</td>
                  <td><input name="cno" type="text" class="text_box" id="cno" value="<?php echo $cno;?>" />
                  	<div class="error" id="cn"></div>
                  </td>
                  <td align="center" class="star">*</td>
                </tr>
                <tr>
                  <td align="right" class="normal_text">Email-Id</td>
                  <td align="center">:</td>
                  <td><input name="email" type="text" class="text_box" id="email" value="<?php echo $e;?>" />
                  	<div class="error" id="e"></div>
                  </td>
                  <td align="center" class="star">*</td>
                </tr>
                <tr>
                  <td height="55" align="right" class="normal_text">Gender</td>
                  <td align="center">:</td>
                  <td><table height="50" width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr class="normal_text">
                      <td height="40"><input name="gender" type="radio" id="radio" value="M" checked="checked" />
                        Male</td>
                      <td><input type="radio" name="gender" id="radio2" value="F" />
                        Female</td>
                      <td><input type="radio" name="gender" id="radio3" value="O" />
                        Others</td>
                    </tr>
                  </table></td>
                  <td align="center" class="star">*</td>
                </tr>
                <tr>
                  <td align="right" class="normal_text">City</td>
                  <td align="center">:</td>
                  <td><select name="city" class="text_box" id="city">
                    <option value="<?php echo $c;?>"><?php echo $c;?></option>
                    <option value="Lucknow">Lucknow</option>
                    <option value="Delhi">Delhi</option>
                    <option value="Kanpur">Kanpur</option>
                    <option value="Mumbai">Mumbai</option>
                  	</select>
                  <div class="error" id="c"></div>
                  </td>
                  <td align="center" class="star">*</td>
                </tr>
                <tr>
                  <td align="right" class="normal_text">Qualification</td>
                  <td align="center">:</td>
                  <td><select name="qualification" class="text_box" id="qualification">
                    <option value="<?php echo $q;?>"><?php echo $q;?></option>
                    <option value="Under Graduate">Under Graduate</option>
                    <option value="Post Graduate">Post Graduate</option>
                    <option value="Diploma">Diploma</option>
                  	</select>
                  <div class="error" id="q"></div>
                  </td>
                  <td align="center" class="star">*</td>
                </tr>
                <tr>
                  <td align="right" class="normal_text">Upload CV</td>
                  <td align="center">:</td>
                  <td><input type="file" name="cv" id="cv" /></td>
                  <td align="center" class="star">*</td>
                </tr>
                <tr>
                  <td height="42" align="right" class="normal_text">&nbsp;</td>
                  <td align="center">&nbsp;</td>
                  <td align="right"><input type="submit" name="Submit" id="Submit" value="Submit" /></td>
                  <td align="center">&nbsp;</td>
                </tr>
              </table></td>
            </tr>
           </form>
          </table></td>
        </tr>
      </table></td>
    </tr>
  </table>
<?php include("footer.php");?>
<script>
	var chk_name=/^[a-zA-Z. ]{2,40}$/;
	var chk_cno=/^[0-9\-]{10,10}$/;
	var chk_email=/^([a-zA-Z0-9.])+\@(([a-zA-Z0-9])+\.)+([a-zA-Z0-9]{2,4})+$/;
	function validate()
	{
		var name=form.name.value;	
		var cno=form.cno.value;		
		var email=form.email.value;		
		var city=form.city.value;	
		var qualification=form.qualification.value;
		var flag=1;
		if(!chk_name.test(name))
		{
			document.getElementById('n').innerHTML = "Please enter a valid Name.";
  			if(flag==1)
				form.name.focus();
  			flag=0;
		}
		else
  			document.getElementById('n').innerHTML = "";
		if(!chk_cno.test(cno))
		{
			document.getElementById('cn').innerHTML = "Please enter a valid Contact Number.";
  			if(flag==1)
				form.name.focus();
  			flag=0;
		}
		else
  			document.getElementById('cn').innerHTML = "";
		if(!chk_email.test(email))
		{
			document.getElementById('e').innerHTML = "Please enter a valid Email-Id.";
  			if(flag==1)
				form.name.focus();
  			flag=0;
		}
		else
  			document.getElementById('e').innerHTML = "";	
		if(city=="Select City")
		{
			document.getElementById('c').innerHTML = "Please select a valid City Name.";
  			if(flag==1)
				form.name.focus();
  			flag=0;
		}
		else
  			document.getElementById('c').innerHTML = "";
		if(qualification=="Select Qualification")
		{
			document.getElementById('q').innerHTML = "Please select a valid Qualification.";
  			if(flag==1)
				form.name.focus();
  			flag=0;
		}
		else
  			document.getElementById('q').innerHTML = "";
		if(flag==1)
			return true;
		else
			return false;
	}
</script>