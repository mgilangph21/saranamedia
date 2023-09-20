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
            " \n Name: " . $r->nama ." \n ".
        "eMail asal: ". $r->email . " \n Message \n " . $r->pesan;

        $headers = "From: " . $emailku ."\n";
        $headers .= "Reply-To: ". $r->email;
        mail($to,$email_subject,$email_body,$headers);

        return "ok";
    }

    public function getRoute($a, $id){
        switch($a){
            case 'bill':
                $route = route('editBillboard', $id);
            break;
            case 'led':
                $route = route('editLed', $id);
            break;
            case 'jpo':
                $route = route('editJpo', $id);
            break;
        }
        return $route;
    }
}