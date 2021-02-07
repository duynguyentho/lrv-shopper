<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use App\User;
use App\CategoriesProduct;
class Categories implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
        return CategoriesProduct::all();
    }
    /**
     * Set header columns
     *
     * @return array
     */
    public function headings() :array {
    	return ['ID', 'Tên danh mục', 'Tình trạng', 'Miêu tả'];
    }
}
