<?php

namespace App\Services\Data;

interface DataServiceInterface
{
    public function getList($data = null);

    public function addCategoryData($data = null);

    public function addCategoryDataAll($data = null);

}