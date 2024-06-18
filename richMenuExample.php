<?php
include "api/line_function.php";
$richMenuId=createDefaultRichMenu("ระบุไฟล์ JSON ชื่อ rich_menu_template.json");
$richMenuId=json_decode($richMenuId,true);
$richMenuId=$richMenuId['richMenuId'];

echo $richMenuId."<br>";

echo uploadImageToRichMenu($richMenuId,"ระบุ Path ของ Image ที่จะอัปโหลด");

$userId="User ID ที่จะส่ง Rich Menu นี้เข้าไป";
echo pushRichMenuToUser($richMenuId,$userId);

// กรณีต้องการเปลี่ยน Rich Menu กลับไปเป็น Default 
// echo deleteRichMenuFromUser($userId);

?>