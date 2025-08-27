<?php

namespace App\Http\Controllers\Goods;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Requests\Goods\GoodsAddRequest;
use Illuminate\Routing\Controller as BaseController;

class GoodsListController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __invoke(GoodsAddRequest $request)
    {

        // ソートオプションの設定
        if ($request->has('sort_by') && $request->has('sort_direction')) {
            $search_options['sort_by'] = $request->sort_by;
            $search_options['sort_direction'] = $request->sort_direction;
        }


        //商品情報一覧を取得する
        $goods_list = getGoodsList($search_options);
        // echo '<pre>';
        // print_r($goods_list);
        // echo '</pre>';


        return view('goods.list', [
            'goods_list' => $goods_list
        ]);
    }
}
