<?php include("header.php");?>
<?php
	include("connect.php");
	$cc="Select Course Code";
	$name="";
	$dur="";
	$f="";
	$pay="Select Mode of Payment";
	$sname="";
	$pname="";
	$doa="";
	$email="";
	$cno="";
	$amount="";
	$bank="";
	$cheque="";
	$msg="";
	$rand=rand(1000,9999).'-'.rand(1000,9999);
	if($_POST)
	{
		$sql = mysqli_query($con,"select code, name, dur, fees, module from courses where code = '$_POST[code]'");
		$rs=mysqli_fetch_array($sql);
		$cc=$rs[0];
		$name=$rs[1];
		$dur=$rs[2];
		$f=$rs[3];
		$m=$rs[4];
		if($_POST['reg']!="")
			$rand=$_POST['reg'];
		$pay=$_POST['pay'];
		$sname=$_POST['name'];
		$pname=$_POST['pname'];
		$doa=$_POST['doa'];
		$email=$_POST['email'];
		$cno=$_POST['cno'];
		$amount=$_POST['amount'];
		$bank=$_POST['bank'];
		$cheque=$_POST['cheque'];
	}
	if(isset($_POST['Submit']))
	{
		$cd = date('d-m-y');
		$img="";
		if($_POST['gender']=="M")
			$img="male.jpg";
		else
			$img="female.jpg";
		$sql = mysqli_query($con,"insert into fee_detail values('$_POST[reciept]','$_POST[rno]','$_POST[amount]','$_POST[pay]','$_POST[bank]', 	 '$_POST[cheque]','$cd')")or die("Some error occurred : ".mysqli_error($con));
		$sql = mysqli_query($con,"insert into reg_code values('$_POST[rno]','$_POST[reg]')")or die("Some error occurred : ".mysqli_error($con));
		$sql = mysqli_query($con,"insert into stu_detail(rno,name,pname,gender,doa,email,cno,cc,fees,module,img) values('$_POST[rno]','$_POST[name]','$_POST[pname]','$_POST[gender]','$_POST[doa]','$_POST[email]','$_POST[cno]','$_POST[code]','$f','$m','$img')")or die("Some error occurred : ".mysqli_error($con));
		$msg="Details Submitted...";
		$cc="Select Course Code";
		$name="";
		$dur="";
		$f="";
		$pay="Select Mode of Payment";
		$sname="";
		$pname="";
		$doa="";
		$email="";
		$cno="";
		$amount="";
		$bank="";
		$cheque="";
	}
	$sql=mysqli_query($con,"select rno from stu_detail order by rno desc") or die("Error".mysqli_error($con));
	$rs=mysqli_fetch_array($sql);
	$rno=$rs['rno']+1;
	$sql=mysqli_query($con,"select reciept from fee_detail order by reciept desc") or die("Error".mysqli_error($con));
	$rs=mysqli_fetch_array($sql);
	$reciept=$rs['reciept']+1;
