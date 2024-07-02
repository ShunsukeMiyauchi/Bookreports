<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
             カテゴリー作成＆削除
        </h2>
    </x-slot>
    <html lang="ja">
        <head>
            <meta charset="utf-8">
            <title>category</title>
            <!-- Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        </head>
        <body>
        <form action="/category" method="POST">
            @csrf
            <div class="newcategory">
                <p>新規カテゴリー登録</p>
                <input type="text" name="category[name]"/>
                <p class="name__error" style="color:red">{{ $errors->first('category.name') }}</p>
                <input type="submit" value="作成"/> 
            </div>
        </form>
        <form action="/category/" id="form" method="post">
            @csrf
            @method('DELETE')
            <p>カテゴリー削除</p>
            <select name="category[id]" id="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <button type="button" onclick="deletePost()">カテゴリー削除</button> 
        </form>
         <div class="back">[<a href="/listbook">戻る</a>]</div>
        <script>
                function deletePost() {
                    'use strict';
                    var category_id = document.getElementById('category_id').value
                    if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                        var form = document.getElementById('form');
                        form.setAttribute('action', '/category/' + category_id);
                        form.submit();
                }
    }
            </script>
        </body>
</x-app-layout>