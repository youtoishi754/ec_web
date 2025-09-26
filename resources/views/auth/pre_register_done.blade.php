@extends('layouts.parents')
@section('title', '仮登録完了')
@section('content')
<div class="container">
  <h3>仮登録完了</h3>
  <p>{{ $email }} に確認メールを送信しました（実装環境ではメール送信を有効にしてください）。</p>
  <p>次のステップ: メールに記載されたリンクをクリックして本登録へ進んでください。</p>
  <a href="{{ route('index') }}" class="btn btn-link">トップに戻る</a>
</div>
@endsection
