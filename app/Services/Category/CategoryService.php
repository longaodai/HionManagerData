<?php

namespace App\Services\Category;

use App\Repositories\Category\CategoryRepositoryInterface;
use App\Services\BaseService;

class CategoryService extends BaseService implements CategoryServiceInterface
{
    public function __construct(CategoryRepositoryInterface $categoryRepositoryInterface)
    {
        $this->repository = $categoryRepositoryInterface;
    }

    public function getList($data = null, $options = null)
    {
        return $this->repository->getList($data);
    }

    public function find($data = null)
    {
        return $this->repository->find($data);
    }

    public function update($data = null, $options = null)
    {
        return $this->repository->update($data, $options);
    }

    public function store($data = null)
    {
        return $this->repository->store($data);
    }

    public function destroy($data = null)
    {
        return $this->repository->destroy($data);
    }
}