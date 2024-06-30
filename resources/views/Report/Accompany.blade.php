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
        <body>
            <div class='books'>
             <p>{{$accompany}}</p>
             <div class='reports'>
                <h2 class='reference'>参照：{{ $accompany->book_id }}</h2>
            </div>
            <p class='created_at'>作成日時{{ $accompany->created_at }}</p>
            <p class='updated_at'>編集日時{{ $accompany->updated_at }}</p>
            <h2 class='text'>テキスト：{{ $accompany->body }}</h2>
            <form action='/listbook/{{ $accompany->id }}' method="POST">
                @csrf
                @method('PUT')
                <div class='text'>
                    <textarea id="text" name="report[body]"></textarea>
                </div>
                <input type="submit" value="テキストを編集"/>
            </form>
            <!--javascriptなどで「何も変えずlistbookへ戻る」ボタンを-->
        </body>
</x-app-layout>