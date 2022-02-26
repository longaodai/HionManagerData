<?php

namespace App\Repositories\Data;

use App\Models\DataCategory;
use App\Repositories\BaseRepository;

class DataRepository extends BaseRepository implements DataRepositoryInterface
{
    public function __construct(DataCategory $data)
    {
        $this->app = $data;
    }

    public function getList($params)
    {
        if (!empty($params->get('category'))) {
            return $this->app->with('category')->where('category_id', $params->get('category'))
            ->where('status', DATA_USE)->get();
        }

        if (!empty($params->get('categoryNull'))) {
            return $this->app->with('category')->whereNull('category_id')
            ->where('status', DATA_USE)->get();
        }

        if (!empty($params->get('file_import'))) {
            return $this->app->where('file_import', $params->get('file_import'))->get();
        }

        return $this->app->with('category')->where('status', DATA_USE)->get();
    }

    public function insert($params)
    {
        return $this->app->insert($params);
    }

    public function updateIn($params)
    {
        return $this->app->whereIn('id', $params)->update(['status' => DATA_USE]);
    }

    public function updateInHidden($params)
    {
        return $this->app->whereIn('id', $params)->update(['status' => DATA_NOT_USE]);
    }
}