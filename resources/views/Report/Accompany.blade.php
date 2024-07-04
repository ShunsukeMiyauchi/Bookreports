<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
             {{ $report->book->title }}のレポート
        </h2>
    </x-slot>
    <html lang="ja">
        <head>
            <meta charset="utf-8">
            <title>accompany_report</title>
            <!-- Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        </head>
        <body>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
             <p>{{$report}}</p>
             <div class='reports'>
                <h2 class='reference'>参照：{{ $report->book->title }}</h2>
            </div>
            <p class='created_at'>作成日時{{ $report->created_at }}</p>
            <p class='updated_at'>編集日時{{ $report->updated_at }}</p>
            <form action='/listbook/edit/{{ $report->id }}' method="POST">
                @csrf
                @method('PUT')
                <div class='text'>
                    <textarea id="text" name="report[body]">{{ $report->body }}</textarea>
                    <p class="text__error" style="color:red">{{ $errors->first('report.body') }}</p>
                </div>
                <input type="hidden" name="book_id" value={{$report->book_id}}>
                <input type="submit" value="テキストを編集"/>
            </form>
            <div class="back">[<a href="/listbook">戻る</a>]</div>
        </div>
        </body>
</x-app-layout>