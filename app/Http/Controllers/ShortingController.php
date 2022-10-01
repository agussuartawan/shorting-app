<?php

namespace App\Http\Controllers;

use App\Exports\ExportStockShorted;
use App\Imports\ImportStockAccurate;
use App\Imports\ImportStockSales;
use App\Models\StockAccurate;
use App\Models\StockSale;
use App\Models\StockShorted;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ShortingController extends Controller
{
    public function importStockSales()
    {
        return view('import-stock-sales');
    }

    public function storeStockSales(Request $request)
    {
        StockSale::truncate();
        Excel::import(new ImportStockSales, request()->file('stock_sales'));

        return redirect()->route('home');
    }

    public function importStockAccurate()
    {
        return view('import-stock-accurate');
    }

    public function storeStockAccurate(Request $request)
    {
        StockAccurate::truncate();
        Excel::import(new ImportStockAccurate, request()->file('stock_accurate'));

        return redirect()->route('home');
    }

    public function shorting()
    {
        StockShorted::truncate();
        $stock_sales = StockSale::get();

        foreach($stock_sales as $value){
            $stock_accurate = StockAccurate::where('code', $value->code)->first();
            StockShorted::create([
                'code' => $stock_accurate->code,
                'name' => $stock_accurate->name,
                'stock' => $stock_accurate->stock
            ]);
        }
        
        return redirect()->route('home');
    }

    public function exportPdf()
    {
        $shorted = StockShorted::get();
        $pdf = Pdf::loadview('shorted_pdf',['shorted'=>$shorted]);
    	return $pdf->stream('laporan-stock-pdf');
    }

    public function exportExcel()
    {
        return Excel::download(new ExportStockShorted, 'Stock Opname.xlsx');
    }
}