?>
          <table width="100%" height="1080" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td height="50" align="center" class="sub_heading">Student's Admission Information</td>
            </tr>
            <tr>
              <td height="30" align="center" class="message"><?php echo $msg;?></td>
            </tr>
            <tr>
            	<td height="1000" align="center" valign="top">
              	<form method="post" name="form" onsubmit="return validate();" >
              	<table width="98%" border="0" cellspacing="0" cellpadding="0">
                	<tr>
                		<td height="50" class="sub_heading2">Course Details</td>
                	</tr>
                	<tr>
                		<td height="200" align="center">
                        <table width="98%" border="0" cellspacing="0" cellpadding="0">
                   		<tr>
                    	  	<td width="36%" height="50" align="right" class="normal_text">Course Code</td>
                      		<td width="3%" align="center" class="normal_text">:</td>
                      		<td width="58%" align="left">
                            <select name="code" class="text_box" id="code" onchange="submit()">
                            <option value="<?php echo $cc;?>"> <?php echo $cc;?></option>
                        		<?php
				  					$sql = mysqli_query($con,"select code from courses");
									while($rs=mysqli_fetch_array($sql))
									{
				  				?>
                        		<option value="<?php echo $rs[0];?>"><?php echo $rs[0];?></option>
                        		<?php
									}
								?>
                      			</select><div id="course_code" class="error"></div></td>
                      <td width="3%" align="center" class="star">*</td>
                    </tr>
                    <tr>
                      <td height="50" align="right" class="normal_text">Course Name</td>
                      <td align="center" class="normal_text">:</td>
                      <td align="left"><input name="cn" type="text" class="text_box" id="cn" value="<?php echo $name;?>" readonly="readonly" />
                      </td>
                      <td align="center" class="star">*</td>
                    </tr>
                    <tr>
                      <td height="50" align="right" class="normal_text">Duration</td>
                      <td align="center" class="normal_text">:</td>
                      <td align="left"><input name="dur" type="text" class="text_box" id="dur" value="<?php echo $dur;?>" readonly="readonly" />
                      </td>
                      <td align="center" class="star">*</td>
                    </tr>
                    <tr>
                      <td height="50" align="right" class="normal_text">Course Fees</td>
                      <td align="center" class="normal_text">:</td>
                      <td align="left"><input name="cf" type="text" class="text_box" id="cf" value="<?php echo $f;?>" readonly="readonly" />
                      </td>
                      <td align="center" class="star">*</td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td height="50" class="sub_heading2">Student's Personal Details</td>
                </tr>
                <tr>
                  <td height="400" valign="top"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="36%" height="50" align="right" class="normal_text">Registration Code</td>
                      <td width="3%" align="center" class="normal_text">:</td>
                      <td width="58%" align="left"><input name="reg" type="text" class="text_box" id="reg" value="<?php echo $rand;?>" readonly="readonly" />
                      </td>
                      <td width="3%" align="center" class="star">*</td>
                    </tr>
                    <tr>
                      <td height="50" align="right" class="normal_text">Roll No.</td>
                      <td align="center" class="normal_text">:</td>
                      <td align="left"><input name="rno" type="text" class="text_box" id="rno" value="<?php echo $rno;?>" readonly="readonly" /></td>
                      <td align="center" class="star">*</td>
                    </tr>
                    <tr>
                      <td height="50" align="right" class="normal_text">Student's Name</td>
                      <td align="center" class="normal_text">:</td>
                      <td align="left"><input name="name" type="text" class="text_box" id="name" value="<?php echo $sname;?>" />
                      <div id="n" class="error"></div>
                      </td>
                      <td align="center" class="star">*</td>
                    </tr>
                    <tr>
                      <td height="50" align="right" class="normal_text">Parent's/Gaurdian's Name</td>
                      <td align="center" class="normal_text">:</td>
                      <td align="left"><input name="pname" type="text" class="text_box" id="pname" value="<?php echo $pname;?>" />
                      <div id="pn" class="error"></div>
                      </td>
                      <td align="center" class="star">*</td>
                    </tr>
                    <tr>
                      <td height="50" align="right" class="normal_text">Gender</td>
                      <td align="center" class="normal_text">:</td>
                      <td align="left"><span class="normal_text">
                        <input name="gender" type="radio" value="M" checked="checked" /> Male
						<input name="gender" type="radio" value="F" /> Female
						<input type="radio" name="gender" value="O" /> Others 
                        </span>
                       </td>
                      <td align="center" class="star">*</td>
                    </tr>
                    <tr>
                      <td height="50" align="right" class="normal_text">Date of Admission</td>
                      <td align="center" class="normal_text">:</td>
                      <td align="left"><input name="doa" type="text" class="text_box" id="doa" value="<?php echo $doa;?>" />
                      <div id="date" class="error"></div>
                      </td>
                      <td align="center" class="star">*</td>
                    </tr>
                    <tr>
                      <td height="50" align="right" class="normal_text">Email Id</td>
                      <td align="center" class="normal_text">:</td>
                      <td align="left"><input name="email" type="text" class="text_box" id="email" value="<?php echo $email;?>" />
                      <div id="e" class="error"></div>
                      </td>
                      <td align="center" class="star">*</td>
                    </tr>
                    <tr>
                      <td height="50" align="right" class="normal_text">Contact Number</td>
                      <td align="center" class="normal_text">:</td>
                      <td align="left"><input name="cno" type="text" class="text_box" id="cno" value="<?php echo $cno;?>" />
                      <div id="c" class="error"></div>
                      </td>
                      <td align="center" class="star">*</td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td height="50" class="sub_heading2">Fees Details</td>
                </tr>
                <tr>
                  <td align="center" valign="top"><table width="98%" height="250" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="36%" align="right" class="normal_text" height="50">Reciept Code</td>
                      <td width="3%" align="center" class="normal_text">:</td>
                      <td width="58%" align="left"><input name="reciept" type="text" class="text_box" id="reciept" value="<?php echo $reciept;?>" readonly=		"readonly"/></td>
                      <td width="3%" align="center" class="star">*</td>
                    </tr>
                    <tr>
                      <td align="right" class="normal_text" height="50">Amount</td>
                      <td align="center" class="normal_text">:</td>
                      <td align="left"><input name="amount" type="text" class="text_box" id="amount" value="<?php echo $amount;?>" />
                      <div id="am" class="error"></div>
                      </td>
                      <td align="center" class="star">*</td>
                    </tr>
                    <tr>
                      <td align="right" class="normal_text" height="50">Mode of Payment</td>
                      <td align="center" class="normal_text">:</td>
                      <td align="left"><select name="pay" class="text_box" id="pay" onchange="submit()">
                        <option value="<?php echo $pay;?>"><?php echo $pay;?></option>
                        <?php if($pay!="Cash"){?>
                        <option value="Cash">Cash</option><?php }?>
                        <?php if($pay!="Cheque"){?>
                        <option value="Cheque">Cheque</option><?php }?>
                      </select><div id="mode" class="error"></div>
                      </td>
                      <td align="center" class="star">*</td>
                    </tr>
                    <tr>
                      <td align="right" class="normal_text" height="50">Bank Name</td>
                      <td align="center" class="normal_text">:</td>
                      <td align="left"><input name="bank" type="text" class="text_box" id="bank" value="<?php echo $bank;?>" <?php if($pay!="Cheque"){?>Readonly<?php }?>/>
                      <div id="bn" class="error"></div>
                      </td>
                      <td align="center" class="star">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right" class="normal_text" height="50">Cheque No.</td>
                      <td align="center" class="normal_text">:</td>
                      <td align="left"><input name="cheque" type="text" class="text_box" id="cheque" value="<?php echo $cheque;?>" <?php if($pay!="Cheque"){?>Readonly<?php }?>/>
                      <div id="cheque_n" class="error"></div>
                      </td>
                      <td align="center" class="star">&nbsp;</td>
                    </tr>
                </table></td>
                </tr>
                <tr>
                  <td height="50" align="center"><input type="submit" name="Submit" id="Submit" value="Submit" /></td>
                </tr>
              </table> </form>
              </td>
            </tr>
          </table>
