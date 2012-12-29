<?php 

var_dump($db);
		foreach ($db->query("select * from menus") as $row) {
	echo $row['0']."\n";}

	 ?>