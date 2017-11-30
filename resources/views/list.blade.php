<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>list</title>
    <link href="css/layout.css" rel="stylesheet" type="text/css">
    <link href="css/modal.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/like.js"></script>
    <script type="text/javascript" src="js/listModal.js"></script>
    <script type="text/javascript" src="js/scrollLayout.js"></script>
    <script type="text/javascript" src="js/dropDownMenu.js"></script>
  </head>

  <body>

    @include('header')

    <main>

      <?php
        use Illuminate\Support\Facades\Storage;
        use App\Photo;
        use App\Like;
        use App\User;

        $photos = App\Photo::all();

        if(Auth::check()){
          $user = Auth::user();
          echo "<div hidden id='user_id'>".$user->id."</div>";

          foreach ($photos as $photo) {
            $url = asset(Storage::url($photo->photo_img));
            $id = $photo->id;
            $photo_user = User::where("id", $photo->user_id)->get();
            $like_count = count(Like::where("photo_id", $id)->get());
            echo "<div id='photo".$id."' class='photo-item'>";
            echo "<div hidden class='photo-id'>".$id."</div>";
            //echo "<div>".$photo_user->name."</div>"; echo var_dump($photo_user);
            echo "<img class='photo modalOpen' src='".$url."' alt='image' width='250' height='250'><br>";
            echo $photo->discription."<br>";
            echo "<ul class='like-field'>";
            echo "<li><input type='image' id='".$id."' class='like-button' src='images/icon_heart_border.png' width='20' height='20'></li>";
            echo "<li><div class='like-count'>".$like_count."</div></li>";
            echo "</ul><br>";
            //modal window
            echo "<div class='modal' id='modal".$id."'><div class='overLay modalClose'></div>";
            echo "<div class='inner'>";
            echo "<img class='modal-photo modalClose' src='".($url)."' alt='image'><br>";
            echo "</div></div>"; //modal end
            echo "</div>\n";
            echo "<hr>\n";
          }
        }else {
          echo "<a href=".route('login').">ログイン</a><br>";
          echo "<a href=".route('register').">ユーザー登録</a>";
        }
      ?>

      <!-- モーダルウィンドウ -->
      <!-- <div class="modal" id="modal01">
        <div class="overLay modalClose"></div>
        <div class="inner">
          モーダルウィンドウ
          <a href="" class="modalClose">Close</a>
        </div>
      </div> -->

    </main>

    @include('footer')

  </body>

</html>
