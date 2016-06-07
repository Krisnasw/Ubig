<?php
	
	$db = new mysqli('localhost', 'root', '' , 'ubig');

	if ($db->connect_error) {
		die('Koneksi Ke Database Gagal'.$db->connect_error);
	}
?>