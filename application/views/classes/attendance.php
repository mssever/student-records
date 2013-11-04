<h2><?=anchor("students/class/$class_id", $class_description)?></h2>
<?=form_open('classes/update_attendance/'.$class_id)?>
<table>
  <tr>
    <th>&nbsp;</th>
    <th>Name</th>
    <th>Nickname</th>
  </tr>
  <? $i = 1; ?>
  <? foreach ($students as $key => $student) { 
    $id = $student['id']; ?>
    <tr>
      <td><?=$i?></td>
      <td><?=$student['full_name']?></td>
      <td><?=anchor("students/view/$id",$student['nickname'])?></td>
      <? foreach ($student['attendance'] as $key => $item) { ?>
        <td><?=$item->date?><br><b style="<? if($item->attendance == 'Present') echo 'color:green;'; elseif ($item->attendance == 'Absent') echo 'color:red;';?>"><?=$item->attendance?></b></td>
      <? } ?>
      <td><?=form_dropdown("student[$id]", $attendance_options, 'Present', 'tabindex="'.$i++.'"')?></td>
    </tr>
  <? } ?>
</table>
<p><?=form_label("Attendance date: ", 'date')?>
<?=form_input(array('name'=>'date','required'=>'required','type'=>'date','tabindex'=>$i++))?></p>
<p><?=form_submit('', 'Add attendance', 'tabindex="'.$i++.'"')?>
<?=form_reset('', 'Start over', 'tabindex="'.$i++.'"')?></p>
