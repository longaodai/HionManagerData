<?php

namespace App\Repositories\Keyword;

use App\Models\Keyword;
use App\Repositories\BaseRepository;

class KeywordRepository extends BaseRepository implements KeywordRepositoryInterface
{
    public function __construct(Keyword $keyword)
    {
        $this->app = $keyword;
    }

    public function getList($params)
    {
        return $this->app->all();
    }

    public function insert($params)
    {
        return $this->app->insert($params);
    }

    public function find($params)
    {
        return $this->app->find($params);
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