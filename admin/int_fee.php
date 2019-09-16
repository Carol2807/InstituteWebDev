<?php include("header.php");?>
<?php
	include("connect.php");
	$rno="Select Roll Number";
	$name="";
	$cc="";
	$m="";
	$img="";
	$sum="";
	$balance="";
	$f="";
	$msg="";
	$pay="Select Mode of Payment";
	$amount="";
	$bank="";
	$cheque="";
	if($_POST)
	{
		$sql = mysqli_query($con,"select rno, name, cc, fees, img from stu_detail where rno = '$_POST[rno]'");
		$rs=mysqli_fetch_array($sql);
		$rno=$rs[0];
		$name=$rs[1];
		$cc=$rs[2];
		$f=$rs[3];
		$img=$rs[4];
		$sql = mysqli_query($con,"select amount from fee_detail where rno = '$_POST[rno]'");
		$sum=0;
		while($rs=mysqli_fetch_array($sql))
			$sum += $rs[0];
		$balance = $f-$sum;
		$pay=$_POST['pay'];
		$amount=$_POST['amount'];
		$bank=$_POST['bank'];
		$cheque=$_POST['cheque'];
		if($balance==0)
			$msg="You don't have to pay anything...";
		else
			$msg="You have to pay Rs.".$balance." ...";
	}
	if(isset($_POST['Submit']))
	{
		$cd = date('d-m-y');
		$sql = mysqli_query($con,"insert into fee_detail values('$_POST[reciept]','$_POST[rno]','$_POST[amount]','$_POST[pay]','$_POST[bank]', 	 '$_POST[cheque]','$cd')")or die("Some error occurred : ".mysqli_error($con));
		$rno="Select Roll Number";
		$name="";
		$cc="";
		$m="";
		$img="";
		$sum="";
		$balance="";
		$f="";
		$msg="";
		$pay="Select Mode of Payment";
		$amount="";
		$bank="";
		$cheque="";
		$msg="Details submitted...";
	}
	$sql=mysqli_query($con,"select reciept from fee_detail order by reciept desc") or die("Error".mysqli_error($con));
	$rs=mysqli_fetch_array($sql);
	$reciept=$rs['reciept']+1;
