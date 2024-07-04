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
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class='search_item'>
                    <h2 class='text'>本文のキーワード</h2>
                    <p class='search_term'>作成期間で検索</p>
            </div>
    　　　　<div class='reports'>
                @foreach ($reports as $report)
                    <div class='report'>
                        <p class='reference'>参照：{{ $report->book->title }}</p>
                        <p class='created_at'>作成日時{{ $report->created_at }}</p>
                        <h2 class='text'>本文{{ $report->body }}</h2>
                        <p class='updated_at'>編集日時{{ $report->updated_at }}</p>
                    </div>
                    <div class='edit'>
                        <a href="/listreport/{{$report->id}}edit">レポートを編集する</a>
                    </div>
                    <form action="/listreport/{{$report->id}}" id="form_{{ $report->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deletePost({{ $report->id }})">レポートの削除</button> 
                    </form>
                @endforeach
            </div>
            <script>
                function deletePost(id) {
                    'use strict'
                    //console.log'hssss');
                    if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                        document.getElementById(`form_${id}`).submit();
                    }
                }
            </script>
            <div class='paginate'>
                
            </div>
        </div>
        </body>
    </html>
</x-app-layout>
    