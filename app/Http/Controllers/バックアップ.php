<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;// store,touroku2の登録完了
use App\Models\Cari;
use App\Models\Storycoment;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ArticleRequest; // 追加

class ArticleController extends Controller
{
    public function list()
    {
        $articles = \App\Models\Storycoment::whereNotNull('story')->get();
        $check = \App\Models\User::get();
        foreach($check as $qen){
            $id_user = $qen->idd;
            if ($id_user === session('id')) {
                $id_user2 = $qen->idd;
                $pw_user2 = $qen->password;
                //指定したハッシュがパスワードにマッチしているかチェック 
                if (password_verify(session('pw'),$pw_user2) && $id_user2 === session('id')) {
                    return view('article.list', [
                    'articles' => $articles
                    ]);
                }
            }
        }
    }
    public function add()
    {
        $processName = session('id');
        return view('article.add', [
            'processName' => $processName
        ]);
    }
    public function store(ArticleRequest $request)
    {
        $processName = '登録'; // 追加
        $article = new Storycoment;
        if ($request->exists('id')) { // 追加
            if (!empty(Storycoment::find($request->title))) {
                $processName = '更新';
                $article = Storycoment::find($request->title);
            }
        }
        $article->fill($request->all())->save();
        return view('article.store', [
            'processName' => $processName // 追加
        ]);
    }
    public function login()
    {
        return view('article.login');
    }
    public function touroku()
    {
        return view('article.touroku');
    }
    public function touroku2()
    {
        mb_language("Japanese");
        mb_internal_encoding("UTF-8");
        $id = $_POST["name"];//ID
        // session(['id_touroku' => $_POST["name"]]);
        $ps = $_POST["pass"];//パスワード
        $to = $_POST["email"]; // 宛先メール
        $email = "From: from@example.com";//送信元
        $subject = "テスト"; // 題名 
        $body = "http://127.0.0.1:8000/users/news\n";
        $header = "From: from@example.com";
        //同じIDまたはメールアドレスがないかDBから検索
        $articl = \App\Models\User::where('idd', $id)->get();
        if ($articl->isempty()){
            mb_send_mail($to, $subject, $body, $header);
           //パスワードハッシュ化
            $pss = bcrypt($ps);
            //メール暗号化
            $password = 'secpass';
           // 暗号化方式
            $method = 'aes-256-cbc';
           // 方式に応じたIVに必要な長さを取得 ランダムな文字列
            $ivLength = openssl_cipher_iv_length($method);
           // IV を自動で生成
            $iv = openssl_random_pseudo_bytes($ivLength);
           // OPENSSL_RAW_DATA と OPENSSL_ZERO_PADDING を指定可
            $options = 0;
            $encrypted = openssl_encrypt($to, $method, $password, $options, $iv);
            //エンコードで保存
            $encode_email = base64_encode($encrypted);
            $iv = base64_encode($iv);
            // SQL実行
            $article = new Cari;
            $article->idd = $id;
            $article->password  = $pss;
            $article->email = $encode_email;
            $article->iv = $iv;
            $article->save();
            $processName =  "メールを送信しました。";
            return view('article.touroku2', [
                'processName' => $processName
            ]);
        }else if($email_data === $to){
            $processName =  "メール送信失敗です。別のメールアドレスで登録してください。";
            return view('article.touroku2', [
                'processName' => $processName
            ]);
        }else if($id_data === $id){
            $processName =  "メール送信失敗です。別のIDで登録してください。";
            return view('article.touroku2', [
                'processName' => $processName
            ]);
        }
    }
    public function news()
    {
        // SQL実行
        $articl = \App\Models\Cari::first();
        $id_touroku = $articl->idd;
        $pw_touroku = $articl->password;
        $em_touroku = $articl->email;
        $iv_touroku = $articl->iv;
        Cari::query()->delete();
        // SQL実行 本登録
        $article = new User;
        $article->idd = $id_touroku;
        $article->password  = $pw_touroku;
        $article->email = $em_touroku;
        $article->iv = $iv_touroku;
        $article->save();
        return view('article.news');
    }
    public function home(Request $request)
    {
        $id1 = $request->input('name1');
        $pw1 = $request->input('pass1');
        //DB接続処理
        $articl = \App\Models\User::get();
        foreach($articl as $qen){
            $id_user = $qen->idd;
            if ($id_user === $id1) {
                $id_user2 = $qen->idd;
                $pw_user2 = $qen->password;
                //指定したハッシュがパスワードにマッチしているかチェック 
                if (password_verify($pw1,$pw_user2) && $id_user2 === $id1) {
                    session(['id' => $id1]);
                    session(['pw' => $pw1]);
                    $men = DB::table('users')
                    ->selectRaw('DATE_FORMAT(created_at, "%Y%m") AS date')
                    ->selectRaw('COUNT(DISTINCT idd) AS total_idd')
                    ->groupBy('date')
                    ->first();
                    $note = DB::table('storycoments')
                    ->selectRaw('DATE_FORMAT(created_at, "%Y%m") AS date2')
                    ->selectRaw('COUNT(DISTINCT title) AS total_title')
                    ->groupBy('date2')
                    ->first();
                    return view('article.home', [
                        'men' => $men,
                        'note' => $note,
                    ]);
                }
            } else if ($id_user === session('id')) {
                $id_user2 = $qen->idd;
                $pw_user2 = $qen->password;
                //指定したハッシュがパスワードにマッチしているかチェック 
                if (password_verify(session('pw'),$pw_user2) && $id_user2 === session('id')) {
                    $men = DB::table('users')
                ->selectRaw('DATE_FORMAT(created_at, "%Y%m") AS date')
                ->selectRaw('COUNT(DISTINCT idd) AS total_idd')
                ->groupBy('date')
                ->first();
                $note = DB::table('storycoments')
                ->selectRaw('DATE_FORMAT(created_at, "%Y%m") AS date2')
                ->selectRaw('COUNT(DISTINCT title) AS total_title')
                ->groupBy('date2')
                ->first();
                return view('article.home', [
                        'men' => $men,
                        'note' => $note,
                    ]);
                }
            }
        }
    }
    public function mod(Request $request)
    {
        $query = Storycoment::where('title', $request->title)->whereNotNull('story');
        $query2 = Storycoment::whereNotNull('coment');
        if (!$query->exists()) {
            abort(404);
        }
        $article = $query->get();
        $article2 = $query2->get();
        return view('Article.mod', [
            'article' => $article,
            'article2' => $article2
        ]);
    }
    public function logout()
    {
        session()->flush();
        return view('article.logout');
    }
}