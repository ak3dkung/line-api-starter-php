<?php

$access_token="Enter your token here";

$sql_host="Enter sql host";
$sql_user="SQL Username";
$sql_password="SQL Password";
$db_name="Database Name";


// ระบบของผมจะ Store ภาพที่ User ส่งมาไว้บน Cloudinary นะครับ  ถ้าใครไม่ใช้ ก็ Comment ส่วนนี้ไป แต่ต้องไป Comment ใน ไฟล์ line_callback ด้วยนะครับ ไม่งั้นจะ Error
require 'src/Cloudinary.php';
require 'src/Uploader.php';
require 'src/Api.php';
\Cloudinary::config(array( 
    "cloud_name" => "ชื่อ Cloud", 
    "api_key" => "API KEY", 
    "api_secret" => "API SECRET" 
));
$folderName="ชื่อโฟลเดอร์ของ Cloudinary";

?>