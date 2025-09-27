<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmationMail;
use App\Mail\ReplyMail;
use Illuminate\Support\Facades\Session;

class MailController extends Controller
{
    public function sendMail(Request $request)
    {

        //$recipientEmail = session()->get('email');
        //dd($request);
        //$recipientEmail = $request->email; // 新規登録ユーザーのメールアドレス

        // メールを送信
        //Mail::to($recipientEmail)->send(new ConfirmationMail());

        // リクエストデータをセッションに保存
        //Session::flash('requestData', $request->all());
        //dd(1);
        return redirect('verification.send');
    }

    public function sendReply(Request $request)
    {
        $recipientEmail = env('MAIL_FROM_ADDRESS'); // 登録されたメールアドレス
        //$recipientEmail = 'test@test.com'; // 返信先のメールアドレス
        //dd($request);

       // 返信」メールを送信
       Mail::to( $recipientEmail)->send(new ReplyMail());
        return '返信しました。';
        //return redirect()->route('register.addMember');
        //return back();
    }

    public function showEmail(){
        $url = "https://localhost";

        return view('emails.verify_email',['verificationUrl'=> $url]);
    }
}
