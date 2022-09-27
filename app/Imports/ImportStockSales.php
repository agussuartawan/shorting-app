<?php

namespace App\Imports;

use App\Models\StockSale;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportStockSales implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new StockSale([
            'code' => $row[0],
            'name' => $row[1],
            'stock' => $row[2],
        ]);
    }
}
