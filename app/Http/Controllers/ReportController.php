<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReportRequest;
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
        return redirect('/listbook');
    }
    
    public function stored(Report $report, ReportRequest $request) // 引数をRequestからReportRequestにする
    {
        $input = $request['report'];
        $report->fill($input)->save();
        return redirect('/listbook/{newreport}');
    }
    
    public function accompany($accompany)
    {
        //dd($accompany);
        // ID($accompany)に合致するレコードを抜き出す
        $accompany = Report::find($accompany);
        return view('Report.Accompany')->with(['accompany' => $accompany]);
        //レポート詳細画面
    }
    
    public function update(ReportRequest $request, Report $accompany)
    {
        //dd($request);
        $input_report = $request['report'];
        $input_report += ['user_id' => $request->user()->id]; 
        $input_report += ['book_id' => $request->book_id];
        $accompany->fill($input_report)->save();
        return redirect('/listbook');
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
    
    public function updation(ReportRequest $request, Report $report)
    {
        //dd($request->method());
        $input_report = $request['report'];
        $input_report += ['user_id' => $request->user()->id]; 
        $input_report += ['book_id' => $request->book_id];
        $report->fill($input_report)->save();
        return redirect('/listreport');
    }
}
