<?php


namespace App\Products\Api;

use App\Products\Product;
use League\Fractal\TransformerAbstract;

class ProductTransformer extends TransformerAbstract
{
    public function transform(Product $product){
        return [
            'id' => $product->id,
            'name' => $product->name,
            'description_limited' => str_limit($product->description, 200, $end = '...'),
            'description' => $product->description
        ];
    }
}
