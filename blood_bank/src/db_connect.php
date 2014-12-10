<?php
define("HOST", "localhost");
define("USER", "root");			// database user
define("PASSWORD", "root");		// database password
define("DATABASE", "bloodbank");		// database name

$mysqli = new mysqli(HOST,USER,PASSWORD,DATABASE);
?>