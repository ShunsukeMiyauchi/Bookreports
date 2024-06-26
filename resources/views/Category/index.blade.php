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
                        <p>{{ $book->category->name }}</p>
                        <p class='borrow_at'>貸出日時 {{ $book->borrow_at }}</p>
                        <p class='return_at'>返却日時 {{ $book->return_at }}</p>
                        <a href="/listbo/{{$book->id}}">レポートを作成する</a>
                        <a href="/listboo/{{$book->id}}">レポートを編集する</a>
                    </div>
                    <!--<form action="/posts/{ $post->id }}" id="form_{ $post->id }}" method="post">
                            @csrf
                            @method'DELETE')
                            <button type="button" onclick="deletePost{ $post->id }})">delete</button> 
                    </form>-->
                @endforeach
            </div>
            <div class="back">[<a href="/listbook">本の一覧へ戻る</a>]</div>
        </body>
</x-app-layout>