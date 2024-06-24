<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Edit_report</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>レポートの編集</h1>
        <form action="/edit" method="POST">　<!--editだけどPOST関数でいいの？-->
            @csrf
            <div class='title'>
                <h2>タイトル</h2>
                <input type="text" name="report[title]"/>
            </div>
            　<h2 class='category'>本のカテゴリー</h2>
            <div class='return_at'>
                <h2>返却日</h2>
                <input type="date" name="report[return_at]"/>
            </div>
            <div class='after_register'>
                <input type="submit" value="レポートを編集する"/> <!--editだけどsubmitでいいの？-->
            </div>
        </form>
    </body>
</html>