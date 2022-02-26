<?php

namespace App\Services\LogImport;

interface LogImportServiceInterface
{
    public function getList($data = null, $options = null);

    public function store($data = null);

    public function find($data = null);

    public function update($data = null, $options = null);

    public function destroy($data = null);
}