<?php

namespace App\Imports;

use App\Models\StockAccurate;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportStockAccurate implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new StockAccurate([
            'code' => $row[0],
            'name' => $row[1],
            'stock' => $row[2],
        ]);
    }
}
