<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\ApiController;
use App\Suppliers\Api\SupplierTransformer;
use Carbon\Carbon;
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

    public function getChartData()
    {
        $data = [];

        $suppliers = Supplier::all()->map(
            function (Supplier $supplier) {
                return [
                    'created_at' => Carbon::parse($supplier->created_at)->format('d')
                ];
            }
        );

        $groupedSuppliers = $suppliers->groupBy('created_at')->toArray();

        foreach ($groupedSuppliers as $x => $value) {
            $count = count($groupedSuppliers[$x]);
//            $arrayData = array($x => $dusers[$x]);
            $arrayData = [];
            array_push($arrayData, $x , $count);
            array_push($data, $arrayData);
        }

        return $data;

    }
}
