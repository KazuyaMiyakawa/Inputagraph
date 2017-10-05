<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class UserController extends Controller {

  public function index(Request $request){
    return view('user');
  }

  public function storeIcon(Request $request){
    // バリデーションチェック
    $rules = ['file' => 'image|max:3000',]; // ルール：入力サイズ3000kB以内
    $validation = Validator::make($request->all(), $rules);
    if ($validation->fails()) {
      return redirect('/')->with('message', 'ファイルを確認してください');
    }

    $path = $request->file('file')->store('public/images/user_icons'); // storage/app/public/images/user_iconsに保存
    $userId = $request->input('user_id');

    // photoテーブルにinsert
    $user = User::where('id', $userId)->update(['icon_img'=>$path]);

    return redirect('/user')->with('message', 'アイコンを変更しました');
  }

  public function storeProfile(Request $request){
    $text = $request->input('profile');
    $userId = $request->input('user_id');

    // photoテーブルにinsert
    $user = User::where('id', $userId)->update(['profile'=>$text]);

    return redirect('/user')->with('message', 'アイコンを変更しました');
  }

  public function logout(){
    Auth::logout();
    return redirect('/');
  }

}
