<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('カテゴリー') }}
        </h2>
    </x-slot>
    <html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Category</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <p>{{$categories}}</p>
        <h2 class='category_repertory'>表示するカテゴリー</h2>
        <!-- <input type="text" name="category[name]"/>
        <p class="body__error" style="color:red">{ $errors->first'category.name') }}</p>
        <select name="book[category_id]">
            foreach$categories as $category)
                <option value="{ $category->id }}">{ $category->name }}</option>
            endforeach
        </select>-->
    </body>
</x-app-layout>