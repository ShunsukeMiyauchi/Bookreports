<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
             {{ $book }}のレポート
        </h2>
    </x-slot>
    <html lang="ja">
        <head>
            <meta charset="utf-8">
            <title>accompany_report</title>
            <!-- Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        </head>
        <body>
             <p>{{$accompany}}</p>
             <div class='reports'>
                <h2 class='reference'>参照：{{ $book }}</h2>
            </div>
            <p class='created_at'>作成日時{{ $accompany->created_at }}</p>
            <p class='updated_at'>編集日時{{ $accompany->updated_at }}</p>
            <form action='/listbook/edit/{{ $accompany->id }}' method="POST">
                @csrf
                @method('PUT')
                <div class='text'>
                    <textarea id="text" name="report[body]">{{ $accompany->body }}</textarea>
                    <p class="text__error" style="color:red">{{ $errors->first('report.body') }}</p>
                </div>
                <input type="hidden" name="book_id" value={{$accompany->book_id}}>
                <input type="submit" value="テキストを編集"/>
            </form>
            <div class="back">[<a href="/listbook">戻る</a>]</div>
        </body>
</x-app-layout>