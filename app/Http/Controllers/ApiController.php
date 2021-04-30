<?php

namespace App\Http\Controllers;

use App\Http\Controllers\DataTables\SortFilterPaginateInterface;
use HumanResource\Api\DataTables\SortFilterPaginateTrait;
use Illuminate\Support\Facades\Response;
use League\Fractal\Manager;


abstract class ApiController extends Controller implements SortFilterPaginateInterface
{
    use SortFilterPaginateTrait;

    protected $fractal;
    /**
     * @var int
     */
    private $statusCode = 200;

    /**
     * ApiController constructor.
     *
     * @param $fractal
     */
    public function __construct()
    {
        $this->fractal = new Manager();
    }

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param int $statusCode
     * @return $this
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * @param $data
     * @param array $headers
     */
    public function respond($data, $headers = [])
    {
        return \response()->json($data, $this->getStatusCode(), $headers);
    }

    /**
     * @param string $message
     * @return Response
     */
    public function respondWithError($message = 'Not Found')
    {
        return $this->respond(
            [
                'error'=>[
                    'message'=>$message,
                    'status_code'=>$this->getStatusCode()
                ]
            ]
        );
    }

    /**
     * @param string $message
     * @return Response
     */
    public function respondNotFound($message = 'Not Found')
    {
        return $this->setStatusCode(404)->respondWithError($message);
    }

    /**
     * @param string $message
     * @return Response
     */
    public function respondInternalError($message = 'Internal Error')
    {
        return $this->setStatusCode(500)->respondWithError($message);
    }
}

