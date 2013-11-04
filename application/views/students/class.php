<h2><?=$class?></h2>
<table>
  <tr>
    <th>&nbsp;</th>
    <th>Name</th>
    <th>Nickname</th>
    <th>&nbsp;</th>
  </tr>
  <? $i = 1; ?>
  <? foreach ($students as $key => $student) { ?>
    <tr class="<?=($i % 2 == 0) ? 'even' : 'odd'?>">
      <td><?=$i++?></td>
      <td><?=$student->full_name?></td>
      <td><?=anchor('students/view/'.$student->id, $student->nickname)?></td>
      <td><?=anchor("students/remove_from_class/$class_id/".$student->id, 'remove from class', 'onclick="return confirm(\'Are you sure you want to remove '.$student->full_name.'?\');"')?></td>
    </tr>
  <? } ?>
</table>
<p><?=anchor("classes/attendance/$class_id", "Attendance »")?></p>
<h2>Add existing student to class</h2>
<?=form_open('students/add_to_class/'.$class_id)?>
<?=form_dropdown('student_id', $students_not_in_class, 'required')?>
<?=form_submit('','Add to class')?>
</form>
<h2>Add new student to class</h2>
<?=form_open('students/add_student_with_class')?>
<?=form_hidden('class_id', $class_id)?>
<p><?=form_input(array('name'=>'first_name','required'=>'required','placeholder'=>'First name'))?>
<?=form_input(array('name'=>'last_name','required'=>'required','placeholder'=>'Last name'))?>
<?=form_input(array('name'=>'nickname','placeholder'=>'Nickname (optional)'))?>
<?=form_submit('','Add')?></p>
