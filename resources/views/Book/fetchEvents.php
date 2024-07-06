<?php      
// データベース設定ファイルをインクルードする
require_once 'dbConfig.php'; 
 
// カレンダーの日付でイベントをフィルターする
$where_sql = ''; 
if(!empty($_GET['borrow_at']) && !empty($_GET['return_at'])){ 
    $where_sql .= " WHERE start BETWEEN '".$_GET['borrow_at']."' AND '".$_GET['return_at']."' "; 
} 
 
// データベースからイベントを取得する
$sql = "SELECT * FROM books $where_sql"; 
$result = $db->query($sql);  
 
$eventsArr = array(); 
if($result->num_rows > 0){ 
    while($row = $result->fetch_assoc()){ 
        array_push($eventsArr, $row); 
    } 
} 
 
// イベントデータをJSON形式でレンダリングする
echo json_encode($eventsArr);