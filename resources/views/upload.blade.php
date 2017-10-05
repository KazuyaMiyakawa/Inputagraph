<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>upload</title>
    <link href="css/layout.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/dropDownMenu.js"></script>
  </head>

  <body>

    @include('header')

    <main>
      <h1>画像を投稿</h1>

      <!-- フォーム作成 -->
      {!! Form::open(['url' => 'store_upload', 'files' => true]) !!}
      @if (isset($message))
        <div class="alert">{{$message}}</div>
      @endif
        <?php
          use App\User;
          $user = Auth::user();

          echo Form::token();
          echo Form::file('file')."<br><br>";
          echo "コメント<br>";
          echo Form::textarea('discription')."<br><br>";
          echo Form::hidden('user_id', $user->id);
          echo Form::submit('投稿');
        ?>
      {!! Form::close() !!}
    </main>

    @include('footer')

  </body>

</html>
