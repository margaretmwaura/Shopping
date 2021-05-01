<?php

namespace App\Http\Controllers\DataTables\traits;

use Illuminate\Database\QueryException;

/**
 * Class SortFilterPaginateTrait
 *
 * @package HumanResource\Api\DataTables
 */
trait SortFilterPaginateTrait
{
    protected $perPage = 10;

    /**
     * filter, sort and paginate the model
     *
     * @param  $model
     * @return array
     */
    public function sortFilterPaginate($model)
    {
        $filtered = $this->filter($model);

        $sorted = $this->sort($filtered);

        return $this->paginate($sorted);
    }

    /**
     * filter the model
     *
     * @param  $model
     * @return mixed
     */
    public function filter($model)
    {
        $state = \Input::get('tableState');

        //filter
        if (isset($state['search']['predicateObject']['$'])) {
            $query = $state['search']['predicateObject']['$'];

            $model = $model::search($query, null, true);

        }

        return $model;
    }

    /**
     * Sort the model
     *
     * @param  $model
     * @return mixed
     */
    public function sort($model)
    {
        $state = \Input::get('tableState');

        //sort
        if (isset($state['sort'])) {
            try {
                $state['sort']['reverse'] == 'true' ? $dir = 'DESC' : $dir = 'ASC';

                $model = $model->orderBy($state['sort']['predicate'], $dir);
            } catch (QueryException $e) {
            }
        }

        return $model;
    }

    /**
     * Paginate the model
     *
     * @param  $model
     * @return array
     */
    public function paginate($model)
    {
        $page = $model->get();
        $state = \Input::get('tableState');

        //pagination
        if ($state['pagination']) {
            $offset = (int)$state['pagination']['start'];
            $this->perPage = $state['pagination']['number'];
            $model = $model->offset($offset)->take($this->perPage)->get();
        } else {
            $offset = 0;
            $model = $model->offset($offset)->take($this->perPage)->get();
        }
        $totalPages = ceil(count($page) / $this->perPage);

        return [
            'model' => $model,
            'offset' => $offset,
            'total_pages' => $totalPages
        ];
    }

    public function sortAndPaginate($model)
    {
        return $this->paginate($this->sort($model));
    }

    /**
     * Add the pagination information to the resource
     *
     * @param  $paginatedModel
     * @param  \League\Fractal\Resource\Collection $resource
     * @return mixed
     */
    public function addPaginationToResource($paginatedModel, $resource)
    {
        return $resource->setMetaValue('pagination', ['offset' => $paginatedModel['offset'],
            'total_pages' => $paginatedModel['total_pages']]);
    }
}

