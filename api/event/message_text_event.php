<?php

// ตัวแปร $userId เก็บค่า UserID
// ตัวแปรก $receiveText เก็บค่า ข้อความที่ User ส่งมาครับ
//พอมีคนส่งข้อความมา อยากให้ทำอะไรก็พิมพ์ต่อจากนี้ได้เลย


pushLoadingAnimation($userId);
replyMessages($replyToken,["Hello World"]);


?>
