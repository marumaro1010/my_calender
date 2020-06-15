<?php
require_once('head.php');

//=== 取得參數 op===
$year = @$_GET['year'];
$month = @$_GET['month'];
if($year == '' && $month == '' )
{
  $year=date("Y");
  $month=date("m");
}
$start_date = date('Y-m-01',strtotime($year.'-'.$month));
$end_date = date('t',strtotime($year.'-'.$month));
//=== 取得參數 ed===
?>
<table border=1 width="100%" border-collapse: collapse;table-layout: fixed;>
  <tr>
    <td colspan=7 align=center >
      <a href="calender.php?year=<?php echo $month-1 == 0 ? $year-1 : $year;?>&month=<?php echo $month-1==0 ? 12 : $month-1;?>" style="text-decoration:none;">◄</a>
      <?php echo $year."-".$month; ?>
      <a href="calender.php?year=<?php echo $month+1==13 ? $year+1 : $year;?>&month=<?php echo $month+1==13 ? 1 : $month+1; ?>" style="text-decoration:none;">►</a>
      </td>
  </tr>
  <tr>
      <th><font>日</font></th><th>一</th><th>二</th><th>三</th><th>四</th><th>五</th><th>六</th>
  </tr>
  <?php
  $start = date('w',strtotime($start_date));
  $end = $end_date;
  $text = '';
  for($i=0;$i<42;$i++)
  { 
    if($i >= $start && $i <= ($end + ($start-1)))
    {
      $text = ($i - ($start-1));
    }
    else
    {
      $text = '';
    }

    if($i % 7 == 0)
    {
      ?>
      <tr>
      <?php
    }
    ?>
    <td align=center bgcolor=#E0FFFF><?php echo $text;?><br><textarea cols=10 rows=3 style='font-size:12px;border:0'></textarea></td> 
    <?php
    if($i % 7 == 6)
    {
      ?>
      <tr>
      <?php
    }
    unset($text);
  }
?>
</table>
<?php
require_once('foot.php');
?>



