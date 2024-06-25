<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Search_</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>ノート検索</h1>
        <div class='search_item'>
                <h2 class='keyword'>キーワード</h2>
                <h2 class='titletext'>タイトル,本文</h2>
                <p class='book_category'>本のカテゴリー</p>
                <p class='search_term'>検索期間</p>
            </div>
        </div>
　　　　<div class='reports'>
            @foreach ($reports as $report)
                <div class='report'>
                    <p class='reference'>参照：{{ $report->book_id }}</p>
                    <!--DBの変更をした上で「book_title」に変えること-->
                    <h2 class='created_at'>作成日時{{ $report->created_at }}</h2>
                    <h2 class='text'>本文{{ $report->body }}</h2>
                    <h2 class='updated_at'>編集日時{{ $report->updated_at }}</h2>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $reports->links() }}
        </div>
    </body>
</html>
<!--
book_id
body
created_at
updated_at
-->
<!--
・カテゴリー　カテゴリーのみが選択された画面にする？
-->
    