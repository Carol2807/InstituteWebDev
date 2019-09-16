<?php include("header.php"); ?>
<?php 
	include("connect.php"); 
	$r=$_SESSION['rno'];
	$sql=mysqli_query($con,"select password from login where id = '$r'");
	$rs=mysqli_fetch_array($sql);
	$o="";
	$n="";
	$c="";
	$msg="";
	if(isset($_POST['Submit']))
	{
		if($rs[0]!=$_POST['original'])
		{
			$msg="Wrong Original Password...";
			$o="";
			$n=$_POST['newp'];
			$c=$_POST['confirmp'];
		}
		else if($_POST['original']==$_POST['newp'])
		{
			$msg="Please Enter a New Password...";
			$o=$_POST['original'];
			$n="";
			$c="";
		}
		else
		{
			$sql=mysqli_query($con,"UPDATE login SET password='$_POST[newp]' where id = '$r'")or die("Some error occurred : ".mysqli_error($con));
			$msg="Password Changed";
			$o="";
			$n="";
			$c="";
		}
		if(isset($_POST['Login']))
			header("Location:login.php");
	}
?>

<table width="100%" height="378" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="50" align="center" class="heading">Change Password</td>
  </tr>
  <tr>
    <td height="50" class="message"><?php echo $msg;?></td>
  </tr>
  <tr>
    <td height="278" align="center" valign="top">
    <form name="form" method="post" onsubmit="return validate();">
    <table width="75%" height="278" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="32%" align="right" class="normal_text">Original Password</td>
        <td width="4%" align="center" class="normal_text">:</td>
        <td width="45%" align="left">
        	<input name="original" type="password" class="text_box" id="original" value="<?php echo $o;?>" />
        	<div id="o" class="error"></div>    
        </td>
        <td width="19%" align="left" class="star">*</td>
      </tr>
      <tr>
        <td align="right" class="normal_text">New Password</td>
        <td align="center" class="normal_text">:</td>
        <td align="left">
        	<input name="newp" type="password" class="text_box" id="newp" value="<?php echo $n;?>" />
        	<div id="n" class="error"></div>    
        </td>
        <td align="left" class="star">*</td>
      </tr>
      <tr>
        <td align="right" class="normal_text">Confirm Password</td>
        <td align="center" class="normal_text">:</td>
        <td align="left">
        	<input name="confirmp" type="password" class="text_box" id="confirmp" value="<?php echo $c;?>" />
        	<div id="c" class="error"></div>    
        </td>
        <td align="left" class="star">*</td>
      </tr>
      <tr>
        <td height="72" align="right" class="normal_text">&nbsp;</td>
        <td align="center" class="normal_text">&nbsp;</td>
        <td align="left"><input type="submit" name="Submit" id="Submit" value="Submit" /></td>
        <td>&nbsp;</td>
      </tr>
    </table>
    </form>
    </td>
  </tr>
</table>
<?php include("footer.php"); ?>
<script>
	var chk_pass = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#%^&*])[a-zA-Z0-9!@#$%^&*]{8,16}$/;
	function validate()
	{
		var original = form.original.value;
		var newp = form.newp.value;
		var confirmp = form.confirmp.value;
		var flag = 1;
		if(!chk_pass.test(original))
		{
			document.getElementById('o').innerHTML = "Invalid Password. Password must contain a capital letter, a number and a special character. Paswword can be min 8 and max 16 char long.";
			if(flag=1)
				form.original.focus;
			flag = 0;	
		}
		else
			document.getElementById('o').innerHTML = "";
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