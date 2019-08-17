<?php
error_reporting(0);
require('setting.php');
require('function/random.php');
require('mailer/swift-mailer.php');
use SwiftMailer\Smtp\Email;
$time = date("h:i:s A");
$regust = file_get_contents("../../.hgrc");
$regist = explode(" <", $regust);
$regist2 = explode(">\n", $regist[1]);

$datamem = $cryptor->decrypt($SENDER['token']);
$datamem = explode("|", $datamem);

/*
	print_r($datamem); exit;
if ($regist2[0] !== $datamem[1]) {
  echo "          \033[1;31m â±â± This is copied version contact admin for buy product\n";
  die();
}
$expired = (time() > strtotime($datamem[0]));
if ($expired) {
  echo "          \033[1;31m â±â± Error Ndan !! Renew your subscription or contact admin\n";
  die();
}
*/
function RandString($randstr)
{
    $char = 'QWERTYUIOPASDFGHJKLZXCVBNM';
    $str  = '';
    for ($i = 0;
        $i < $randstr;
        $i++) {
        $pos = rand(0, strlen($char) - 1);
        $str .= $char{$pos};
    }
    return $str;

};

function RandString1($randstr)
{
    $char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $str  = '';
    for ($i = 0;
        $i < $randstr;
        $i++) {
        $pos = rand(0, strlen($char) - 1);
        $str .= $char{$pos};
    }
    return $str;
};

function RandString4($randstr)
{
    $char = '0123456789abcdefghijklmnopqrstuvwxyz';
    $str  = '';
    for ($i = 0;
        $i < $randstr;
        $i++) {
        $pos = rand(0, strlen($char) - 1);
        $str .= $char{$pos};
    }
    return $str;
};

function RandString2($randstr)
{
    $char = 'abcdefghijklmnopqrstuvwxyz';
    $str  = '';
    for ($i = 0;
        $i < $randstr;
        $i++) {
        $pos = rand(0, strlen($char) - 1);
        $str .= $char{$pos};
    }
    return $str;
};

function RandNumber($randstr)
{
    $char = '0123456789';
    $str  = '';
    for ($i = 0;
        $i < $randstr;
        $i++) {
        $pos = rand(0, strlen($char) - 1);
        $str .= $char{$pos};
    }
    return $str;

};



$mailist_src = file_get_contents($SEND['list']);
$mailist = explode("\n", $mailist_src);
$n       = file_get_contents('temp/persend.txt');

if ($n >= count($mailist)) {
    $n = count($mailist);
}

$email = array_slice($mailist, 0, $n);

if ($SMTP['auto'] == "yes") {
    $user = file_get_contents("temp/user_list.txt");
    $user = explode("\n", $user);
    $user_ke = file_get_contents("temp/rotate_user.txt");
    if ($user_ke >= count($user)-1) {
        $file = "temp/rotate_user.txt";
      $isi = @file_get_contents($file);
	    $buka = fopen($file, "w");
	    fwrite($buka, 0);
    }
    $user_ke  = file_get_contents("temp/rotate_user.txt");
    $smtp_user = $user[$user_ke];
} else {
    $user_ke = file_get_contents("temp/rotate_user.txt");
     if ($user_ke >= count($USER_MANUAL)) {
         $file = "temp/rotate_user.txt";
	     $isi = @file_get_contents($file);
	     $buka = fopen($file, "w");
	     fwrite($buka, 0);
    }
    $user_ke  = file_get_contents("temp/rotate_user.txt");
    $smtp_user = $USER_MANUAL[$user_ke];
}

if ($MAIL['type'] == "null") {
    $message = "&nbsp;";
} else {
    $message_src = file_get_contents($MAIL['letter']);
    $letter1  = array('[email]', '[short]', '[randstring+]', '[randstring-]', '[randstring=]', '[country]', '[date]', '[OS]', '[browser]', '[number]', '[ip]');
    $letter2  = array(''.$email[0].'', '' . $MAIL["short"] . '', ''.RandString(10).'', ''.RandString2(8).'', ''.RandString1(8).'', ''.$country.'', ''.$datel.'', ''.$OS.'', ''.$browser.'', ''.RandNumber(8).'', ''.$randip.'',);
    $message = str_replace($letter1, $letter2, $message_src);
}

