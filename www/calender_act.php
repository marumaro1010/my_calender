<?php
require_once('config/server_info.php');
//===取得參數 op===
$date = $_POST['date'];
$event = $_POST['event'];
//===取得參數 ed===

if($date == '')
{
    php_back_waring('日期不可為空!!');
    exit();
}

if($event == '')
{
    php_back_waring('事件不可為空!!');
    exit();
}

$datetime = date('Y-m-d',strtotime($date));
$arr_input['el_date'] = $datetime;
$arr_input['el_content'] = $event;
$db->table('event_list')->insert($arr_input);
unset($arr_input);

redirect('新增成功','calender.php');
exit();
?>