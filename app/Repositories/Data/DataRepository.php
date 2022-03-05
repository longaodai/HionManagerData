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
        $data = $this->app;
        
        if (! empty($params->get('category'))) {
            $data = $data->where('category_id', $params->get('category'))->where('status', DATA_USE);
        }

        if (! empty($params->get('categoryNull'))) {
            $data = $data->whereNull('category_id');
        }

        if (! empty($params->get('file_import'))) {
            $data = $data->where('file_import', $params->get('file_import'));
        }

        if (! empty($params->get('name_customer'))) {
            $data = $data->where('name_customer', 'LIKE', '%'.$params->get('name_customer').'%');
        }

        if (! empty($params->get('address'))) {
            $data = $data->where('address', 'LIKE', '%'.$params->get('address').'%');
        }

        if (! empty($params->get('store'))) {
            $data = $data->where('store', 'LIKE', '%'. $params->get('store').'%');
        }

        if (! empty($params->get('product'))) {
            $data = $data->where('product', 'LIKE', '%'. $params->get('product') .'%');
        }

        $data = $data->where('status', DATA_USE)->orderByDesc('id');

        return $data->paginate(PAGINATE_PAGE_DEFAULT);
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

    public function all($params) {
        $data = $this->app;

        if (! empty($params->get('export_data'))) {
            $data = $data->select(['name_customer', 'phone', 'address', 'store', 'product', 'price']);
        }

        if (! empty($params->get('category'))) {
            $data = $data->where('category_id', $params->get('category'))->where('status', DATA_USE);
        }

        if (! empty($params->get('categoryNull'))) {
            $data = $data->whereNull('category_id');
        }

        if (! empty($params->get('file_import'))) {
            return $data->where('file_import', $params->get('file_import'));
        }

        if (! empty($params->get('name_customer'))) {
            $data = $data->where('name_customer', 'LIKE', '%'.$params->get('name_customer').'%');
        }

        if (! empty($params->get('address'))) {
            $data = $data->where('address', 'LIKE', '%'.$params->get('address').'%');
        }

        if (! empty($params->get('store'))) {
            $data = $data->where('store', 'LIKE', '%'. $params->get('store').'%');
        }

        if (! empty($params->get('product'))) {
            $data = $data->where('product', 'LIKE', '%'. $params->get('product') .'%');
        }

        return $data->where('status', DATA_USE)->orderByDesc('id')->get();
    }
}