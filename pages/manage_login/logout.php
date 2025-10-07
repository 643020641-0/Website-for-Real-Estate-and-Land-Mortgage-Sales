<?php
session_start();
session_destroy();
include('../conn.php');


header( "location: /$project_name/ " );

?>