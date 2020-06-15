<?
  
  echo $year."年".$month."月".$day."日";
  $con = @mysql_pconnect("localhost","root","00000") or die('Could not connect: ' . mysql_error());
  mysql_select_db("system", $con);
      $result =mysql_query("SET NAMES big5");
  if($upd=="修改")
  {
    $sqlstr="UPDATE event set s1='" .$s1. "',s2='".$s2. "',s3='".$s3.
                           "',s4='". $s4. "',s5='".$s5. "',s6='".$s6.
                           "',s7='". $s7. "',s8='".$s8. "',s9='".$s9.
                           "',s10='".$s10. "',s11='".$s11. "',s12='".$s12.
                           "',s13='".$s13. "',s14='".$s14. "',s15='".$s15.
                           "',s16='".$s16. "',s17='".$s17. "',s18='".$s18.
                           "',s19='".$s19. "',s20='".$s20. "',s21='".$s21.
                           "',s22='".$s22. "',s23='".$s23. "',s24='".$s24. "' where year=" .$year." and month=".$month." and day=".$day;
    //echo $sqlstr;
    $result = mysql_query($sqlstr);
   }
     if($upd=="新增")
  {
    $sqlstr="INSERT INTO event (s1,s2,s3,s4,s5,s6,s7,s8,s9,s10,s11,s12,s13,s14,s15,s16,s17,s18,s19,s20,s21,s22,s23,s24,year,month,day)
                        values ('$s1','$s2','$s3','$s4','$s5','$s6','$s7','$s8','$s9','$s10','$s11','$s12','$s13','$s14','$s15','$s16','$s17','$s18','$s19','$s20','$s21','$s22','$s23','$s24',$year,$month,$day)";
    //echo $sqlstr;
    $result = mysql_query($sqlstr);
   }

    $result = mysql_query("SELECT * FROM event where year=$year and month=$month and day=$day");
    echo "<form method=post action=sch.php?year=".$year."&month=".$month."&day=".$day.">";
    echo "<table border=1><tr><td>時間</td><td>工作內容</td></tr>";
    $timerange=array("00-01","01-02","02-03","03-04","04-05","05-06","06-07","07-08","08-09","09-10","10-11","11-12","12-13","13-14","14-15","15-16","16-17","17-18","18-19","19-20","20-21","21-22","22-23","23-24");
    if($row = mysql_fetch_array($result))
    {
      $flag=1;
      for($i=0;$i<24;$i++)
      {
        echo "<tr>";
        echo "<td> ".$timerange[$i]." </td>";
        echo "<td><input type=text size=20 name=s".($i+1)." value=".$row[$i]."></td>";
        echo "</tr>";
      }
    }
    else
    {
      $flag=2;
      for($i=0;$i<24;$i++)
      {
        echo "<tr>";
        echo "<td> ".$timerange[$i]." </td>";
        echo "<td><input type=text size=20 name=s".($i+1)."></td>";
        echo "</tr>";
      }
    }
      echo "</table>";
if($flag==1)
      echo "<input type='submit' value='修改' name='upd'></form>";
else if($flag==2)
      echo "<input type='submit' value='新增' name='upd'></form>";

?>