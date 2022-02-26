<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\BaseRepository;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    public function __construct(Category $category)
    {
        $this->app = $category;
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