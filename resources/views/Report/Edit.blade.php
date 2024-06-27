<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('レポートの編集') }}
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
    <p>{{$report}}</p>
        <form action='/listreport/{edit}' method="POST">　<!--editだけどPOST関数でいいの？-->
            @csrf
            <div class='text'>
                <h2>本文</h2>
                <!--<textarea name="report[text]" placeholder="筆者の言いたいこと"></textarea><br>-->
            </div>
            <div class='after_register'>
                <input type="submit" value="編集"/> <!--editだけどsubmitでいいの？-->
            </div>
        </form>
    </body>
</html>
</x-app-layout>