<?php include("footer.php");?>
<script>
 	var chk_name=/^[a-zA-Z .]{2,40}$/;
	var chk_email=/^([a-zA-Z0-9.])+\@(([a-zA-Z0-9])+\.)+([a-zA-Z0-9]{2,4})+$/;
	var chk_cno=/^[0-9\-]{10,12}$/;
	var chk_am=/^[0-9]{4,25}$/;
	var chk_num=/^[0-9]{6,6}$/;
	function validate()
	{
		var code = form.code.value;
		var name = form.name.value;
		var pname = form.pname.value;
		var doa = form.doa.value;
		var email = form.email.value;
		var cno = form.cno.value;
		var amount = form.amount.value;
		var pay = form.pay.value; 
		var bank = form.bank.value;
		var cheque = form.cheque.value;
		var flag = 1;
		if(code=="Select Course Code")
		{
			document.getElementById('course_code').innerHTML = "Please select a Course Code";
  			if(flag==1)
				form.code.focus();
  			flag=0;
		}
		else
  			document.getElementById('course_code').innerHTML = "";
		if(!chk_name.test(name))
		{
			document.getElementById("n").innerHTML = "Please enter a valid Name.";
			if(flag==1)
				form.name.focus();
			flag=0;
		}
		else
			document.getElementById("n").innerHTML = "";
		if(!chk_name.test(pname))
		{
			document.getElementById("pn").innerHTML = "Please enter a valid Parent's/Guardian's Name.";
			if(flag==1)
				form.pname.focus();
			flag=0;
		}
		else
			document.getElementById("pn").innerHTML = "";
		if(doa=="")
		{
			document.getElementById("date").innerHTML = "Please enter a Date.";
			if(flag==1)
				form.doa.focus();
			flag=0;
		}
		else
			document.getElementById("date").innerHTML = "";
		if(!chk_email.test(email))
		{
			document.getElementById("e").innerHTML = "Please enter a valid Email-Id.";
			if(flag==1)
				form.email.focus();
			flag=0;
		}
		else
			document.getElementById("e").innerHTML = "";
		if(!chk_cno.test(cno))
		{
			document.getElementById("c").innerHTML = "Please enter a valid Contact Number.";
			if(flag==1)
				form.cno.focus();
			flag=0;
		}
		else
			document.getElementById("c").innerHTML = "";
		if(!chk_am.test(amount))
		{
			document.getElementById("am").innerHTML = "Please enter a valid Amount.";
			if(flag==1)
				form.amount.focus();
			flag=0;
		}
		else
			document.getElementById("am").innerHTML = "";
		if(pay=="Select Mode of Payment")
		{
			document.getElementById('mode').innerHTML = "Please select a Mode of payment";
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