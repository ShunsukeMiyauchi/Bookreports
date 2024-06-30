<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('新規レポート作成') }}
        </h2>
    </x-slot>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Register_report</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
      <p class='reference'>参照している本:{{ $book->title }}</p>
      <form action="/listbook/{newreport}" method="POST">
         @csrf
        <div class='report'>
            <div class='text'>
                <h2>本文</h2>
                <textarea name="report[body]" placeholder="筆者の言いたいこと"></textarea><br>
            </div>
              <input type="hidden" name="book_id" value={{$book->id}}>
              <input type="submit" value="作成"/> 
        </div>
      </form>
    </body>
</html>
</x-app-layout>