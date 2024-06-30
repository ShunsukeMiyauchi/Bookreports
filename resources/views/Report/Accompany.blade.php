<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
             {{ $accompany->book_id }}のレポート
        </h2>
    </x-slot>
    <html lang="ja">
        <head>
            <meta charset="utf-8">
            <title>accompany_book</title>
            <!-- Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        </head>
<!--accompanyのこのページは、本のレポートだけを映すページにしたい。
だから大井さんの言っていたリレーションの話になる-->
        <body>
            <div class='books'>
             <p>{{$accompany}}</p>
             <div class='reports'>
                <h2 class='reference'>参照：{{ $accompany->book_id }}</h2>
            </div>
            <p class='created_at'>作成日時{{ $accompany->created_at }}</p>
            <h2 class='text'>本文{{ $accompany->body }}</h2>
            <p class='updated_at'>編集日時{{ $accompany->updated_at }}</p>
            <div class='edit'>
                <a href="/listreport/{{$accompany->id}}">テキストを編集する</a>
            </div>
        </body>
</x-app-layout>