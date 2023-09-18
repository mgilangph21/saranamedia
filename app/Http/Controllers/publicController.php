<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class publicController extends Controller
{
    public function sendEmail(Request $r){
        $emailku = 'ablabalabl@gmail.com';

        $to = $emailku;
        $email_subject = "Pertanyaan dari Website a.n. " . $r->nama;
        $email_body = "Anda meneruma email baru dengan detil berikut. ".
            " \n Name: $name \n ".

"Email: $email_address\n Message \n $message";

$headers = "From: $myemail\n";

$headers .= "Reply-To: $email_address";

mail($to,$email_subject,$email_body,$headers);
    }
}