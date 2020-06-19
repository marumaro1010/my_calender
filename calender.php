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
<div class="container">
  <h2 align="center">我的行事曆</h2>
  <button type="button" class="btn btn-primary">新增事項</button>
  <table class="table table-bordered">
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
  </div>
  <?php
  $start = date('w',strtotime($start_date));
  $end = $end_date;
  $cal_text = '';
  for($i=0;$i<42;$i++)
  { 
    if($i >= $start && $i <= ($end + ($start-1)))
    {
      $cal_text = ($i - ($start-1));
    }
    else
    {
      $cal_text = '';
    }

    if($i % 7 == 0)
    {
      ?>
      <tr>
      <?php
    }
    ?>
    <td><?php echo $cal_text;?></td> 
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



