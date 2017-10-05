<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use App\Photo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class UploadController extends Controller {

  public function index(Request $request){
    return view('upload');
  }

  public function store(Request $request){
    // バリデーションチェック
    $rules = ['file' => 'image|max:3000',]; // ルール：入力サイズ3000kB以内
    $validation = Validator::make($request->all(), $rules);
    if ($validation->fails()) {
      return redirect('/')->with('message', 'ファイルを確認してください');
    }

    $path = $request->file('file')->store('public/images/posts'); // storage/app/public/images/postsに保存
    $text = $request->input('discription', 'no message'); // 第2引数：デフォルト値
    $userId = $request->input('user_id');

    // photoテーブルにinsert
    $photo = new Photo();
    $photo->photo_img = $path;
    $photo->datetime = Carbon::now();
    $photo->place = 'tokyo';
    $photo->discription = $text;
    $photo->user_id = $userId;
    $photo->save();

    // echo base_path().'/public/images'.'<br><br>';
    // var_dump($request->file('file'));
    // echo '<br><br>';
    // var_dump($path);

    // $imageName = str_shuffle(time().$request->file('file')->getClientOriginalName()).'.'.$request->file('file')->getClientOriginalExtention();
    // $request->file('file')->move(base_path().'/public/images', $imageName);
    return redirect('/list')->with('message', 'ファイルをアップロードしました');
  }

}
