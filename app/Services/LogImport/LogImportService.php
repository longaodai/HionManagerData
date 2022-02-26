<?php

namespace App\Services\LogImport;

use App\Repositories\LogImport\LogImportRepositoryInterface;
use App\Services\BaseService;

class LogImportService extends BaseService implements LogImportServiceInterface
{
    public function __construct(LogImportRepositoryInterface $logImportRepositoryInterface)
    {
        $this->repository = $logImportRepositoryInterface;
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