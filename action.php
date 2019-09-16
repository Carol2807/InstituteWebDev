<?php
	session_start();
	$pid = $_GET['id'];
	include("connect.php");
	if($pid==1)
	{
		if(isset($_POST['Submit']))
		{
			$cd = date('d-m-y');
			$sql = mysqli_query($con,"insert into feedback(name,cno,email,fb,dos) values('$_POST[name]','$_POST[cno]','$_POST[email]','$_POST[fb]','$cd')")or die("Some error occurred : ".mysqli_error($con));
			$_SESSION['msg'] = "Your feedback has been submitted successfully...";
		}
		header('Location:contactus_new.php');
	}
	else if($pid==2)
	{
		if(isset($_POST['Submit']))
		{
			$cd = date('d-m-y');
			$sql = mysqli_query($con,"insert into enquiry(name,cno,email,enq,gender,city,dos) values('$_POST[name]','$_POST[cno]','$_POST[email]','$_POST[enq]','$_POST[gender]','$_POST[city]','$cd')")or die("Some error occurred : ".mysqli_error($con));
			$_SESSION['msg'] = "Your enquiry has been successfully submitted";
		}
		header('Location:enquiry.php');
	}
	else if($pid==3)
	{
		if(isset($_POST['Submit']))
		{
			$f_name=$_FILES["cv"]["name"];
			$f_tmp_name=$_FILES["cv"]["tmp_name"];
			$sql=mysqli_query($con,"select sno from career order by sno desc") or die("Error".mysqli_error($con));
			$rs=mysqli_fetch_array($sql);
			$sno=$rs['sno']+1;
			$ext=end(explode(".",$f_name));
			if($ext=="pdf" || $ext=="doc" || $ext=="docx" )
			{
				$new_f_name=$sno.'.'.$ext;
				$upload_path="cv/".$new_f_name;	
				move_uploaded_file($f_tmp_name,$upload_path);
				$cd=date('d-m-y');
				$sql=mysqli_query($con,"insert into career values ('$sno','$_POST[name]','$_POST[cno]','$_POST[email]','$_POST[gender]','$_POST[qualification]','$_POST[city]','$new_f_name','$cd')") or die('Error'.mysqli_error($con));	
				$_SESSION['n']="";
				$_SESSION['e']="";
				$_SESSION['cno']="";
				$_SESSION['q']="Select Qualification";
				$_SESSION['c']="Select City";
				$_SESSION['msg']="Your CV has been successfully uploaded...";
			}
			else
			{
				$_SESSION['n']=$_POST['name'];
				$_SESSION['e']=$_POST['email'];
				$_SESSION['cno']=$_POST['cno'];
				$_SESSION['q']=$_POST['qualification'];
				$_SESSION['c']=$_POST['city'];
				$_SESSION['msg']="Please Select a Valid CV File...";
			}
			header('Location:career.php');	
		}
	}
	else if($pid==4)
	{
		$flag=1;
		if(isset($_POST['Submit']))
		{
			$sql = mysqli_query($con,"select id from login where id = '$_POST[rno]'") or die("Error - ".mysqli_error($con));
			if(mysqli_num_rows($sql)==0)
			{
				$sql = mysqli_query($con,"select * from reg_code where rno = '$_POST[rno]' and reg = '$_POST[reg]'") or die("Error - ".mysqli_error($con));
				if(mysqli_num_rows($sql)>0)
				{
					$_SESSION['rno']=$_POST['rno'];
					header('Location:reg2.php');
				}
				else
				{
					$flag=0;
					$_SESSION['msg'] = "Invalid Rollno or Registration code";
				}
						
			}
			else
			{
				$flag=0;
				$_SESSION['msg'] = "User already registered...";
			}
			if($flag==0)
				header('Location:reg.php');
		}
	}
	else if($pid==5)
	{
		if(isset($_POST['Submit']))
		{
			$sql = mysqli_query($con,"insert into login values('$_POST[rno]', '$_POST[ap]', 's')");
			$_SESSION['msg'] = "Values submitted...";
		}
		header('Location:reg.php');
	}
	else if($pid==6)
	{
		if(isset($_POST['Submit']))
		{
			$sql = mysqli_query($con,"select profile from login where id = '$_POST[rno]' and password = '$_POST[pass]'")or die("Error - ".mysqli_error($con));
			$rs = mysqli_fetch_array($sql);
			if(mysqli_num_rows($sql)>0)
			{
				if($rs[0]=='s')
				{
					$_SESSION['rno']=$_POST['rno'];
					header('Location:student\home.php');
				}
				else
				{
					header('Location:admin\logout.php');
				}
			}
			else
			{
				$_SESSION['msg'] = "Invalid details...";
				header('Location:login.php');
			}
		}
	}
?>