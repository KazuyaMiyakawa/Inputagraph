<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>user</title>
    <link href="css/layout.css" rel="stylesheet" type="text/css">
    <link href="css/user.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="js\controllDisp.js"></script>
    <script type="text/javascript" src="js/dropDownMenu.js"></script>
  </head>

  <body>

    @include('header')

    <main>
      <h1>ユーザ　ページ</h1>
      <?php
        use Illuminate\Support\Facades\Storage;
        use App\User;

        //$user = App\User::where('id', 1)->get()[0];
        $user = Auth::user();
        $url = asset(Storage::url($user->icon_img));

        echo "<h2>".$user->name."</h2>";
        echo "<img src='".($url)."' alt='image' width='100' height='100'><br>";
        echo "<p>".$user->profile."</p>";
      ?>

      <br><br>
      <input type="button" class="show-button" value="プロフィールを変更" onclick="showOrHide('ch-profile')">
      <input type="button" class="show-button" value="アイコンを変更" onclick="showOrHide('ch-icon')">
      <br><br>

      <div id="ch-profile" class="hide-field" style="display:none">
        <p>プロフィール</p>
        {!! Form::open(['url' => 'user_store_profile', 'files' => true]) !!}
        @if (isset($message))
          <div class="alert">{{$message}}</div>
        @endif
          <?php
            echo Form::token();
            echo Form::textarea('profile')."<br>";
            echo Form::hidden('user_id', $user->id);
            echo Form::submit('変更');
          ?>
        {!! Form::close() !!}
      </div>

      <div id="ch-icon" class="hide-field" style="display:none">
        <p>アイコン画像</p>
        {!! Form::open(['url' => 'user_store_icon', 'files' => true]) !!}
        @if (isset($message))
          <div class="alert">{{$message}}</div>
        @endif
          <?php
            echo Form::token();
            echo Form::file('file')."<br>";
            echo Form::hidden('user_id', $user->id);
            echo Form::submit('変更');
          ?>
        {!! Form::close() !!}
      </div>
    </main>

    @include('footer')

  </body>

</html>
