<?php
session_start();
require_once 'setting/crud.php';
require_once 'setting/koneksi.php';
require_once 'setting/tanggal.php';

$user=$_POST['username'];
$pass=$_POST['password']; 

//Pengecekan ada data dalam login tidak
$sqladmin = "Select id_admin from tb_admin where username='$user' and password='$pass'";
$sqluser = "Select id_user from tb_user where username='$user' and password='$pass'";

if (CekExist($mysqli,$sqladmin)== true) {
    //JIka data ditemukan
	$_SESSION['admin']=caridata($mysqli,$sqladmin);
	echo "<script>alert('Anda login sebagai Admin')</script>";
	echo "<script>window.location='admin/index.php?hal=beranda';</script>";
} elseif (CekExist($mysqli,$sqluser)== true) {
	$_SESSION['user']=caridata($mysqli,$sqluser);
	$_SESSION['username'] = $user;
	echo "<script>alert('Anda login sebagai User')</script>";
	echo "<script>window.location='user/index.php?hal=beranda';</script>";
} else {
    //Jika tidak ditemukan
	echo "<script>alert('Username atau Password tidak terdaftar')</script>";
	echo "<script>window.location='index.php';</script>";
}

?>