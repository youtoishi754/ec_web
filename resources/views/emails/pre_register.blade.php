<!doctype html>
<html>
<head>
  <meta charset="utf-8">
</head>
<body>
  <p>仮登録ありがとうございます。</p>
  <p>以下のリンクから本登録を行ってください。</p>
  <p>
    <a href="{{ route('pre_register_confirm', ['token' => $token]) }}">本登録の手続きを行う</a>
  </p>
  <p>このリンクは24時間有効です。</p>
</body>
</html>
