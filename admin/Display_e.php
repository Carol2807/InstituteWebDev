<?php include("header.php");
include("connect.php"); 
if($_GET)
{
	$sno=$_GET['s_no'];
	$sql = mysqli_query($con,"delete from enquiry where sno = '$sno'");	
}
?>
<table width="100%" height="500" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="50" class="sub_heading2"> Enquiry Table</td>
  </tr>
  <tr>
    <td height="450" valign="top">
    <link rel="stylesheet" type="text/css" href="css/pagination.css">
	<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <main >
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>S.No.</th>
                    <th>Name</th>
                    <th>Contact No.</th>
                    <th>Email</th>
                    <th>Enquiry</th>
                    <th>Gender</th>
          			<th>City</th>
                    <th>Date of Subission</th>
                    <th>Select</th>                    
                  </tr>
                </thead>
                <tbody>
            <?php
				include("connect.php"); 
				$sql = mysqli_query($con,"select * from enquiry") or die("Error - ".mysqli_error($con));
				$n=0;
				while($rs = mysqli_fetch_array($sql))
				{
					$n+= 1;
			?>
        	<tr class="normal_text">
        		<td><?php echo $n; ?> </td>
            	<td><?php echo $rs[1]; ?></td>
            	<td><?php echo $rs[2]; ?> </td>
            	<td><?php echo $rs[3]; ?> </td>
                <td><?php echo $rs[4]; ?> </td>
            	<td><?php echo $rs[5]; ?> </td>
                <td><?php echo $rs[6]; ?> </td>
            	<td><?php echo $rs[7]; ?> </td>
                <td><div align="center"><a href="enq_detail.php?s_no=<?php echo $rs['sno'];?>" style="text-decoration:none"><img src="../Images/edit.png" alt="Display Record" title="Display Record" border="0" /></a>
                           <a href="Display_e.php?s_no=<?php echo $rs['sno'];?>"  style="text-decoration:none"><img src="../Images/del.png" alt="Delete Record" title="Delete Record" border="0" /></a></div></td>
        	</tr>
        	<?php
				}
			?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </main>
    <script src="css/jquery-3.2.1.min.js"></script>
    <script src="css/main.js"></script>
    <script src="css/pace.min.js"></script>
    <script type="text/javascript" src="css/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="css/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
    </td>
  </tr>
</table>
<?php include("footer.php");?>