?>
<form method="post" name="form" onsubmit="return validate();" >
	<table width="100%" height="680" border="0" cellpadding="0" cellspacing="0">
    	<tr>
        	<td height="50" align="center" class="sub_heading">Student's Installment Fee Details</td>
        </tr>
        <tr>
        	<td height="30" align="center" class="message"><?php echo $msg;?></td>
        </tr>
        <tr>
            <td height="50" class="sub_heading2">Student's Details</td>
        </tr>
        <tr>
            <td height="225" align="left" valign="top">
            <table width="96%" height="271" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="28%" align="right" class="normal_text">Roll Number</td>
                <td width="4%" align="center" class="normal_text">:</td>
                <td width="46%" align="left">
                <select name="rno" class="text_box" id="rno" onchange="submit()">
                <option value="<?php echo $rno;?>" selected="selected"> <?php echo $rno;?></option>
                	<?php
				  		$sql = mysqli_query($con,"select rno from stu_detail");
						while($rs=mysqli_fetch_array($sql))
						{
				  	?>
                <option value="<?php echo $rs[0];?>"><?php echo $rs[0];?></option>
                	<?php
						}
					?>
                </select>
                <div id="r" class="error"></div>
                </td>
                <td width="22%" rowspan="6" align="center" valign="top"><img src="../profile/<?php echo $img;?>" width="225" height="225" /></td>
              </tr>
              <tr>
                <td align="right" class="normal_text">Name</td>
                <td align="center" class="normal_text">:</td>
                <td align="left"><input name="name" type="text" class="text_box" id="name" value="<?php echo $name; ?>" /></td>
                </tr>
              <tr>
                <td align="right" class="normal_text">Course Code</td>
                <td align="center" class="normal_text">:</td>
                <td align="left"><input name="cc" type="text" class="text_box" id="cc" value="<?php echo $cc; ?>" /></td>
                </tr>
              <tr>
                <td align="right" class="normal_text">Fees</td>
                <td align="center" class="normal_text">:</td>
                <td align="left"><input name="f" type="text" class="text_box" id="f" value="<?php echo $f; ?>" /></td>
                </tr>
              <tr>
                <td align="right" class="normal_text">Fees Paid</td>
                <td align="center" class="normal_text">:</td>
                <td align="left"><input name="fp" type="text" class="text_box" id="fp" value="<?php echo $sum; ?>" /></td>
                </tr>
              <tr>
                <td align="right" class="normal_text">Balance Fees</td>
                <td align="center" class="normal_text">:</td>
                <td align="left"><input name="fb" type="text" class="text_box" id="fb" value="<?php echo $balance; ?>" /></td>
                </tr>
            </table></td>
        </tr>
        <tr>
            <td height="50" class="sub_heading2">Fees Details</td>
        </tr>
        <tr>
            <td height="225" valign="top"><table width="98%" height="250" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="27%" align="right" class="normal_text" height="50">Reciept Code</td>
                <td width="4%" align="center" class="normal_text">:</td>
                <td width="66%" align="left"><input name="reciept" type="text" class="text_box" id="reciept" value="<?php echo $reciept;?>" readonly=		"readonly"/></td>
                <td width="3%" align="center" class="star">*</td>
              </tr>
              <tr>
                <td align="right" class="normal_text" height="50">Amount</td>
                <td align="center" class="normal_text">:</td>
                <td align="left"><input name="amount" type="text" class="text_box" id="amount" value="<?php echo $amount;?>" />
                  <div id="am" class="error"></div></td>
                <td align="center" class="star">*</td>
              </tr>
              <tr>
                <td align="right" class="normal_text" height="50">Mode of Payment</td>
                <td align="center" class="normal_text">:</td>
                <td align="left"><select name="pay" class="text_box" id="pay" onchange="submit()">
                  <option value="<?php echo $pay;?>"><?php echo $pay;?></option>
                  <?php if($pay!="Cash"){?>
                  <option value="Cash">Cash</option>
                  <?php }?>
                  <?php if($pay!="Cheque"){?>
                  <option value="Cheque">Cheque</option>
                  <?php }?>
                </select>
                  <div id="mode" class="error"></div></td>
                <td align="center" class="star">*</td>
              </tr>
              <tr>
                <td align="right" class="normal_text" height="50">Bank Name</td>
                <td align="center" class="normal_text">:</td>
                <td align="left"><input name="bank" type="text" class="text_box" id="bank" value="<?php echo $bank;?>" <?php if($pay!="Cheque"){?>Readonly<?php }?>/>
                  <div id="bn" class="error"></div></td>
                <td align="center" class="star">&nbsp;</td>
              </tr>
              <tr>
                <td align="right" class="normal_text" height="50">Cheque No.</td>
                <td align="center" class="normal_text">:</td>
                <td align="left"><input name="cheque" type="text" class="text_box" id="cheque" value="<?php echo $cheque;?>" <?php if($pay!="Cheque"){?>Readonly<?php }?>/>
                  <div id="cheque_n" class="error"></div></td>
                <td align="center" class="star">&nbsp;</td>
              </tr>
            </table></td>
        </tr>
       	<tr>
            <td height="50" align="center"><input type="submit" name="Submit" id="Submit" value="Submit" /></td>
        </tr>
	</table>
</form>
<?php include("footer.php");?>
<script>
	var chk_name=/^[a-zA-Z .]{2,40}$/;
	var chk_am=/^[0-9]{5,25}$/;
	var chk_num=/^[0-9]{6,6}$/;
	function validate()
	{
		var rno = form.rno.value;
		var bal = Number(form.fb.value);
		var amount = Number(form.amount.value);
		var pay = form.pay.value; 
		var bank = form.bank.value;
		var cheque = form.cheque.value;
		var flag = 1;
		
		if(rno=="Select Roll Number")
		{
			document.getElementById('r').innerHTML = "Please select a Roll Number.";
  			if(flag==1)
				form.rno.focus();
  			flag=0;
		}
		else
  			document.getElementById('r').innerHTML = "";
		if(amount=="" || amount>bal)
		{
			document.getElementById("am").innerHTML = "Please enter a valid Amount (less than or equal to Balance Fees).";
			if(flag==1)
				form.amount.focus();
			flag=0;
		}
		else
			document.getElementById("am").innerHTML = "";
		if(pay=="Select Mode of Payment")
		{
			document.getElementById('mode').innerHTML = "Please select a Mode of payment.";
  			if(flag==1)
				form.pay.focus();
  			flag=0;
		}
		else
  			document.getElementById('mode').innerHTML = "";
		if(pay=="Cheque")
		{
			if(!chk_name.test(bank))
			{
				document.getElementById("bn").innerHTML = "Please enter a valid Name.";
				if(flag==1)
					form.bank.focus();
				flag=0;
			}
			else
				document.getElementById("bn").innerHTML = "";
			if(!chk_num.test(cheque))
			{
				document.getElementById("cheque_n").innerHTML = "Please enter a valid Cheque Number.";
				if(flag==1)
					form.cheque.focus();
				flag=0;
			}
			else
				document.getElementById("cheque_n").innerHTML = "";
		}

		if(flag==1)
			return true;
		else
			return false;
	}
</script>