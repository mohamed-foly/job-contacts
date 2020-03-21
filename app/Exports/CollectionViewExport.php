<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class CollectionViewExport implements FromView
{

    private $view_name;
    private $vars;

    public function __construct(string $view_name,$vars)
    {
        $this->view_name = $view_name;
        $this->vars = $vars;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
    }

    public function view(): View
    {
        return view($this->view_name, $this->vars);
    }
}
