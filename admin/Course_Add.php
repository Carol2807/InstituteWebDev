<?php include("header.php");?>
<?php
	if(isset($_SESSION['msg']))
	{
		$code = $_SESSION['code'];
		$name = $_SESSION['name'];
		$dur = $_SESSION['dur'];
		$f = $_SESSION['f'];
		$m = $_SESSION['m'];
		$c = $_SESSION['c'];
		$msg = $_SESSION['msg'];
		unset($_SESSION["msg"]);
	}
	else
	{
		$msg="";
		$name="";
		$code="";
		$c="";
		$dur="";
		$f="";
		$m="";
	}
?>
          <table width="98%" height="660" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td height="50" align="center" class="sub_heading"><p><img src="../images/cooltext329895317229920.png" width="428" height="77" /></p></td>
            </tr>
            <tr>
              <td height="10" align="center" valign="middle" class="message"><?php echo $msg;?></td>
            </tr>
            <tr>
              <td height="600" align="center" valign="middle">
              <form  method="post" name="form" onsubmit="return validate();" action="action.php?id=1">
              <table width="98%" border="0" cellspacing="0" cellpadding="0" height="596">
                <tr>
                  <td width="16%" height="71" align="right" class="sub_heading">Course Code</td>
                  <td width="3%" align="center" class="normal_text">:</td>
                  <td width="78%" align="left"><input name="cc" type="text" class="text_box" id="cc" value="<?php echo $code;?>" /></td>
                  <td width="3%" align="center" class="star">*</td>
                </tr>
                <tr>
                  <td height="78" align="right" class="sub_heading">Course Name</td>
                  <td align="center" class="normal_text">:</td>
                  <td align="left"><input name="cn" type="text" class="text_box" id="cn" value="<?php echo $name;?>" /></td>
                  <td align="center" class="star">*</td>
                </tr>
                <tr>
                  <td height="79" align="right" class="sub_heading">Course Duration</td>
                  <td align="center" class="normal_text">:</td>
                  <td align="left"><input name="cd" type="text" class="text_box" id="cd" value="<?php echo $dur;?>" /></td>
                  <td align="center" class="star">*</td>
                </tr>
                <tr>
                  <td height="80" align="right" class="sub_heading">Course Fees</td>
                  <td align="center" class="normal_text">:</td>
                  <td align="left"><input name="fees" type="text" class="text_box" id="fees" value="<?php echo $f;?>" /></td>
                  <td align="center" class="star">*</td>
                </tr>
                <tr>
                  <td height="121" align="right" class="sub_heading">Modules</td>
                  <td align="center" class="normal_text">:</td>
                  <td align="left"><textarea name="mod" cols="45" rows="5" class="text_area" id="mod"><?php echo $m;?></textarea></td>
                  <td align="center" class="star">*</td>
                </tr>
                <tr>
                  <td height="112" align="right" class="sub_heading">Career</td>
                  <td align="center" class="normal_text">:</td>
                  <td align="left"><textarea name="car" cols="45" rows="5" class="text_area" id="car"><?php echo $c;?></textarea></td>
                  <td align="center" class="star">*</td>
                </tr>
                <tr>
                  <td height="55" align="right">&nbsp;</td>
                  <td align="center">&nbsp;</td>
                  <td align="center"><input type="submit" name="Submit" id="Submit" value="Submit" /></td>
                  <td align="center" class="star">&nbsp;</td>
                </tr>
              </table>
              </form>
              </td>
            </tr>
          </table>
<?php include("footer.php");?>
<script>
	var chk_cc=/^[a-zA-Z0-9 \-]{2,6}$/;
	var chk_cn=/^[a-zA-Z .0-9#++]{2,15}$/;
	var chk_cd=/^[a-zA-Z 0-9]{5,10}$/;
	var chk_fees=/^[a-zA-Z .,0-9\/]{5,10}$/;
	var chk_mod=/^[a-zA-Z 0-9\-+.,]{5,100}$/;
	var chk_car=/^[a-zA-Z .,0-9\-]{5,150}$/;
	function validate()
	{
		var cc = form.cc.value;
		var cn = form.cn.value;
		var cd = form.cd.value;
		var fees = form.fees.value;
		var mod = form.mod.value;
		var car = form.car.value;
		var arr=[];
		if(!chk_cc.test(cc))
			arr[arr.length]="Please enter a valid course code.";
		if(!chk_cn.test(cn))
			arr[arr.length]="Please enter a valid course name.";
		if(!chk_cd.test(cd))
			arr[arr.length]="Please enter a valid course duration.";
		if(!chk_fees.test(fees))
			arr[arr.length]="Please enter valid fees.";
		if(!chk_mod.test(mod))
			arr[arr.length]="Please enter valid modules.";
		if(!chk_car.test(car))
			arr[arr.length]="Please enter valid carrer options.";
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