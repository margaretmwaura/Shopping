<?php


namespace App\Products\Api;

use App\Products\Product;
use League\Fractal\TransformerAbstract;

class ProductTransformer extends TransformerAbstract
{
    public function transform(Product $product){

        $supplier = $product->supplier;

        return [
            'id' => $supplier->id,
            'product_name' => $product->name,
            'description' => $product->description,
            'quantity' => $product->quantity,
            'phone_number' => $supplier->phone_number,
            'name' => $supplier ? $supplier->user->name : null,
            'email' => $supplier ? $supplier->user->email : null,
            'supplier_id' => $supplier ? $supplier->user_id : null
        ];
    }
}
