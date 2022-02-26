<?php

namespace App\Repositories\DataImport;

use App\Models\Data;
use App\Repositories\BaseRepository;

class DataImportRepository extends BaseRepository implements DataImportRepositoryInterface
{
    public function __construct(Data $data)
    {
        $this->app = $data;
    }

    public function getList($params)
    {
        if (!empty($params->get('category'))) {
            return $this->app->with('category')->where('category_id', $params->get('category'))->get();
        }

        if (!empty($params->get('categoryNull'))) {
            return $this->app->whereNull('category_id')->get();
        }

        if (!empty($params->get('categoryAll'))) {
            return $this->app->all();
        }

        return $this->app->with('category')->get();
    }

    public function insert($param)
    {
        return $this->app->insert($param);
    }
}