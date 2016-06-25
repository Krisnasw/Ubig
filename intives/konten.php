<?php
error_reporting(E_ALL);

if ($_GET['mod']=='home') {
	# code...
	include "isi.php";
}

elseif ($_GET['mod']=='inbox') {
	# code...
	include "modul/pesan/inbox.php";
}

elseif ($_GET['mod']=='compose') {
	# code...
	include "modul/pesan/email-compose.php";
}

elseif ($_GET['mod']='addblog') {
	# code...
	include "modul/blog/input-blog.php";
}

elseif ($_GET['mod']=='blog') {
	# code...
	include "modul/blog/blog.php";
}

elseif ($_GET['mod']=='seo') {
	# code...
	include "modul/seo/seo.php";
}

else {
	# code...
	include "404.html";
}

?>