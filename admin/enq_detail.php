<?php include("header.php");
	$sno=$_GET['s_no'];
	include("connect.php"); 
	$sql = mysqli_query($con,"select * from enquiry where sno = '$sno'");
	$rs=mysqli_fetch_array($sql);
	$sno=$rs[0];
	$n=$rs[1];
	$c=$rs[2];
	$e=$rs[3];
	$en=$rs[4];
	$g=$rs[5];
	$ci=$rs[6];
	$d=$rs[7];
?>
          <table width="98%" height="500" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td height="50" class="sub_heading2">Show Feedback Detail</td>
            </tr>
            <tr>
              <td height="450" valign="top"><table width="93%" height="513" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="25%" height="63" align="right" class="sub_heading">Name</td>
                  <td width="4%" align="center" class="sub_heading">:</td>
                  <td width="71%"><input name="name" type="text" class="text_box" id="name" value="<?php echo $n;?>"/></td>
                </tr>
                <tr>
                  <td height="63" align="right" class="sub_heading">Contact Number</td>
                  <td align="center" class="sub_heading">:</td>
                  <td><input name="cno" type="text" class="text_box" id="cno" value="<?php echo $c;?>"/></td>
                </tr>
                <tr>
                  <td height="63" align="right" class="sub_heading">Email</td>
                  <td align="center" class="sub_heading">:</td>
                  <td><input name="email" type="text" class="text_box" id="email" value="<?php echo $e;?>"/></td>
                </tr>
                <tr>
                  <td height="63" align="right" class="sub_heading">Gender</td>
                  <td align="center" class="sub_heading">:</td>
                  <td><input name="gen" type="text" class="text_box" id="gen" value="<?php echo $g;?>"/></td>
                </tr>
                <tr>
                  <td height="63" align="right" class="sub_heading">City</td>
                  <td align="center" class="sub_heading">:</td>
                  <td><input name="city" type="text" class="text_box" id="city" value="<?php echo $ci;?>"/></td>
                </tr>
                <tr>
                  <td height="63" align="right" class="sub_heading">Date of submission</td>
                  <td align="center" class="sub_heading">:</td>
                  <td><input name="dos" type="text" class="text_box" id="dos" value="<?php echo $d;?>"/></td>
                </tr>
                <tr>
                  <td height="135" align="right" class="sub_heading">Enquiry</td>
                  <td align="center" class="sub_heading">:</td>
                  <td><textarea name="en" cols="45" rows="5" class="text_area" id="en"><?php echo $en;?></textarea></td>
                </tr>
              </table></td>
            </tr>
          </table>
<?php include("footer.php");?>