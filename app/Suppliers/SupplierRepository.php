<?php


namespace App\Suppliers;


class SupplierRepository
{
    public function create($input){
        return Supplier::create($input);
    }

    public function update($input){

        $supplier = Supplier::find($input['id']);

        return $supplier->update($supplier);
    }

    public function delete($id){

        $supplier = Supplier::find($id);

        $supplier->delete();
    }
}
