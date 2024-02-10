<?php
function getEventList($db,$arr_input)
{
  $result = $db->table('event_list')
            ->select('*')
            ->where('el_date = ? ', $arr_input)
            ->get();
  return $result;
}
?>