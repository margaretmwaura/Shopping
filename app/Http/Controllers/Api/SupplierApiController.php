<?php


namespace App\Suppliers\Api;


use App\Http\Controllers\ApiController;
use League\Fractal\Resource\Collection;
use App\Suppliers\Supplier;

class SupplierApiController extends ApiController
{

    public function index()
    {
        $suppliers = new Supplier();

        $paginated = $this->sortAndPaginate($suppliers);

        $resource = new Collection($paginated['model'], new SupplierTransformer());

        $this->addPaginationToResource($paginated, $resource);

        return $this->fractal->createData($resource)->toJson();
    }
}
