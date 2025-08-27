@extends('layouts.parents')
@section('title', 'EC管理システム-新規登録')
@section('content')
<div class="container">
  <nav aria-label="パンくずリスト">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">トップ</li>
      <li class="breadcrumb-item active" aria-current="page">商品一覧</li>
    </ol>
  </nav>
  {{-- 見出し --}}
  <h3 style="border-bottom: 1px solid #000;border-left: 10px solid #000;padding: 7px;">商品一覧</h3>
  <div class="list">

     <form method="get" class="form-inline mb-3">
      <label class="mr-2">並び替え</label>
      <select name="sort_by" class="form-control mr-2">
        <option value="insert" @if(request('sort_by') === 'insert') selected @endif>販売開始日時</option>
        <option value="price"  @if(request('sort_by') === 'price')  selected @endif>価格</option>
      </select>

      <select name="sort_direction" class="form-control mr-2">
        <option value="desc" @if(request('sort_direction') === 'desc') selected @endif>降順（新しい順 / 高い順）</option>
        <option value="asc"  @if(request('sort_direction') === 'asc')  selected @endif>昇順（古い順 / 安い順）</option>
      </select>

      {{-- 商品名検索--}}
      <div class="ml-2 d-flex align-items-center">
        <label for="goods_name" class="sr-only">商品名検索</label>
        <input
          type="text"
          id="goods_name"
          name="goods_name"
          value="{{ request('goods_name') }}"
          class="form-control mr-2"
          placeholder="商品名で検索">
      </div>

      <button type="submit" class="btn btn-primary">適用</button>
    </form>

    {{ $goods_list->appends(request()->except('page'))->links('pagination::bootstrap-4') }}
    <div class="row">
      {{-- 商品リスト --}}  
      @foreach ($goods_list as $goods)
      <div class="col-md-3 mb-4">
        <div class="card h-100">
          <img class="card-img-top" src="/product-image/dummy.png" alt="商品画像">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">{{ $goods->goods_name }}</h5>
            <p class="card-text mb-1">価格: ¥{{ number_format($goods->goods_price) }}</p>
            <p class="card-text mb-1">在庫: {{ $goods->goods_stock }}個</p>
           {{-- <a href="{{ route('goods_detail', ['id' => $goods->un_id]) }}" class="btn btn-primary mt-auto">詳細を見る</a>--}}
          </div>
        </div>
      </div>
      @endforeach
    </div>
    {{ $goods_list->appends(request()->except('page'))->links('pagination::bootstrap-4') }}
</div>
  
</div>
@endsection
