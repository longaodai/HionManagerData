<?php

namespace App\Services\DataImport;

use App\Services\BaseService;
use App\Repositories\DataImport\DataImportRepositoryInterface;

class DataImportService extends BaseService implements DataImportServiceInterface
{
    public function __construct(DataImportRepositoryInterface $dataRepositoryInterface)
    {
        $this->repository = $dataRepositoryInterface;
    }

    public function getList($data = null)
    {
        return $this->repository->getList($data);
    }

    public function insert($data)
    {
        $this->repository->insert($data);
    }
}