<?php

// set default time zone untuk waktu penguploadtan file
date_default_timezone_set('Asia/Jakarta');

session_start();

// koneksi database
$con = mysqli_connect('localhost','root','','rumah_sakit');
if (mysqli_connect_errno()) {
	echo mysqli_connect_error();
}

// fungsi base_url
function base_url($url=null)
{
	$base_url ="http://localhost/rumahsakit/";
	if ($url != null) {
		return $base_url."".$url;
	}else{
		return $base_url;
	}
}

?>