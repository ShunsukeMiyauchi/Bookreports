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
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
      <p class='reference'>参照している本:{{ $book->title }}</p>
      <form action="/listbook/{{$book->id}}" method="POST">
         @csrf
        <div class='report'>
            <div class='text'>
                <h2>本文</h2>
                <textarea name="report[body]" placeholder="筆者の言いたいこと"></textarea><br>
                <p class="text__error" style="color:red">{{ $errors->first('report.body') }}</p>
            </div>
              <input type="hidden" name="book_id" value={{$book->id}}>
              <input type="submit" value="作成"/> 
        </div>
      </form>
      <div class="back">[<a href="/listbook">戻る</a>]</div>
    </div>
    </body>
</html>
</x-app-layout>