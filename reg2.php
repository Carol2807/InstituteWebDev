<?php include("header.php");?>
<?php
	include("connect.php");
	$r=$_SESSION['rno'];
	$sql = mysqli_query($con,"select rno,name,pname,cno,email,doa,cc,fees,module from stu_detail where rno='$r'") or die("Error - ".mysqli_error($con));
	$rs = mysqli_fetch_array($sql);
?>
<table width="100%" height="900" border="0" cellspacing="0" cellpadding="0">
	<tr>
      <td height="150"><img src="images/registration1.png" width="100%" height="150" /></td>
    </tr>
    <tr>
      <td height="750" align="center" valign="top">
      <table width="98%" height="400" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="50" align="center" class="heading">Student Deatils</td>
        </tr>
        <tr>
          <td height="50" align="center" valign="middle">&nbsp;</td>
        </tr>
        <tr>
          <td height="650" align="center" valign="top">
          <form method="post" name="form" onsubmit="return validate();" action="action.php?id=5">
          <table width="93%" height="650" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="25%" align="right" class="normal_text">Roll No.</td>
              <td width="3%" align="center" class="normal_text">:</td>
              <td width="72%" align="left"><input name="rno" type="text" class="text_box" id="rno" value="<?php echo $rs[0];?>" readonly="readonly" /></td>
            </tr>
            <tr>
              <td align="right" class="normal_text">Name</td>
              <td align="center" class="normal_text">:</td>
              <td align="left"><input name="n" type="text" class="text_box" id="n" value="<?php echo $rs[1];?>" readonly="readonly" /></td>
            </tr>
            <tr>
              <td align="right" class="normal_text">Parent's/Guardian's Name</td>
              <td align="center" class="normal_text">:</td>
              <td align="left"><input name="pn" type="text" class="text_box" id="pn" value="<?php echo $rs[2];?>" readonly="readonly" /></td>
            </tr>
            <tr>
              <td align="right" class="normal_text">Contact Number</td>
              <td align="center" class="normal_text">:</td>
              <td align="left"><input name="cno" type="text" class="text_box" id="cno" value="<?php echo $rs[3];?>" readonly="readonly" /></td>
            </tr>
            <tr>
              <td align="right" class="normal_text">Email ID</td>
              <td align="center" class="normal_text">:</td>
              <td align="left"><input name="e" type="text" class="text_box" id="e" value="<?php echo $rs[4];?>" readonly="readonly" /></td>
            </tr>
            <tr>
              <td align="right" class="normal_text">Date of Admission</td>
              <td align="center" class="normal_text">:</td>
              <td align="left"><input name="doa" type="text" class="text_box" id="doa" value="<?php echo $rs[5];?>" readonly="readonly" /></td>
            </tr>
            <tr>
              <td align="right" class="normal_text">Course Code</td>
              <td align="center" class="normal_text">:</td>
              <td align="left"><input name="cc" type="text" class="text_box" id="cc" value="<?php echo $rs[6];?>" readonly="readonly" /></td>
            </tr>
            <tr>
              <td align="right" class="normal_text">Fees</td>
              <td align="center" class="normal_text">:</td>
              <td align="left"><input name="f" type="text" class="text_box" id="f" value="<?php echo $rs[7];?>" readonly="readonly" /></td>
            </tr>
            <tr>
              <td align="right" class="normal_text">Modules</td>
              <td align="center" class="normal_text">:</td>
              <td align="left"><input name="m" type="text" class="text_box" id="m" value="<?php echo $rs[8];?>" readonly="readonly" /></td>
            </tr>
            <tr>
              <td align="right" class="normal_text">Add Password</td>
              <td align="center" class="normal_text">:</td>
              <td align="left">
              	<input name="ap" type="password" class="text_box" id="ap" />
              	<div id="pass" class="error"></div>
              </td>
            </tr>
            <tr>
              <td align="right" class="normal_text">Confirm Password</td>
              <td align="center" class="normal_text">:</td>
              <td align="left">
              	<input name="cp" type="password" class="text_box" id="cp" />
              	<div id="c_p" class="error"></div>  
              </td>
            </tr>
            <tr>
              <td align="right" class="normal_text">&nbsp;</td>
              <td align="center" class="normal_text">&nbsp;</td>
              <td align="center"><input type="submit" name="Submit" id="Submit" value="Submit" /></td>
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
	var chk_pass = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#%^&*])[a-zA-Z0-9!@#$%^&*]{8,16}$/;
	function validate()
	{
		var ap = form.ap.value;
		var cp = form.cp.value;
		var flag = 1;
		if(!chk_pass.test(ap))
		{
			document.getElementById('pass').innerHTML = "Invalid Password. Password must contain a capital letter, a number and a special character. Paswword can be min 8 and max 16 char long.";
			if(flag=1)
				form.ap.focus;
			flag = 0;	
		}
		else
			document.getElementById('pass').innerHTML = "";
		if(cp!=ap)
		{
			document.getElementById('c_p').innerHTML = "Please enter the same Password.";
			if(flag=1)
				form.cp.focus;
			flag = 0;	
		}
		else
			document.getElementById('c_p').innerHTML = "";
		if(flag==1)
			return true;
		else
			return false;
	}
</script>