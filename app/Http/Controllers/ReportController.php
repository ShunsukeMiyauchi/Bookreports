<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Book; 


class ReportController extends Controller
{
    public function newreport(Book $newreport)
    {
         return view('Report.Newreport')->with(['book' => $newreport]);
    //新規レポート作成画面
    }
    
    public function store(Request $request, Report $report)
    {
        $input = $request['report'];
        $input += ['user_id' => $request->user()->id]; 
         $input += ['book_id' => $request->book_id];
        $report->fill($input)->save();
        return redirect('/listreport');
    }
    
    public function accompany(Report $accompany)
    {
        return view('Report.Accompany')->with(['accompany' => $accompany]);
        //レポート詳細画面
    }
    
    public function updsate(Request $request, Report $report)
    {
        $input = $request['report'];
        $input += ['user_id' => $request->user()->id]; 
        $input += ['book_id' => $request->book_id];
        $report->fill($input)->save();
        return redirect('/listreport');
    }
    
    public function listing(Report $report)
    {
        return view('Report.List')->with(['reports' => $report->getPaginateByLimit()]);
    //レポート検索画面
    }
    
    public function edition(Report $report)
    {
         return view('Report.Edit')->with(['edit' => $report]);
    //レポート編集画面
    }
    
    public function updation(Request $request, Report $report)
    {
        $input = $request['report'];
        $input += ['user_id' => $request->user()->id]; 
        $input += ['book_id' => $request->book_id];
        $report->fill($input)->save();
        return redirect('/listreport');
    }
}
