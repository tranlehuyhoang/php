<?php
// thay các thông số vào đây
$taikhoanmb = '0586218076'; // tài khoản đăng nhập mbbank của bạn tại https://online.mbbank.com.vn
$deviceIdCommon ="q0f7clul-mbib-0000-0000-2023042407433306"; // thay cái thông số mà bạn lấy đc từ F12 vào đây 
$sessionId = "dcaba908-1be3-4e4b-9d79-68d9f74df1ef"; // thay cái thông số mà bạn lấy đc từ F12 vào
$sotaikhoanmb = '104567890';



// PHẦN NÀY ĐỂ NGUYÊN
date_default_timezone_set('Asia/Ho_Chi_Minh');
$time1 = date("YmdHis", time() - 60*60*24*1*9999999).'00';
$time2 = date("YmdHis").'00';
$todate = date("d/m/Y");
$url = 'https://online.mbbank.com.vn/retail_web/common/getTransactionHistory';
$data = array("accountNo" => "$sotaikhoanmb","deviceIdCommon" => "$deviceIdCommon","fromDate"=>"$todate","historyNumber" => "" ,"historyType" => "DATE_RANGE","refNo" => "$taikhoanmb-$time2", "sessionId" =>  "$sessionId","toDate" =>  "$todate","type" => "ACCOUNT"  );

$postdata = json_encode($data);

$ch = curl_init($url); 
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',
'Accept: application/json, text/plain, */*',
'Accept-Encoding: gzip, deflate, br',
'Accept-Language: vi-US,vi;q=0.9',
'Authorization: Basic QURNSU46QURNSU4=',
'Connection: keep-alive',
'Host: online.mbbank.com.vn',
'Origin: https://online.mbbank.com.vn',
'Referer: https://online.mbbank.com.vn/information-account/source-account',
'sec-ch-ua: "Google Chrome";v="105", "Not)A;Brand";v="8", "Chromium";v="105"',
'sec-ch-ua-mobile: ?0',
'sec-ch-ua-platform: "Windows"',
'Sec-Fetch-Dest: empty',
'Sec-Fetch-Mode: cors',
'Sec-Fetch-Site: same-origin',
'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36',
));
$result = curl_exec($ch);
curl_close($ch);
$result_json = json_encode($result);
