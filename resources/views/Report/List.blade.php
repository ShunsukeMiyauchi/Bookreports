<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('レポートリスト') }}
        </h2>
    </x-slot>
    <html lang="ja">
        <head>
            <meta charset="utf-8">
            <title>List_report</title>
            <!-- Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        </head>
        <body>
            <div class='search_item'>
                    <h2 class='text'>本文のキーワード</h2>
                    <p class='search_term'>検索する期間</p>
            </div>
    　　　　<div class='reports'>
                @foreach ($reports as $report)
                    <div class='report'>
                        <p class='reference'>参照：{{ $report->book_id }}</p>
                        <p class='created_at'>作成日時{{ $report->created_at }}</p>
                        <h2 class='text'>本文{{ $report->body }}</h2>
                        <p class='updated_at'>編集日時{{ $report->updated_at }}</p>
                    </div>
                    <div class='edit'>
                        <a href="/listreport/{{$report->id}}">テキストを編集する</a>
                    </div>
                @endforeach
            </div>
            <div class='paginate'>
                {{ $reports->links() }}
            </div>
        </body>
    </html>
</x-app-layout>
    