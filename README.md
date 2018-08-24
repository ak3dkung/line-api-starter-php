# line-api-starter-php

โครงสร้างระบบที่ผมใช้คือ Deploy บน Heroku ครับ
แล้วใช้ MySQL ของ MariaDB บน Heroku + ใช้ Cloudinary ในการเก็บภาพที่ User ส่งมา

เริ่มต้น Config ด้วยการตั้ง Webhook ของ LINE มาที่ https://(your_hosting)/api/line_callback.php

วิธีการใช้งาน แบบง่ายๆ
1. แก้ไขข้อมูลใน config.php - Access Token, MySQL และ Cloudinary API
2. เมื่อ Config เรียบร้อย ให้เข้าไปดูใน Folder Event จะมี Event รูปแบบต่างๆ ที่เขียนรับค่าตัวแปรมาไว้แล้ว ไม่ว่าจะเป็น Follow , Message , Postback

Function ที่ใช้ในการส่งข้อความมีดังนี้ครับ
1. ส่งข้อความหา User -> PushMessages(ชื่อ UserId,ข้อความที่ต้องากรส่ง); example : PushMessages($userId,"สวัสดีเหมียว");
2. ส่งปุ่มแบบ Template -> PushTemplateButton($userId,$text,$tn,$title,$button) => $tn คือ ภาพ Thumbnail นะครับ เผื่อใครงง
   2.1 วิธีการสร้างตัวแปร $button ใช้ Code ตามนี้ :
    $uri="ชื่อ Url ที่ กดปุ่มแล้วจะวิ่งไป";
    $arrayBtn=array('type'=>'uri','label'=>'Label จะให้ปุ่มโชว์ว่าอะไร','uri'=>$uri);
    $button=array($arrayBtn);
3. ในกรณีที่ต้องการใช้ Custom Rich Menu ให้ User ใช้ PushRichMenu($userId,$richMenuId) (แต่ต้องไปหา richMenuID มานะครับ)
4. และยกเลิก Rich Menu ด้วยคำสั่งนี้ DeleteRichMenu($userId);
