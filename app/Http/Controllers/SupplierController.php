<?php


namespace App\Suppliers;


use App\Http\Controllers\Controller;
use App\Http\Requests\SupplierRequest;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    protected $supplierRepository;
    public function __construct(
        SupplierRepository $supplierRepository
    ) {
        $this->supplierRepository = $supplierRepository;
    }
    public function create(SupplierRequest $supplierRequest, $id = null){

        $input = $supplierRequest->except('_token');

        if(!is_null($id)){

            $this->supplierRepository->update($input);

            return response()->json(['status' => 201 , 'message' => 'Supplier updated successfully']);

        }else{
            $this->supplierRepository->create($input);

            return response()->json(['status' => 201 , 'message' => 'Supplier created successfully']);
        }

    }


    public function delete($id){

        $this->supplierRepository->delete($id);

        return response()->json(['status' => 200 , 'message' => 'Supplier deleted successfully']);
    }
}
