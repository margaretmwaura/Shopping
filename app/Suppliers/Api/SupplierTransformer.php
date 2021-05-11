<?php


namespace App\Suppliers\Api;


use App\Suppliers\Supplier;
use League\Fractal\TransformerAbstract;

class SupplierTransformer extends TransformerAbstract
{
    public function transform(Supplier $supplier){

        $user = $supplier->user;

        return [
            'id' => $supplier->id,
            'location' => $supplier->location,
            'phone_number' => $supplier->phone_number,
            'name' => $user ? $user->name : null,
            'email' => $user ? $user->email : null,
            'user_id' => $user ? $supplier->user_id : null
        ];
    }
}
