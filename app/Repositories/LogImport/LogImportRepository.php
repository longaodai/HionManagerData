<?php

namespace App\Repositories\LogImport;

use App\Models\LogImport;
use App\Repositories\BaseRepository;

class LogImportRepository extends BaseRepository implements LogImportRepositoryInterface
{
    public function __construct(LogImport $logImport)
    {
        $this->app = $logImport;
    }

    public function getList($params)
    {
        return $this->app->all();
    }

    public function find($params)
    {
        return $this->app->find($params);
    }

    public function store($params)
    {
        return $this->app->insert($params);
    }

    public function update($params, $option)
    {
        return $this->app->find($option['id'])->update($params);
    }

    public function destroy($params)
    {
        return $this->app->destroy($params);
    }
}