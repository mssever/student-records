<h2><?=anchor("students/class/$class_id", $class_description)?></h2>
<?=form_open('classes/update_attendance/'.$class_id)?>
<table>
  <tr>
    <th>&nbsp;</th>
    <th>Name</th>
    <th>Nickname</th>
    <?
    $dates = array();
    foreach ($attendance_dates as $key => $date_obj) { 
      $dates[] = $date_obj->date;
    }
    foreach ($dates as $key => $date) {
      ?>
      <th><nobr><?=$date?></nobr></th>
    <? } ?>
    <th>New</th>
    <th>Nickname</th>
    <th>Name</th>
  </tr>
  <? $i = 1; ?>
  <? foreach ($students as $key => $student) { 
    $id = $student['id']; ?>
    <tr class="<?=($i % 2 == 0) ? 'even' : 'odd'?>">
      <td><?=$i?></td>
      <td><nobr><?=$student['full_name']?></nobr></td>
      <td><nobr><?=anchor("students/view/$id",$student['nickname'])?></nobr></td>
      <? if (!is_array($student['attendance'])) {
        $student['attendance'] = array($student['attendance']);
      }
      if (count($student['attendance']) == 0) {
        $student['attendance'][] = $attendance_dummy;
      }
      while (count($student['attendance']) < count($dates)) {
        $student['attendance'][] = $student['attendance'][0];
      } ?>
  <? $k = 0;
     for ($j = 0; $j < count($dates); $j++) { 
        $item = $student['attendance'][$k]; ?>
        <? if ($item->date == $dates[$j]) { ?>
          <td><b style="<? if($item->attendance == 'Present') echo 'color:green;'; elseif ($item->attendance == 'Absent') echo 'color:red;';?>"><?=$item->attendance?></b></td>
        <? } else { 
          $k--; ?>
          <td>&nbsp;</td>
        <? } ?>
      <? $k++;
      } ?>
      <td><?=form_dropdown("student[$id]", $attendance_options, 'Present', 'tabindex="'.$i++.'"')?></td>
      <td><nobr><?=$student['nickname']?></nobr></td>
      <td><nobr><?=$student['full_name']?></nobr></td>
    </tr>
  <? } ?>
</table>
<p><?=form_label("Attendance date: ", 'date')?>
<?=form_input(array('name'=>'date','required'=>'required','type'=>'date','tabindex'=>$i++))?></p>
<p><?=form_submit('', 'Add attendance', 'tabindex="'.$i++.'"')?>
<?=form_reset('', 'Start over', 'tabindex="'.$i++.'"')?></p>
