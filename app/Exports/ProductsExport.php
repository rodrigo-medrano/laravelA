<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class ProductsExport implements FromView
//FromCollection
{
    public function view(): \Illuminate\Contracts\View\View
    {
        $products=Product::all();
        return view('products.export',compact('products'));
    }
    /*public function collection()
    {
        return Product::all();
    }*/
}
