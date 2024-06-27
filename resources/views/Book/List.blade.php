<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('登録されている本') }}
        </h2>
    </x-slot>
    <html lang="ja">
        <head>
            <meta charset="utf-8">
            <title>List_book</title>
            <!-- Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        </head>
        <body>
            <div class="newbook"><a href="/newbook">新しい本を登録する</a></div>
            <div class='search_item'>
                    <h2 class='title'>タイトル</h2>
                    <h2 class='category'>カテゴリー</h2>
                    <p class='search_term'>作成期間の検索</p>
            </div>
            <div class='books'>
                @foreach ($books as $book)
                    <div class='book'>
                        <h2 class='title'>{{ $book->title }}</h2>
                        <h4 class='category'>カテゴリー{{ $book->category_id }}</h4>
                        <a href="/list/{{$book->id}}">カテゴリー編集</a>
                        <a href="/lis/{{$book->id}}">この本のレポートを作成する</a>
                        <a href="/listbook/{{$book->id}}">この本のレポートを見る</a>
                        <p class='borrow_at'>作成日時 {{ $book->borrow_at }}</p>
                        <p class='return_at'>編集日時 {{ $book->return_at }}</p>
                    </div>
                @endforeach
            </div>
        </body>
</x-app-layout>