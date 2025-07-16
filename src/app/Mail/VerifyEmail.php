<?php
// app/Mail/VerifyEmail.php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $verificationUrl;

    public function __construct($verificationUrl)
    {
        $this->verificationUrl = $verificationUrl;
    }

    public function build()
    {
        return $this->view('emails.verify_email') // HTMLビューを指定
                    ->subject('メールアドレスの確認') // 件名を設定
                    ->with([
                        'url' => $this->verificationUrl, // ビューに渡すデータ
                    ]);
    }
}
