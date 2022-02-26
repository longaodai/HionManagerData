<?php

namespace App\Services\Keyword;

interface KeywordServiceInterface
{
    public function getList($data = null, $options = null);

    public function insert($data = null);

    public function find($data = null);

    public function update($data = null, $options = null);

    public function destroy($data = null);
}