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