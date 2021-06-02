<?php


namespace App\Http\Controllers;


use App\Http\Requests\ProductRequest;
use App\Products\ProductRepository;

class ProductController extends Controller
{

    protected $productRepository;
    public function __construct(
        ProductRepository $productRepository
    ) {
        $this->productRepository = $productRepository;
    }
    public function create(ProductRequest $productRequest, $id = null){

        $input = $productRequest->except('_token');

        if(!is_null($id)){

            $this->productRepository->update($input);

            return response()->json(['status' => 201 , 'message' => 'Product updated successfully']);

        }else{
            $this->productRepository->create($input);

            return response()->json(['status' => 201 , 'message' => 'Product created successfully']);
        }

    }


    public function delete($id){

        $this->productRepository->delete($id);

        return response()->json(['status' => 200 , 'message' => 'Product deleted successfully']);
    }

}
