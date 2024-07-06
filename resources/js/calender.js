//import '@fullcalendar/core/vdom'; // （for Vite）ver6には不要なので、エラーが出たらここを消す。
import { Calendar } from "@fullcalendar/core";
import dayGridPlugin from "@fullcalendar/daygrid";
import interactionPlugin from "@fullcalendar/interaction";
import axios from 'axios';

// idがcalendarのDOMを取得
var calendarEl = document.getElementById("calendar");

// カレンダーの設定
let calendar = new Calendar(calendarEl, {
    plugins: [interactionPlugin, dayGridPlugin],

    // 最初に表示させる形式
    initialView: "dayGridMonth",

    // ヘッダーの設定（左/中央/右）
    headerToolbar: {
        left: "prev,next today",
        center: "title",
        right: "",
    },
    locale: 'ja',

    events: function (info, successCallback, failureCallback) {
        axios
            .post("/schedule/event", {
                start_date: info.start.valueOf(),
                end_date: info.end.valueOf(),
            })
            .then(response => {
                console.log(response.data)
                // 追加したイベントを削除
                calendar.removeAllEvents();
                // // カレンダーに読み込み
                 successCallback(response.data);
            })
            .catch(() => {
                // バリデーションエラーなど
                alert("取得に失敗しました");
            });
    }
});

// レンダリング
calendar.render();

// import timeGridPlugin from "@fullcalendar/timegrid";
// import listPlugin from "@fullcalendar/list";

//     let calendar = new Calendar(calendarEl, {
//         plugins: [interactionPlugin, dayGridPlugin, timeGridPlugin, listPlugin],
//         initialView: "dayGridMonth",
//         headerToolbar: {
//             left: "prev,next today",
//             center: "title",
//             right: "dayGridMonth,timeGridWeek,listWeek",
//         },
//         

//         // // 日付をクリック、または範囲を選択したイベント
//         // selectable: true,
//         // select: function (info) {
//         //     //alert("selected " + info.startStr + " to " + info.endStr);
//         // events: function (info, successCallback, failureCallback) {
//         //     // Laravelのイベント取得処理の呼び出し
//         //     axios
//         //         .post("/schedule", {
//         //             start_date: info.start.valueOf(),
//         //             end_date: info.end.valueOf(),
//         //         })
//         //         .then((response) => {
//         //             // 追加したイベントを削除
//         //             calendar.removeAllEvents();
//         //             // カレンダーに読み込み
//         //             successCallback(response.data);
//         //         })
//         //         .catch(() => {
//         //             // バリデーションエラーなど
//         //             alert("登録に失敗しました");
//         //         });
//         // },
//             // // 入力ダイアログ
//             // const eventName = prompt("イベントを入力してください");

//             // if (eventName) {
//             //     // Laravelの登録処理の呼び出し
//             //     axios
//             //         .post("/schedule-add", {
//             //             start_date: info.start.valueOf(),
//             //             end_date: info.end.valueOf(),
//             //             event_name: eventName,
//             //         })
//             //         .then(() => {
//             //             // イベントの追加
//             //             calendar.addEvent({
//             //                 title: eventName,
//             //                 start: info.start,
//             //                 end: info.end,
//             //                 allDay: true,
//             //             });
//             //         })
//             //         .catch(() => {
//             //             // バリデーションエラーなど
//             //             alert("登録に失敗しました");
//             //         });
//             // }
//             // },
//     });
//     calendar.render();