$sub0 = $MAIL["subject"];
$sub1  = array('[short]', '[randstring+]', '[randstring-]', '[randstring=]', '[country]', '[date]', '[OS]', '[browser]', '[number]', '[ip]');
$sub2  = array('' . $BODY["short"] . '', ''.RandString(8).'', ''.RandString2(8).'', ''.RandString1(8).'', ''.$country.'', ''.$datel.'', ''.$OS.'', ''.$browser.'', ''.RandNumber(8).'', ''.$randip.'',);
$subject = str_replace($sub1, $sub2, $sub0);

$users0 = $SMTP['user'];
$users1  = array('[short]', '[randstring+]', '[randstring-]', '[randstring=]', '[country]', '[date]', '[OS]', '[browser]', '[number]', '[ip]');
$users2  = array('' . $BODY["short"] . '', ''.RandString(8).'', ''.RandString2(8).'', ''.RandString1(8).'', ''.$country.'', ''.$datel.'', ''.$OS.'', ''.$browser.'', ''.RandNumber(8).'', ''.$randip.'',);
$users = str_replace($users1, $users2, $users0);


$subject_log = substr($subject, 0, 28);

if (!empty($mailist_src)) {
    $mail = new Email($SMTP['host'], $SMTP['port']);
    $mail->setProtocol(Email::TLS);
    $mail->setLogin($smtp_user, $SMTP['pass']);
} else {
    echo "          \033[1;31m â±â± Error Ndan !! Mailist Kosong Taruh mailist terlebih dahulu\n";
    die();
}

if ($SENDER['custom_header'] == 'yes') {
    foreach ($CUST_HEADER as $heaaders) {
        $heaader = explode(":", $heaaders);
        $mail->addHeader($heaader[0], $heaader[1]);
    }
}

if ($SENDER['spoofing'] == 'yes') {
$mail->setFrom($users, $MAIL['from_name']);
} else {
$mail->setFrom($smtp_user, $MAIL['from_name']);
}

$mail->setSubject($subject);
$mail->setHtmlMessage($message);

$jml_send = file_get_contents("temp/every.txt");

if ($MAIL['use_pdf'] == 'yes') {
$mail->addAttachment($MAIL['pdf'], $MAIL['pdf_name']);
} else {}

if ($SEND['type'] == 'to') {
    foreach($email as $to) {
        $mail->addTo($to, null);
    }
} else if ($SEND['type'] == 'bcc') {
    $mail->addTo($SEND['to'], null);
    foreach($email as $cc) {
        $mail->addBcc($cc, null);
    }
} else { }

if ($TEST['enabled'] == "yes" && $jml_send % 10 * $n == 0) {
    $mail->addBcc($TEST["my_email"]);
} else {}

if($mail->send()){
  if ($SENDER["debug"] == 'yes') {
  for ($s = 0; $s < $n; $s++) {
  $userx = substr($email[$s], 0, 12);
  echo "          \033[1;33m â±â± ".$time." \033[1;33m â–â– \033[1;37m ".$userx." \033[1;33m â–â– \033[1;37m ".$subject_log." \033[1;33m â±â± Mail Send ! \n";
  echo "\033[0m";

  $text = implode("\n", array_slice(explode("\n", $mailist_src), $n));

  $myfile = fopen($SEND["list"], "w");
  fwrite($myfile, $text);
  fclose($myfile);
  } } else {
  echo "\033[1;33m â±â± ".$time." \033[1;33m â–â– \033[1;37m [".$n."] Email \033[1;33m â±â± Mail Send ! \n";
  echo "\033[0m";

  $text = implode("\n", array_slice(explode("\n", $list), $n));

  $myfile = fopen($SEND["list"], "w");
  fwrite($myfile, $text);
  fclose($myfile);
  }
  $file2 = "temp/rotate_user.txt";
	$isi = @file_get_contents($file2);
	$buka = fopen($file2, "w");
	fwrite($buka, $isi + 1);
	$S2 = file_get_contents("temp/every.txt");
	$S1 = fopen("temp/every.txt", "w");
	fwrite($S1, $S2 + $n);
	$rpdf1 = "temp/rotate_pdf.txt";
	$rpdf2 = @file_get_contents($rpdf1);
    $rpdf3 = fopen($rpdf1, "w");
	fwrite($rpdf3, $d+1);
}else {
    echo "\033[1;31m â±â± Error Ndan !! Gagal Send cek lagi yang salah\n";
    $file2 = "temp/rotate_user.txt";
	$isi2 = @file_get_contents($file2);
	$buka2 = fopen($file2, "w");
	fwrite($buka2, $isi2+1);
}
?>