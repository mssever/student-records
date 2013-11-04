<h2>Student’s name</h2>
<?=form_open("students/edit")?>
<?=form_hidden('id', $id)?>
<table>
  <tr>
    <th>Last Name</th>
    <th>First Name</th>
    <th>Nickname</th>
  </tr>
  <tr>
    <td><input type="text" name="last_name" required value="<?=form_prep($student->last_name)?>"></td>
    <td><input type="text" name="first_name" required value="<?=form_prep($student->first_name)?>"></td>
    <td><input type="text" name="nickname" placeholder="(optional)" value="<?=form_prep($student->nickname)?>"></td>
  </tr>
</table>
<?=form_submit('', 'Save changes')?> <?=form_reset('', "Undo")?>
</form>

<h2>Class records</h2>
<? foreach ($classes as $k1 => $class_id) { ?>
  <h3><?=anchor("classes/view/$class_id", $classes_details[$class_id])?></h3>
    <h4>Attendance</h4>
      <table>
        <tr>
          <th>Date</th>
          <th>Status</th>
        </tr>
        <? foreach ($class_attendance[$class_id] as $k2 => $item) { ?>
          <tr>
            <td><?=$item->date?></td>
            <td><?=$item->attendance?></td>
          </tr>
        <? } ?>
      </table>
      <h4>Grades</h4>
        <p>Not implemented yet</p>
<? } ?>
