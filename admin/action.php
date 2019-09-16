<?php
	session_start();
	$pid = $_GET['id'];
	include("connect.php");
	if($pid==1)
	{
		if(isset($_POST['Submit']))
		{
			$sql = mysqli_query($con,"select code from courses where code = '$_POST[cc]'");
			if(mysqli_num_rows($sql)==0)
			{
				$sql = mysqli_query($con,"select name from courses where name = '$_POST[cn]'");
				if(mysqli_num_rows($sql)==0)
				{
					$sql = mysqli_query($con,"insert into courses (code,name,dur,fees,module,career) 		values('$_POST[cc]','$_POST[cn]','$_POST[cd]','$_POST[fees]','$_POST[mod]','$_POST[car]')")or die("Some error occurred : ".mysqli_error($con));
					$_SESSION['msg'] = "Course has been added.";
					$_SESSION['code']= "";
					$_SESSION['name']= "";
					$_SESSION['dur']= "";
					$_SESSION['f']= "";
					$_SESSION['m']= "";
					$_SESSION['c']= "";
				}
				else
				{
						$_SESSION['msg'] = "Course name already present.";
						$_SESSION['code']= $_POST[cc];
						$_SESSION['name']= "";
						$_SESSION['dur']= $_POST[cd];
						$_SESSION['f']= $_POST[fees];
						$_SESSION['m']= $_POST[mod];
						$_SESSION['c']= $_POST[car];
				}
			}
			else
			{
				$_SESSION['msg'] = "Course code already present.";
				$_SESSION['code']= "";
				$_SESSION['name']= $_POST[cn];
				$_SESSION['dur']= $_POST[cd];
				$_SESSION['f']= $_POST[fees];
				$_SESSION['m']= $_POST[mod];
				$_SESSION['c']= $_POST[car];
			}
		}
		header('Location:Course_Add.php');
	}
?>