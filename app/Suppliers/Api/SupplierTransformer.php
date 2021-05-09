<?php


namespace App\Suppliers\Api;


use App\Suppliers\Supplier;
use League\Fractal\TransformerAbstract;

class SupplierTransformer extends TransformerAbstract
{
    public function transform(Supplier $supplier){

        $user = $supplier->user;

        return [
            'location' => $supplier->location,
            'phone_number' => $supplier->phone_number,
            'name' => $user->name,
            'email' => $user->email
        ];
    }
}
