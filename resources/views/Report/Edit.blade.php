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
    　 <p>{{$edit}}</p>
    　 <h4>既存の本文：{{ $edit->body }}</h4>
        <form action='/listreport/{{ $edit->id }}/edit' method="POST">
            @csrf
            @method('PUT')
            <div class='text'>
              <textarea id="text" name="report[body]"></textarea>
            </div>
            <input type="submit" value="編集"/>
        </form>
    </body>
</html>
</x-app-layout>