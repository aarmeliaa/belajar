<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use App\Mail\SendEmail;

class SendEmailController extends Controller
{
    public function index(){
        $content = [
            'name' => 'Azzahra dari STUDIVINE',
            'subject' => 'Halo :3',
            'body' => 'Ini adalah isi email yang dikirim dari Laravel'
        ];

        Mail::to('faradisy20@gmail.com')->send(new 
        SendEmail($content));

        return "Email berhasil dikirim.";
    }
}
