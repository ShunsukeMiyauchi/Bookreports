<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('「選んだ本の題名」のレポート') }}
        </h2>
    </x-slot>
    <html lang="ja">
        <head>
            <meta charset="utf-8">
            <title>accompany_book</title>
            <!-- Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        </head>
<!--accompanyのこのページは、本のレポートだけを映すページにしたい。
だから大井さんの言っていたリレーションの話になる-->
        <body>
            <div class='books'>
             <p>{{$accompanies}}</p>
             <h2 class='title'>{{ $accompanies->title }}</h2>
             <h4 class='category'>カテゴリー{{ $accompanies->category_id }}</h4>
             <p class='borrow_at'>作成日時 {{ $accompanies->borrow_at }}</p>
             <p class='return_at'>編集日時 {{ $accompanies->return_at }}</p>
            </div>
        </body>
</x-app-layout>