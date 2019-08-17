<?php
error_reporting(0);
$rand = rand(1,999999);

/*

   ██████╗ ███████╗████████╗██████╗ ██████╗
   ██╔══██╗██╔════╝╚══██╔══╝██╔══██╗██╔══██╗
   ██████╔╝███████╗   ██║   ██████╔╝██║  ██║
   ██╔══██╗╚════██║   ██║   ██╔══██╗██║  ██║
   ██████╔╝███████║   ██║   ██║  ██║██████╔╝
   ╚═════╝ ╚══════╝   ╚═╝   ╚═╝  ╚═╝╚═════╝

========Random (Letter | Subject)=================
[+] [randstring+]    = Uppercase random string
[+] [randstring-]    = Lowercase random string
[+] [randstring=]    = Mixcase random string
[+] [country]        = Random country
[+] [date]           = Random date
[+] [OS]             = Random OS
[+] [browser]        = Random Browser
[+] [number]         = Random Number
[+] [ip]             = Random IP
==============Random (From Mail)===================
[+] [randstring+]    = Uppercase random string
[+] [randstring-]    = Lowercase random string
[+] [randstring=]    = Mixcase random string
[+] [number]         = Random Number
[+] [default]        = Random 16 Digit String
===================================================

*/

$SENDER         = [ 'token'         => '',
                    'debug'         => 'yes',               // yes - Untuk melihat status sender secara details   | no - Untuk melihat total email yg terkirim
                    'custom_header' => 'yes',               // yes - Untuk menggunakan Custom Header              | no - Jika Tidak menggunakan Custom Header
                    'spoofing'      => 'no',               // yes - Khusus SMTP External / smtp-relay.google.com | no - Jika Menggunakan smtp.gmail.com
                    'fm_generate'   => 'slebew-[number]' ]; // From Mail yang digunakan pada saat generate user

$SMTP           = [ 'auto' => 'yes',                         // yes - Jika menggunakan auto generate SMTP User | no - Jika Membuat SMTP user secara Manual
                    'host' => 'smtp.gmail.com',             // Host SMTP
                    'port' =>  587,                         // Port SMTP SSL ONLY
                    'user' => 'test.users--__-1950370293@wraithband.com', // From Mail untuk spoofing, hiraukan jika menggunakan smtp.gmail.com
                    'pass' => '11111111', ];                // Pass Jangan Diganti Apabila Menggunakan Generate User

$USER_MANUAL    = [ 'sabar-pangkalkaya111@sayangku61.info', ];       // Isi Jika Ingin Create User Relay Sendiri :D

$SEND           = [ 'type' => 'bcc',                        // bcc - Untuk Mode BCC | to - Untuk Mode TO
                    'to'   => 'customer@mail.appIe.com',   // Isi Jika Menggunakan Mode BCC
                    'list' => 'list/list.txt' ];            // Letak List Klean

$MAIL           = [ 'type'      => 'letter',                              // null - Tanpa Letter | letter - HTML Letter
                    'from_name' => "iCloud Supports . ",            // Nama Pengirim Email
                    'subject'   => '[Order Confirmation] ThanksYou! - Thank you for your purchase . SUB [ Privacy Policy ] | RE: [Ordre resultater] Påminnelse! - Erklæring om nytt kvittering vil ...WCQBO[number]', // Subject Email
                    'letter'    => 'letter/pdf.html',                  // Letak Letter Klean
                    'use_pdf'   => 'no',                                  // yes - Jika Menggunakan Attachment | no - Jika Tidak menggunakan Attachment
                    'pdf'       => 'pdf/owalah.pdf',                          // Letak Attachment Klean
                    'pdf_name'  => 'E-receipt Invoice'.$rand.'.pdf',                // Nama Attachment Di Email
                    'short'     => 'https://bit.ly/a?='.$rand, ]; // Taroh Shortlink disini (Khusus HTML Letter)

$TEST           = [ 'enabled'   => 'yes',                                 // yes - Jika ingin test email per 500 email send | no - Untuk menonaktifkan
                    'my_email'  => 'new.letterku@hotmail.com' ];             // Ganti Emelmu euy jangan ke Emel Ku

$CUST_HEADER    = array( //"X-Priority:1",
                         "X-COMMS-C: false",
                         "X-Attach-Flag: R",
                         //"X-TXN_ID: 735FEF6A-CEC8-4D8B-8CC2-A5F2A0BCB303",
                         "X-Business-Group: iTunes");
                         //"X-DKIM_SIGN_REQUIRED: YES");
                         //"X-SFDC-User: 0057F0000036DKd",
                         //"X-Sender: postmaster@salesforce.com",
                         //"X-mail_abuse_inquiries: http://www.salesforce.com/company/abuse.jsp",
                         //"X-SFDC-TLS-NoRelay: 1",
                         //"X-SFDC-Binding: 1WrIRBV94myi25uB",
                         //"X-SFDC-EmailCategory: workflowActionAlert",
                         //"X-SFDC-EntityId: 01W7F000000XwFC",
                         //"X-SFDC-Interface: internal");
                          //"X-RCIS-Action: FOLLOW",
                          //"X-Facebook-Notify: fonhjrqselypkwiqovlcb",
                          //"x-msw-jemd-newsletter: true",
                         // "X-Facebook-Notify: fonhjrqsely.$rand.",
                         // "X-Job: JEJNDPBXDDRPGJI(.$rand.)");
?>