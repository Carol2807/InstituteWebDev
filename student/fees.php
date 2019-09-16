<?php include("header.php"); ?>
<?php 
	include("connect.php"); 
	$r=$_SESSION['rno'];
	if(isset($_POST['Login']))
		header("Location:login.php");
?>
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
                    <th>Reciept Number</th>
                    <th>Amount</th>
                    <th>Mode of Payment</th>
                  </tr>
                </thead>
                <tbody>
                
                  <?php 
			$sql = mysqli_query($con,"select reciept, amount, pay from fee_detail where rno='$r'") or die("Error - ".mysqli_error($con));
			$s=0;
			$n=0;
			while($rs = mysqli_fetch_array($sql))
			{
				$n+= 1;
				$s+= $rs[1];
		?>
        <tr class="normal_text">
        	<td align="center"> <?php echo $n; ?> </td>
            <td align="center"> <?php echo $rs[0]; ?></td>
            <td align="center"> <?php echo $rs[1]; ?> </td>
            <td align="center"> <?php echo $rs[2]; ?> </td>
        </tr>
        <?php
			}
			$sql = mysqli_query($con,"select fees from stu_detail where rno='$r'") or die("Error - ".mysqli_error($con));
			$rs = mysqli_fetch_array($sql);
			$bal = $rs[0]-$s;
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
	<table width="78%" height="164" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="29%" align="right" class="normal_text">Course Fees</td>
        <td width="4%" align="center" class="normal_text">:</td>
        <td width="67%" align="left"><input name="textfield" type="text" class="text_box" id="textfield" value="<?php echo $rs[0]; ?>" /></td>
      </tr>
      <tr>
        <td align="right" class="normal_text">Balance Amount</td>
        <td align="center" class="normal_text">:</td>
        <td align="left"><input name="textfield2" type="text" class="text_box" id="textfield2" value="<?php echo $bal; ?>" /></td>
      </tr>
    </table>
    <?php include("footer.php"); ?>