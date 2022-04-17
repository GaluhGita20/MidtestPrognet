<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Package;
use Livewire\WithPagination;
use illuminate\Pagination\Paginator;

class TablePackage extends Component
{
    use WithPagination;
    public $searchProduct = '';

    public function render()
    {
        $packages = Package::latest()->Where('name', 'like', '%'.$this->searchProduct.'%')->orWhere('id', 'like', '%'.$this->searchProduct.'%')->paginate(5);
        Paginator::useBootstrap();
        return view('livewire.table-package')->with(compact('packages'));
    }
}
