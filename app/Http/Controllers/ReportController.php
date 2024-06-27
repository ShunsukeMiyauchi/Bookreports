<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class ReportController extends Controller
{
    public function newreport(Report $newreport)
    {
         return view('Report.Newreport')->with(['book' => $newreport]);
    //新規レポート作成画面
    }
    
    public function store(Request $request, Report $report)
    {
        $input = $request['report'];
        $report->fill($input)->save();
        return redirect('/newreport' . $report->id);
    }
    
    public function listing(Report $report)
    {
        return view('Report.List')->with(['reports' => $report->getPaginateByLimit()]);
    //レポート検索画面
    }
    
    public function edit(Report $edit)
    {
         return view('Report.Edit')->with(['report' => $edit]);
    //レポート編集画面
    }
}
