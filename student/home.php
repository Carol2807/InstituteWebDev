<?php include("header.php"); ?>
<?php
	include("connect.php"); 
	$r=$_SESSION['rno'];
	$sql = mysqli_query($con,"select name,pname,doa,cno,email,cc,fees,module,img,gender from stu_detail where rno='$r'") or die("Error: ".mysqli_error($con));
	$rs = mysqli_fetch_array($sql);
	$img=$rs[8];
	if(isset($_POST['Login']))
		header("Location:login.php");
?>
          <table width="98%" height="800" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td height="250" valign="top"><table width="100%" height="250" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="25%" height="250" align="left" valign="top"><img src="../images/stu1.png" width="100%" height="250" /></td>
                  <td width="75%" valign="middle"><img src="../images/cooltext330552504239147.png" width="100%" height="150" /></td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td height="550" align="center" valign="top"><table width="98%" height="593" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="29%" align="right" class="sub_heading">User Id</td>
                  <td width="5%" align="center" class="normal_text">:</td>
                  <td width="45%" align="left"><input name="textfield" type="text" class="text_box" id="textfield" value="<?php echo $r; ?>" /></td>
                  <td width="21%" rowspan="6" align="center" valign="top"><img src="../profile/<?php echo $img;?>" width="253" height="259" /></td>
                </tr>
                <tr>
                  <td align="right" class="sub_heading">Name</td>
                  <td align="center" class="normal_text">:</td>
                  <td align="left"><input name="textfield2" type="text" class="text_box" id="textfield2" value="<?php echo $rs[0]; ?>" /></td>
                  </tr>
                <tr>
                  <td align="right" class="sub_heading">Parent's/Guardian's Name</td>
                  <td align="center" class="normal_text">:</td>
                  <td align="left"><input name="textfield3" type="text" class="text_box" id="textfield3" value="<?php echo $rs[1]; ?>" /></td>
                  </tr>
                 <tr>
                  <td align="right" class="sub_heading">Gender</td>
                  <td align="center" class="normal_text">:</td>
                  <td align="left"><input name="textfield3" type="text" class="text_box" id="textfield3" value="<?php echo $rs[9]; ?>" /></td>
                  </tr>
                <tr>
                  <td align="right" class="sub_heading">Date of Admission</td>
                  <td align="center" class="normal_text">:</td>
                  <td align="left"><input name="textfield4" type="text" class="text_box" id="textfield4" value="<?php echo $rs[2]; ?>" /></td>
                  </tr>
                <tr>
                  <td align="right" class="sub_heading">Contact Number</td>
                  <td align="center" class="normal_text">:</td>
                  <td align="left"><input name="textfield5" type="text" class="text_box" id="textfield5" value="<?php echo $rs[3]; ?>" /></td>
                  </tr>
                <tr>
                  <td height="52" align="right" class="sub_heading">Email ID</td>
                  <td align="center" class="normal_text">:</td>
                  <td align="left"><input name="textfield6" type="text" class="text_box" id="textfield6" value="<?php echo $rs[4]; ?>" /></td>
                  </tr>
                <tr>
                  <td height="53" align="right" class="sub_heading">Course Code</td>
                  <td align="center" class="normal_text">:</td>
                  <td align="left"><input name="textfield7" type="text" class="text_box" id="textfield7" value="<?php echo $rs[5]; ?>" /></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td height="54" align="right" class="sub_heading">Fees</td>
                  <td align="center" class="normal_text">:</td>
                  <td align="left"><input name="textfield9" type="text" class="text_box" id="textfield9" value="<?php echo $rs[6]; ?>" /></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td height="55" align="right" class="sub_heading">Modules</td>
                  <td align="center" class="normal_text">:</td>
                  <td align="left"><input name="textfield10" type="text" class="text_box" id="textfield10" value="<?php echo $rs[7]; ?>" /></td>
                  <td>&nbsp;</td>
                </tr>
              </table></td>
            </tr>
          </table>
<?php include("footer.php"); ?>