<?
   date_default_timezone_set("Asia/Taipei");
   $currtime=date("Y");
   $currmonth=date("m");
   $currday=date("d");
   $total=($currtime-1)*365;
   $total+=(int)(($currtime-1)/4)-(int)(($currtime-1)/100)+(int)(($currtime-1)/400);
   $month=array(31,28,31,30,31,30,31,31,30,31,30,31);
   if(($currtime%4==0 && $currtime%100!=0) || $currtime%400==0)
     $month[1]=29;
   for($i=0;$i<$currmonth-1;$i++)
      $total+=$month[$i];
   $total++;
   $week=$total%7;
?>
<table border=1>
<tr><td colspan=7 align=center><? echo($currtime."�~".$currmonth."��"); ?>
<tr><th>��</th><th>�@</th><th>�G</th><th>�T</th><th>�|</th><th>��</th><th>��</th></tr>
<tr>
<?
   for($i=0;$i<$total%7;$i++)
      echo "<td></td>";
   for($i=1;$i<=$month[$currmonth-1];$i++) 
   {
      if($i==$currday)
        echo "<td bgcolor=yellow><a href='sch.php?year=".$currtime."&month=".$currmonth."&day=".$i."'>".$i."</a></td>";
      else
        echo "<td><a href='sch.php?year=".$currtime."&month=".$currmonth."&day=".$i."'>".$i."</a></td>";   
      $week++;
      if($week%7==0)
      {
        echo "</tr><tr>";
      }
   }
?>