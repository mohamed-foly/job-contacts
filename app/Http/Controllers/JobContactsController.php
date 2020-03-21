<?php

namespace App\Http\Controllers;

use App\Exports\CollectionViewExport;
use App\JobContact;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;

class JobContactsController extends Controller
{
    private $excel;

    public function __construct(Excel $excel)
    {
        $this->excel = $excel;
    }

    public function index(Request $request){
        $per_page = $request->perPage ? $request->perPage:10;
        $jobs = JobContact::paginate($per_page)->appends('perPage', $request->perPage);
        $jobs_count = JobContact::count();
        return View('welcome',compact('jobs','jobs_count'));
    }

    public function store(Request $request){
        JobContact::create([
            'company_name'=>$request->company_name,
            'email'=>$request->email,
            'position'=>$request->position
        ]);
        return back();
    }

    public function export(Request $request){
        return $this->excel->download(new CollectionViewExport('excel',['jobs'=>JobContact::all()]), 'job-contracts-'.now().'.xlsx');
    }
}
