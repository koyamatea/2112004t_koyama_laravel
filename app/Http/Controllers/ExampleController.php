<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function index ()
    {
       // return "test-controller"; 削除
        
       // return view('example'); 削除
       //return view('child'); 
    //    $text = "Controllerからviewに渡す";
    //     return view('child', [
    //         'text1' => $text, 
    //         'text2' => '【'.$text.'】'// 追加
    //     ]);
        $article = \App\Models\Article::where('id', 1)->first();
        return view('child', [
            'article' => $article
        ]);
    }
}
