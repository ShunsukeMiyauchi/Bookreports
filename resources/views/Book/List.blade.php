<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('登録されている本の一覧') }}
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
                    <p class='search_term'>検索する期間</p>
            </div>
            <div class='books'>
                @foreach ($books as $book)
                    <div class='book'>
                        <h2 class='title'>{{ $book->title }}</h2>
                        <a href="/categories/{{ $book->category->id }}">{{ $book->category->name }}</a>
                        <a href="/list/category{{$book->id}}">カテゴリー編集</a>
                        <p class='borrow_at'>貸出日時 {{ $book->borrow_at }}</p>
                        <p class='return_at'>返却日時 {{ $book->return_at }}</p>
                        <a href="/listbo/{{$book->id}}">レポートを作成する</a>
                        <a href="/listboo/{{$book->id}}">レポートを編集する</a>
                        <form action="/listbook/{{$book->id}}" id="form_{{ $book->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="deletePost({{ $book->id }})">本の削除</button> 
                        </form>
                    </div>
                @endforeach
            </div>
            <script>
                function deletePost(id) {
                    'use strict'
                    console.log('hssss');
                    if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                        document.getElementById(`form_${id}`).submit();
                    }
                }
            </script>
        </body>
</x-app-layout>