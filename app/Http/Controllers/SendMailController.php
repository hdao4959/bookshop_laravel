<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendMailController extends Controller
{
    public function send(){
        $title = 'Thư liên hệ';
        $hoten = "Đào Xuân Hải";
        $noidung = "Bạn có ý kiến gì không?";

        Mail::mailer()->to('haidxph41241@fpt.edu.vn')
        ->send(new SendMail($title, $noidung, $hoten));
        return "Gửi mai thành công";
    }
}
