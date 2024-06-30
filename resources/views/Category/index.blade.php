<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            登録されている本
        </h2>
    </x-slot>
    <html lang="ja">
        <head>
            <meta charset="utf-8">
            <title>category_book</title>
            <!-- Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        </head>
        <body>
            <div class='books'>
                @foreach ($books as $book)
                    <div class='book'>
                        <h2 class='title'>{{ $book->title }}</h2>
                        <a href="/categories/{{ $book->category->id }}">{{ $book->category->name }}</a>
                        <a href="/list/{{$book->id}}">カテゴリー編集</a>
                        <a href="/lis/{{$book->id}}">この本のレポートを作成する</a>
                        <a href="/listbook/{{$book->id}}">この本のレポートを見る</a>
                        <p class='borrow_at'>貸出日時 {{ $book->borrow_at }}</p>
                        <p class='return_at'>返却日時 {{ $book->return_at }}</p>
                    </div>
                @endforeach
            </div>
        </body>
</x-app-layout>