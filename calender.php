﻿<?php
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
  <h2 align="center">My Event</h2>
  <h3 align="center"><?php echo $year."-".$month; ?></h3>
  <button type="button" class="btn btn-primary" style="margin:10px" data-toggle="modal" data-target="#ooo">Add event</button>
  <!-- <a href="calender.php?year=<?php echo $month-1 == 0 ? $year-1 : $year;?>&month=<?php echo $month-1==0 ? 12 : $month-1;?>" style="text-decoration:none;">◄</a>
  <a href="calender.php?year=<?php echo $month+1==13 ? $year+1 : $year;?>&month=<?php echo $month+1==13 ? 1 : $month+1; ?>" style="text-decoration:none;">►</a> -->
  <table class="table">
      <tr class="title_bar" >
          <th>Sun</th><th>Mon</th><th>The</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th>
      </tr>
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
        <td class="slip">
          <div>
            <?php echo $cal_text;?>
          </div>
          <!-- <div class="event_slip">as2</div> -->
        </td> 
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
</div>
<?php
require_once('foot.php');
?>



