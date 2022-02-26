<?php

namespace App\Services\Keyword;

use App\Repositories\Keyword\KeywordRepositoryInterface;
use App\Services\BaseService;

class KeywordService extends BaseService implements KeywordServiceInterface
{
    public function __construct(KeywordRepositoryInterface $keywordRepositoryInterface)
    {
        $this->repository = $keywordRepositoryInterface;
    }

    public function getList($data = null, $options = null)
    {
        return $this->repository->getList($data);
    }

    public function insert($data = null)
    {
        return $this->repository->insert($data);
    }

    public function find($data = null)
    {
        return $this->repository->find($data);
    }

    public function update($data = null, $options = null)
    {
        return $this->repository->update($data, $options);
    }

    public function destroy($data = null)
    {
        return $this->repository->destroy($data);
    }
}