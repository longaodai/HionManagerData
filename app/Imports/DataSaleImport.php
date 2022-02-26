<?php

namespace App\Imports;

use App\Models\Data;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class DataSaleImport implements ToModel, WithChunkReading
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Data([
            'name_customer' => $row[0],
            'phone'    => $row[1], 
            'address' => $row[2],
            'store' => $row[3],
            'product' => $row[4],
            'price' => $row[5],
        ]);
    }

    public function chunkSize(): int
    {
        return 500;
    }
}
