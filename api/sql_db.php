<?php

$con = @mysqli_connect($sql_host,$sql_user,$sql_password,$db_name);

if (!$con) {
    echo "Error: " . mysqli_connect_error();
	exit();
}

mysqli_query($con,"SET character_set_results=utf8mb4");
mysqli_query($con,"SET character_set_client=utf8mb4");
mysqli_query($con,"SET character_set_connection=utf8mb4"); 

?>