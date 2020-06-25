<?php
//網址導向
function redirect($msg,$url)
{
    if($msg == '')
    {
        php_back_waring('redirect func error :導向訊息為空');
        exit();
    }
    if($url == '')
    {
        php_back_waring('redirect func error :導向網址為空');
       exit();
    }
    echo "<script>alert('".$msg."')</script>";
    echo "<script>window.location.href='".$url."'</script>";
}

//php愛的提醒
function php_back_waring($msg)
{
    echo "<script>alert('愛的提醒:【".$msg."】')</script>";
    echo "<script>history.back();</script>";
}
?>