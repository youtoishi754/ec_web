@extends('layouts.parents')
@section('title', '本登録')
@section('content')
<div class="container">
  <h3>本登録</h3>

  <form method="POST" action="{{ route('pre_register_complete') }}">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">

    <div class="form-group">
      <label for="email">メール</label>
      <input type="email" id="email" class="form-control" value="{{ $email }}" readonly>
    </div>

    <div class="form-group">
      <label for="password">パスワード</label>
      <input type="password" name="password" id="password" class="form-control" required>
    </div>

    <div class="form-group">
      <label for="password_confirmation">パスワード（確認）</label>
      <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">本登録する</button>
  </form>
</div>
@endsection
