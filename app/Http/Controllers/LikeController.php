<?php

namespace App\Http\Controllers;

use App\Like;
use App\Photo;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class LikeController extends Controller {

  public function changeLikeState(Request $request) {
    //クエリパラメータの取得
    $input = $request->all();
    $photo_id = $input["photo_id"];
    $user_id = $input["user_id"];
    //idの存在チェック．無ければ404エラー．
    Photo::findOrFail($photo_id);
    User::findOrFail($user_id);
    //いいねの更新
    $like=Like::where("photo_id", $photo_id)->where("user_id", $user_id);
    if ($like->count()==0) {  //既にいいねされてなければ追加
      $new_like= new Like();
      $new_like->photo_id = $photo_id;
      $new_like->user_id = $user_id;
      $new_like->save();
    }else { //既にいいねされていれば削除
      $like->delete();
    }
    //いいね数
    $like_count = count(Like::where("photo_id", $photo_id)->get());
    return $like_count;

    // Likeテーブルの内容をjsonで返却
    // return response(Like::all());
  }

  // public function getLikeState(Request $request) {
  //   $input = $request->all();
  //   $photo_id = $input["photo_id"];
  //   $user_id = $input["user_id"];
  //   //idの存在チェック．無ければ404エラー．
  //   Photo::findOrFail($photo_id);
  //   User::findOrFail($user_id);
  //
  //   $like=Like::where("photo_id", $photo_id)->where("user_id", $user_id);
  //   if ($like->count()==0) {  //いいねされてなければ
  //     return 0;
  //   }else { //いいねされていれば
  //     return 1;
  //   }
  // }

  public function getLikeState(Request $request) {
    $input = $request->all();
    $user_id = $input["user_id"];
    //idの存在チェック．無ければ404エラー．
    User::findOrFail($user_id);

    return response(Like::where("user_id", $user_id)->get(["photo_id"]));
  }

}
