<?php

namespace App\Services\Data;

use App\Models\Data;
use App\Models\DataCategory;
use App\Services\BaseService;
use App\Repositories\Data\DataRepositoryInterface;
use App\Services\DataImport\DataImportServiceInterface;
use App\Services\Keyword\KeywordServiceInterface;

class DataService extends BaseService implements DataServiceInterface
{
    public function __construct(DataRepositoryInterface $dataRepositoryInterface)
    {
        $this->repository = $dataRepositoryInterface;
    }

    public function getList($data = null)
    {
        return $this->repository->getList($data);
    }

    public function addCategoryData($data = null)
    {
        $dataImportService = app(DataImportServiceInterface::class);
        $dataCategoryNull = $dataImportService->getList(collect(['categoryNull' => true]));
        $dataCategory = $dataCategoryNull->chunk(500);
        $keywordService = app(KeywordServiceInterface::class);
        $dataKeyword = $keywordService->getList();

        foreach ($dataCategory as $category) {
            foreach ($category as $item) {
                $this->repository->insert([
                    'name_customer' => $item->name_customer,
                    'phone' => $item->phone,
                    'address' => $item->address,
                    'store' => $item->store,
                    'product' => $item->product,
                    'price' => $item->price,
                    'category_id' => $this->handleCategory($item, $dataKeyword),
                    'file_import' => $item->file_import,
                    'status' => $item->status,
                ]);
            }
        }
        Data::query()->update(['category_id' => 1]);

        return true;
    }

    private function handleCategory($params, $data)
    {
        $string = mb_strtolower($params->store . ' ' . $params->product, 'UTF-8');
        foreach ($data as $value) {
            $pattern = '/'.preg_quote(mb_strtolower($value->keyword, 'UTF-8'), '/').'/';
            if (preg_match($pattern, $string) == 1) return $value->category_id;
        }

        return CATEGORY_ID_ORTHER;
    }

    public function addCategoryDataAll($data = null)
    {
        $dataImportService = app(DataImportServiceInterface::class);
        $dataCategoryNull = $dataImportService->getList(collect(['categoryAll' => true]));
        $dataCategory = $dataCategoryNull->chunk(500);
        $keywordService = app(KeywordServiceInterface::class);
        $dataKeyword = $keywordService->getList();
        DataCategory::query()->truncate();

        foreach ($dataCategory as $category) {
            foreach ($category as $item) {
                $this->repository->insert([
                    'name_customer' => $item->name_customer,
                    'phone' => $item->phone,
                    'address' => $item->address,
                    'store' => $item->store,
                    'product' => $item->product,
                    'price' => $item->price,
                    'category_id' => $this->handleCategory($item, $dataKeyword),
                    'file_import' => $item->file_import,
                    'status' => $item->status,
                ]);
            }
        }
        Data::query()->update(['category_id' => 1]);

        return true;
    }

    public function updateIn($data = null)
    {
        return $this->repository->updateIn($data);
    }

    public function updateInHidden($data = null)
    {
        return $this->repository->updateInHidden($data);
    }

    public function all($data = null)
    {
        return $this->repository->all($data);
    }
}