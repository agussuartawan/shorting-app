<?php

namespace App\Exports;

use App\Models\StockShorted;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportStockShorted implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return StockShorted::select('id', 'code', 'name', 'stock')->get();
    }
}
