<?php
namespace App\Services;

use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;

class ProductImportService
{
    public function import($file)
    {
        Excel::import(new ProductsImport, $file);
    }
}