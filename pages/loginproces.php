<?php
session_start();
include "koneksi.php";

	$user=$_POST['username'];
	$pass=$_POST['password'];
	$spf="Select * from user where username='$user' and password='$pass'";
	$rs=mysql_query($spf);
	$rw=mysql_fetch_array($rs);
	$rc=mysql_num_rows($rs);
	
	if($rc==1)
	{
		$_SESSION['level']=$rw['level'];
		$_SESSION['username']=$rw['username'];
		$_SESSION['nama']=$rw['nama'];
		$_SESSION['id']=$rw['id'];
		$_SESSION['nip']=$rw['nip'];
		echo "<script>window.location='dashboard.php'</script>";
	}else{
		echo "<script>alert('Username atau Password anda salah! Silahkan periksa kembali.'),window.location='login.php'</script>";
	}

?>