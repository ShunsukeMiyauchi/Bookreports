<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>返却期限通知メール</title>
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" >
</head>
<body>
  <h1>返却期限が近づいている本があります。</h1>
 　 @foreach($books as $book)
            <p>本のid: {{ $book->id }}<br></p>
            <p>タイトル: {{ $book->title }}<br></p>
            <p>返却期限: {{ $book->return_at }}<br></p>
    @endforeach
  <h1>Bookreportsより</h1>
  
        <!--  返却期限が近づいている本があります。<br>-->
        <!--if$books && $books->count丸かっこ > 0)-->
        <!--    foreach$books as $book)-->
        <!--        本のid: { $book->id }}<br>-->
        <!--        タイトル: { $book->title }}<br>-->
        <!--        返却期限: { $book->return_at }}<br>-->
        <!--    endforeach-->
        <!--else-->
        <!--    返却期限が近づいている本はありません。<br>-->
        <!--endif-->
  
</body>    
</html>