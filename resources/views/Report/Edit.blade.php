<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('テキストの編集') }}
        </h2>
    </x-slot>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Edit_report</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <form action="/listreport/{{ $edit->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class='text'>
              <textarea id="text" name="report[body]">{{ $edit->body }}</textarea>
              <p class="text__error" style="color:red">{{ $errors->first('report.body') }}</p>
            </div>
            <input type="hidden" name="book_id" value={{$edit->book_id}}>
            <input type="submit" value="編集"/>
        </form>
        <div class="back">[<a href="/listreport">戻る</a>]</div>
    </div>
    </body>
</html>
</x-app-layout>