<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('返却スケジュール') }}
        </h2>
    </x-slot>
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.14/index.global.min.js'></script>
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div id='calendar'></div>
      </div>
</x-app-layout>