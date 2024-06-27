<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('新しい本の登録') }}
        </h2>
    </x-slot>
　　<head>
        <meta charset="utf-8">
        <title>newbook_book</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <form action="/newbook" method="POST">
            @csrf
            <div class='title'>
                <h2>タイトル</h2>
                <input type="text" name="book[title]"/>
            </div>
                <h2 class='category'>本のカテゴリー</h2>
            <div class='borrow_at'>
                <h2>貸し出し日</h2>
                <input type="date" name="book[borrow_at]"/>
            </div>
            <div class='return_at'>
                <h2>返却日</h2>
                <input type="date" name="book[return_at]"/>
            </div>
            <div class='after_register'>
                <input type="submit" value="登録"/> 
            </div>
        </form>
    </body>
</x-app-layout>
