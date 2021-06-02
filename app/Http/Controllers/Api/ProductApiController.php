<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\ApiController;

use App\Products\Api\ProductTransformer;
use App\Products\Product;
use League\Fractal\Resource\Collection;
use Carbon\Carbon;

class ProductApiController  extends ApiController
{
    public function index()
    {
        $products = Product::all()->map(
            function (Product $product) {
                return (new ProductTransformer())->transform($product);
            }
        );

        return response()->json(['data' => $products]);
    }

    public function getChartData()
    {
        $data = [];

        $products = Product::all()->map(
            function (Product $product) {
                return [
                    'created_at' => Carbon::parse($product->created_at)->format('d')
                ];
            }
        );

        $groupedProducts = $products->groupBy('created_at')->toArray();

        foreach ($groupedProducts as $x => $value) {
            $count = count($groupedProducts[$x]);
//            $arrayData = array($x => $dusers[$x]);
            $arrayData = [];
            array_push($arrayData, $x , $count);
            array_push($data, $arrayData);
        }

        return $data;

    }

}
