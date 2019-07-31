本次應用主要為送禮APP，透過手機掃描NFC Tag，送禮者已將祝福話語、影片、圖片存放至雲端中
當收禮者再次掃描NFC Tag，將引導至由PHP所建立的網頁，並同時看到相關的祝福話語
手機程式部分透過cordova利用javascript 完成
網頁部分則由PHP完成

cordova資料夾內存放送禮者端APP，主要code在"www"資料夾內




timetreasure_php存放後端code，主要code在routes\web.php及app\Http\Controllers\ApplicationController.php內
