<?php
namespace App\Exports;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class CategoriesExport implements FromView
{
    public function view(): \Illuminate\Contracts\View\View
    {
        $categories=Category::all();
        return view('category.reportExcel', compact('categories'));
    }
    /*public function collection()
    {
        return Category::all();
    }*/
}
