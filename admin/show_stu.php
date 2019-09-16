<?php include("header.php");
	$sno=$_GET['s_no'];
	include("connect.php"); 
	$sql = mysqli_query($con,"select name,pname,cno,email,gender,doa,cc,fees,module from stu_detail where rno='$sno'") or die("Error: ".mysqli_error($con));
	$rs=mysqli_fetch_array($sql);
?>
     <table width="98%" height="500" border="0" cellpadding="0" cellspacing="0">
        <tr>
           <td height="50" class="sub_heading2">Show Student Detail</td>
        </tr>
          <tr>
            <td height="450" valign="top">
              <table width="93%" height="432" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="25%" height="63" align="right" class="sub_heading">Name</td>
                  <td width="4%" align="center" class="sub_heading">:</td>
                  <td width="71%"><input name="name" type="text" class="text_box" id="name" value="<?php echo $rs[0];?>"/></td>
                </tr>
                 <tr>
                  <td width="25%" height="63" align="right" class="sub_heading">Parent's/Guardian's Name</td>
                  <td width="4%" align="center" class="sub_heading">:</td>
                  <td width="71%"><input name="pname" type="text" class="text_box" id="pname" value="<?php echo $rs[1];?>"/></td>
                </tr>
                <tr>
                  <td height="63" align="right" class="sub_heading">Contact Number</td>
                  <td align="center" class="sub_heading">:</td>
                  <td><input name="cno" type="text" class="text_box" id="cno" value="<?php echo $rs[2];?>"/></td>
                </tr>
                <tr>
                  <td height="63" align="right" class="sub_heading">Email</td>
                  <td align="center" class="sub_heading">:</td>
                  <td><input name="email" type="text" class="text_box" id="email" value="<?php echo $rs[3];?>"/></td>
                </tr>
                <tr>
                  <td height="63" align="right" class="sub_heading">Gender</td>
                  <td align="center" class="sub_heading">:</td>
                  <td><input name="gen" type="text" class="text_box" id="gen" value="<?php echo $rs[4];?>"/></td>
                </tr>
                <tr>
                  <td height="63" align="right" class="sub_heading">Date of admission</td>
                  <td align="center" class="sub_heading">:</td>
                  <td><input name="doa" type="text" class="text_box" id="doa" value="<?php echo $rs[5];?>"/></td>
                </tr>
                <tr>
                  <td height="63" align="right" class="sub_heading">Course Code</td>
                  <td align="center" class="sub_heading">:</td>
                  <td><input name="cc" type="text" class="text_box" id="cc" value="<?php echo $rs[6];?>"/></td>
                </tr>
                <tr>
                  <td height="63" align="right" class="sub_heading">Fees</td>
                  <td align="center" class="sub_heading">:</td>
                  <td><input name="f" type="text" class="text_box" id="f" value="<?php echo $rs[7];?>"/></td>
                </tr>
                <tr>
                  <td height="63" align="right" class="sub_heading">Modules</td>
                  <td align="center" class="sub_heading">:</td>
                  <td><input name="m" type="text" class="text_box" id="m" value="<?php echo $rs[8];?>"/></td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
<?php include("footer.php");?>