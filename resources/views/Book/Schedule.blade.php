<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>current_book</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>返却スケジュール</h1>
        <div class='books'>
            @foreach ($books as $book)
                <div class='book'>
                    <h2 class='title'>タイトル:{{ $book->title }}</h2>
                    <h2 class='borrow_at'>作成日時{{ $book->borrow_at }}</h2>
                    <h2 class='return_at'>編集日時{{ $book->return_at }}</h2>
                </div>
            @endforeach
        </div>
    </body>
</html>