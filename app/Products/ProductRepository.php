<?php


namespace App\Products;


use App\Products\Product;

class ProductRepository
{
    public function create($input){
        return Product::create($input);
    }

    public function update($input){

        $product = Product::find($input['id']);

        unset($input['id']);

        return $product->update($input);
    }

    public function delete($id){

        $product = Product::find($id);

        $product->delete();
    }
}
