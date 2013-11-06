<script type="text/javascript">
  function crEl(name) {
    return document.createElement(name);
  }
  function make_radio(name, value, current) {
    var o = '<label>'+value+' <input type="radio" name="'+name+'" value="'+value+'"';
    o += (current) ? ' checked="checked">' : '>';
    return o+'</label>';
  }
  function get_current(el) {
    if(el.innerHTML == '&nbsp;') return 'None';
    return el.children[0].innerText;
  }
  
  $(function () {
    cell_contents = undefined;
    main_form_destination = undefined;
    $('td.a-box').css('cursor','pointer').bind('click', box_click);
  });
    
  function box_click() {
    if(cell_contents) {
      alert('Please deal with the other place you\'re editing first.');
      return false;
    }
    var id = this.id;
    var student_id = $(this).attr('student_id');
    var class_date = $(this).attr('date');
    var html = make_radio('attendance','None',get_current(this) == 'None');
    html += make_radio('attendance','Present',get_current(this) == 'Present');
    html += make_radio('attendance','Absent',get_current(this) == 'Absent');
    html += make_radio('attendance','Tardy',get_current(this) == 'Tardy');
    html += '<input type="hidden" name="student_id" value="'+student_id+'">';
    html += '<input type="hidden" name="class_date" value="'+class_date+'">';
    html += '<button id="cancel_button">Cancel</button>';
    cell_contents = this.innerHTML;
    var f = $(main_form);
    main_form_destination = f.attr('action');
    f.attr('action', '/classes/ajax_update_attendance/'+id+'/<?=$class_id?>').attr('onchange', 'submit(this)');
    this.innerHTML = html;
    $(this).unbind('click');
    $('#cancel_button').bind('click', function () {
      undo_changes(this.parentNode);
      return false;
    });
  }
  
  function undo_changes(el) {
    el.innerHTML = cell_contents;
    cell_contents = undefined;
    $(el).bind('click', box_click);
    $(main_form).attr('action',main_form_destination).attr('onchange', 'return true');
  }
</script>
<h2><?=anchor("students/class/$class_id", $class_description)?></h2>
<?=form_open('classes/update_attendance/'.$class_id, 'id="main_form"')?>
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
  <? $i = 1; $blank_counter = 0; ?>
  <? foreach ($students as $key => $student) { 
    $id = $student['id']; ?>
    <tr class="attendance <?=($i % 2 == 0) ? 'even' : 'odd'?>">
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
          <td id="<?=$item->id?>" class="a-box"><b style="<? if($item->attendance == 'Present') echo 'color:green;'; elseif ($item->attendance == 'Absent') echo 'color:red;';?>"><?=$item->attendance?></b></td>
        <? } else { 
          $k--; ?>
          <td id="X<?=$blank_counter++?>" class="a-box" student_id="<?=$id?>" date="<?=$dates[$j]?>">&nbsp;</td>
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
</form>
