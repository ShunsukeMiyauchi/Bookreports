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
                <p class="title__error" style="color:red">{{ $errors->first('book.title') }}</p>
            </div>
            <div class="category">
                <h2>カテゴリー</h2>
                <select name="book[category_id]">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <p class="category__error" style="color:red">{{ $errors->first('book.category_id') }}</p>
            </div>
            <div class='borrow_at'>
                <h2>貸し出し日</h2>
                <input type="date" name="book[borrow_at]"/>
                <p class="borrow_at__error" style="color:red">{{ $errors->first('book.borrow_at') }}</p>
            </div>
            <div class='return_at'>
                <h2>返却日</h2>
                <input type="date" name="book[return_at]"/>
                <p class="return_at__error" style="color:red">{{ $errors->first('book.return_at') }}</p>
            </div>
            <input type="submit" value="登録"/> 
        </form>
    </body>
</x-app-layout>
