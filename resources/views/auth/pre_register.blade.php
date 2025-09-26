@extends('layouts.parents')
@section('title', 'メール仮登録')
@section('content')
<div class="container">
  <h3>メール仮登録</h3>

  <form method="POST" action="{{ route('pre_register_do') }}">
    @csrf

    <div class="form-group">
      <label for="email">メールアドレス</label>
      <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
      @error('email')<div class="text-danger">{{ $message }}</div>@enderror
    </div>

    <button type="submit" class="btn btn-primary">仮登録する</button>
  </form>
</div>
@endsection
