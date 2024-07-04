<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('返却スケジュール') }}
        </h2>
    </x-slot>
    <html lang='ja'>
      <head>
        <meta charset='utf-8' />
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.14/index.global.min.js'></script>
        <script>
          document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
              initialView: 'dayGridMonth',
              timeZone: 'Asia/Tokyo',
              locale: 'ja',
              height: 'auto',
              firstDay: 1,
              businessHours:true,
              headerToolbar: {
                left: "dayGridMonth,listMonth",
                center: "title",
                right: "today prev,next"
              },
              buttonText: {
                    today: '今月',
                    month: '月',
                    list: 'リスト'
                },
              events:'fetchEvents.php',
            });
            //var events = calendar.getEventById('1');
            //console.log(); 
            calendar.render();
          });
        </script>
      </head>
      <body>
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div id='calendar'></div>
      </div>
      </body>
    </html>
</x-app-layout>
  
  <!-- 
    navLinks: true, // can click day/week names to navigate views
    editable: true,
    dayMaxEvents: true, // allow "more" link when too many events
    events,
  });
  calendar.render(); -->