<?php
require_once('head.php');
require_once('db_sql/db_event.php');

//=== 取得參數 op ===
$year = @$_GET['year'];
$month = @$_GET['month'];
//=== 取得參數 ed ===

$year=$year?:date("Y");
$month=$month?:date("m");

$start_date = date('Y-m-01',strtotime($year.'-'.$month));
$end_date = date('t',strtotime($year.'-'.$month));



?>
<div class="container">
  <h2 align="center">My Event</h2>
  <h3 align="center"><?php echo $year."-".$month; ?></h3>
  <button type="button" class="btn btn-primary" style="margin:10px" data-toggle="modal" data-target="#addEvent">Add event</button>
  <!-- <a href="calender.php?year=<?php echo $month-1 == 0 ? $year-1 : $year;?>&month=<?php echo $month-1==0 ? 12 : $month-1;?>" style="text-decoration:none;">◄</a>
  <a href="calender.php?year=<?php echo $month+1==13 ? $year+1 : $year;?>&month=<?php echo $month+1==13 ? 1 : $month+1; ?>" style="text-decoration:none;">►</a> -->
  <table class="table">
      <tr class="title_bar" >
          <th>Sun</th><th>Mon</th><th>The</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th>
      </tr>
      <?php
      $ym = $year.'-'.$month;
      $start = date('w',strtotime($start_date));
      $end = $end_date;
      $cal_text = '';
      for($i=0;$i<42;$i++)
      { 
        if($i >= $start && $i <= ($end + ($start-1))) {
          $cal_text = ($i - ($start-1));
        } else {
          $cal_text = '';
        }

        if($i % 7 == 0) {
          ?>
          <tr>
          <?php
        }
        ?>
        <td class="slip">
          <div>
            <?php echo $cal_text;?>
          </div>
          <?php
            $date_str = $ym.'-'.$cal_text;
            //撈取所有資料
            $sql_input[0] = "'".$date_str ."'";
            $eventList = getEventList($db, $sql_input);
            unset($sql_input);
            if(!empty($eventList))
            {
                foreach($eventList as $key => $event) 
                {
                  ?>
                  <div class="event_slip">
                    <?php echo $event['el_content'];?>
                  </div>
                  <?php
                }
            }  
          ?>
        </td> 
        <?php
        if($i % 7 == 6) {
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



