<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterValidationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use RefreshDatabase;


    public function testNameValidationMessageIsDisplayed(): void
    {
        $response = $this->post('/register', [
            'name' => '', // メールアドレスを空にする
            'email' => 'test@test.com', // 必要項目を入力
            'password' => 'abc12345', // 必要項目を入力
            'password_confirmation' => 'abc12345', // 必要項目を入力
        ]);
        $response->assertSessionHasErrors(['name' => '名前を入力してください。']);
    }
    public function testEmailValidationMessageIsDisplayed(): void
    {
        $response = $this->post('/register', [
            'name' => 'test', // メールアドレスを空にする
            'email' => '', // 必要項目を入力
            'password' => 'abc12345', // 必要項目を入力
            'password_confirmation' => 'abc12345', // 必要項目を入力
        ]);
        $response->assertSessionHasErrors(['email' => 'メールアドレスを入力してください。']);
    }
    public function testPasswordValidationMessageIsDisplayed(): void
    {
        $response = $this->post('/register', [
            'name' => 'test', // メールアドレスを空にする
            'email' => 'test@test.com', // 必要項目を入力
            'password' => '', // 必要項目を入力
            'password_confirmation' => 'abc12345', // 必要項目を入力
        ]);

        //dd(session()->get('errors'));
        $response->assertSessionHasErrors(['password' => 'パスワードを入力してください。']);
    }
    public function testConfirmedPasswordValidationMessageIsDisplayed(): void
    {
        $response = $this->post('/register', [
            'name' => 'test', // メールアドレスを空にする
            'email' => 'test@test.com', // 必要項目を入力
            'password' => 'abc12345', // 必要項目を入力
            'password_confirmation' => 'abc12344', // 必要項目を入力
        ]);

        //dd(session()->get('errors'));
        $response->assertSessionHasErrors(['password' => 'パスワードと一致しません。']);
    }

    public function testSuccessRegister(): void
    {
        $response = $this->post('/register', [
            'name' => 'test', // メールアドレスを空にする
            'email' => 'test@test.com', // 必要項目を入力
            'password' =>  'abc12345', // 必要項目を入力
            'password_confirmation' =>  'abc12345', // 必要項目を入力
        ]);
        echo "\nレスポンスコード: ", $response->status(), "\n";
        $response->assertStatus(302);
         //dd(session()->get('errors'));
        $response->assertSessionDoesntHaveErrors(['email', 'password']);

        // 会員情報が保存されていることを確認
        $this->assertDatabaseHas('users', [
            'name' => 'test', // メールアドレスを空にする
            'email' => 'test@test.com', // 必要項目を入力
            //'password' =>  'abc12345', // 必要項目を入力
       ]);

        // ダイレクト先：index()経由メール誘導画面につき未実施
        //$response->assertRedirect('/login');
    }
}
