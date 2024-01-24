<?php
require_once '../setting/crud.php';
require_once '../setting/koneksi.php';
require_once '../setting/tanggal.php';
require_once '../setting/fungsi.php';

if (isset($_POST['tambah'])) {	
	$stmt = $mysqli->prepare("INSERT INTO data_penduduk 
		(nama, nik, alamat, no_telp) 
		VALUES (?, ?, ?, ?)");

	$stmt->bind_param("ssss", $_POST['nama'], $_POST['nik'], $_POST['alamat'], $_POST['no_telp']);

	if ($stmt->execute()) { 
		echo "<script>alert('Data penduduk Berhasil Disimpan')</script>";
		echo "<script>window.location='index.php?hal=penduduk';</script>";	
	} else {
		echo "<script>alert('Data penduduk Gagal Disimpan')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

} elseif (isset($_POST['ubah'])) {
	$stmt = $mysqli->prepare("UPDATE data_penduduk SET 
		nama=?,
		nik=?,
		alamat=?,
		no_telp=?
		where id_penduduk=?");

	$stmt->bind_param("sssss", $_POST['nama'], $_POST['nik'], $_POST['alamat'], $_POST['no_telp'], $_POST['id_penduduk']);

	if ($stmt->execute()) { 
		echo "<script>alert('Data penduduk Berhasil Diubah')</script>";
		echo "<script>window.location='index.php?hal=penduduk';</script>";	
	} else {
		echo "<script>alert('Data penduduk Gagal Diubah')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

} elseif(isset($_GET['hapus'])) {
	$stmt = $mysqli->prepare("DELETE FROM data_penduduk where id_penduduk=?");
	$stmt->bind_param("s", $_GET['hapus']); 

	if ($stmt->execute()) { 
		echo "<script>alert('Data penduduk Berhasil Dihapus')</script>";
		echo "<script>window.location='index.php?hal=penduduk';</script>";	
	} else {
		echo "<script>alert('Data penduduk Gagal Dihapus')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}
?>