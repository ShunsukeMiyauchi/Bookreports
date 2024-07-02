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
    
    public function store(Report $report, ReportRequest $request)
    {
        $input = $request['report'];
        $input += ['user_id' => $request->user()->id]; 
         $input += ['book_id' => $request->book_id];
        $report->fill($input)->save();
        return redirect('/listbook');
    }
    
    
    public function accompany(Report $report, Book $book)
    {
        // ID($report)に合致するレコードを抜き出す
        
        $book = Book::find($report->book_id)->title; 
        return view('Report.Accompany')->with(['accompany' => $report, 'book' => $book]);
        //レポート詳細画面
    }
    
    public function update(Report $report, ReportRequest $request)
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
        # 2つのテーブルを結合して変数を返す
        $reports = Report::with('book')->get();
      
        return view('Report.List', compact('reports'));
    //レポート検索画面
    }
    
    public function delete(Report $report)
    {
        //dd($book);
        $report->delete();
        //dd($book);
        return redirect('/listreport');
    }
    
    public function edition(Report $report)
    {
         return view('Report.Edit')->with(['edit' => $report]);
    //レポート編集画面
    }
    
    public function updation(Report $report, ReportRequest $request)
    {
        //dd($request->method());
        $input_report = $request['report'];
        $input_report += ['user_id' => $request->user()->id]; 
        $input_report += ['book_id' => $request->book_id];
        $report->fill($input_report)->save();
        return redirect('/listreport');
    }
}
