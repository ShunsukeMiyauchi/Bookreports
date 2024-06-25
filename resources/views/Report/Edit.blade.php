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
            <div class='text'>
                <h2>本文</h2>
                <!--<textarea name="report[text]" placeholder="筆者の言いたいこと"></textarea><br>-->
            </div>
            <div class='after_register'>
                <input type="submit" value="レポートを編集する"/> <!--editだけどsubmitでいいの？-->
            </div>
        </form>
    </body>
</html>