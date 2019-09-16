<?php include("header.php");?>
<?php
	include("connect.php");
	$cc="Select Course Code";
	$name="";
	$dur="";
	$f="";
	$m="";
	$c="";
	$msg="";
	if($_POST)
	{
		$sql = mysqli_query($con,"select * from courses where code = '$_POST[code]'");
		$rs=mysqli_fetch_array($sql);
		$cc=$rs[0];
		$name=$rs[1];
		$dur=$rs[2];
		$f=$rs[3];
		$m=$rs[4];
		$c=$rs[5];
	}
	if(isset($_POST['Delete']))
	{
		$sql = mysqli_query($con,"delete from courses where code = '$_POST[code]'");
		$msg = "Course Deleted...";
		$cc="Select Course Code";
		$name="";
		$dur="";
		$f="";
		$m="";
		$c="";
	}
?>
          <table width="98%" height="660" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td height="50" align="center" class="sub_heading"><p><img src="../images/cooltext329991573978205.png" width="485" height="68" /></p></td>
            </tr>
            <tr>
              <td height="10" align="center" valign="middle" class="message"><?php echo $msg;?></td>
            </tr>
            <tr>
              <td height="600" align="center" valign="middle">
              <form  method="post" name="form" onsubmit="return validate();" >
              <table width="98%" border="0" cellspacing="0" cellpadding="0" height="596">
                <tr>
                  <td width="16%" height="77" align="right" class="sub_heading">Course Code</td>
                  <td width="3%" align="center" class="normal_text">:</td>
                  <td width="78%" align="left"><select name="code" class="text_box" id="code" onchange="submit()">
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
					
                  </select></td>
                  <td width="3%" align="center" class="star">*</td>
                </tr>
                <tr>
                  <td height="74" align="right" class="sub_heading">Course Name</td>
                  <td align="center" class="normal_text">:</td>
                  <td align="left"><input name="cn" type="text" class="text_box" id="cn" value="<?php echo $name;?>" /></td>
                  <td align="center" class="star">*</td>
                </tr>
                <tr>
                  <td height="77" align="right" class="sub_heading">Course Duration</td>
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
                  <td align="center"><input type="submit" name="Delete" id="Delete" value="Delete" /></td>
                  <td align="center" class="star">&nbsp;</td>
                </tr>
              </table>
              </form>
              </td>
            </tr>
          </table>
<?php include("footer.php");?>
