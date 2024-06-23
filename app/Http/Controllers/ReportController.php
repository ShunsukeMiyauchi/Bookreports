<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class ReportController extends Controller
{
    public function newreport(Report $newreport)
    {
         return view('Report.Newreport');
    //
    }
    
    public function search(Report $search)
    {
         return view('Report.Search');
    //
    }
}
