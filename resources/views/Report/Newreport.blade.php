<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Register_report</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
      <h1>新規レポート作成</h1>
      <form action="/newbook" method="POST">
         @csrf
        <div class='report'>
            <p class='reference'>参照している本</p>
            <div class='text'>
                <h2>本文</h2>
                <textarea name="report[body]" placeholder="筆者の言いたいこと"></textarea><br>
            </div>
             　 <input type="submit" value="作成"/> 
        </div>
      </form>
    </body>
</html>