<h2><?=$class_name?></h2>
<?=form_open("grades/add_by_class_processor")?>
<?=form_hidden('class_id',$class_id)?>
<?php $i = 1 ?>
<table>
  <tr>
    <th>Date</th>
    <th>Description</th>
    <th>Possible Score</th>
    <th>Final Test?</th>
  </tr>
  <tr>
    <td><input type="date" required name="date" tabindex="1"></td>
    <td><input type="text" required name="description" placeholder="Description (max 120 characters)" maxlength="120" size="50" tabindex="2"></td>
    <td><input type="number" required name="score_possible" value="100" min="1" tabindex="3"></td>
    <td>
      <select name="final_test" tabindex="4">
        <option value="0" selected>No</option>
        <option value="1">Yes</option>
      </select>
    </td>
  </tr>
</table>
<div>&nbsp;</div>
<table>
  <tr>
    <th>&nbsp;</th>
    <th>Name</th>
    <th>Nickname</th>
    <th>Score</th>
  </tr>
  <?php foreach ($students as $key => $student) { ?>
    <tr class="<?=($i % 2 == 0) ? 'even' : 'odd'?>">
      <td><?=$i++?></td>
      <td><?=$student->full_name?></td>
      <td><?=anchor('students/view/'.$student->id, $student->nickname)?></td>
      <td><input type="text" name="score[<?=$student->id?>]" value="" tabindex="<?=$i+3?>"></td>
    </tr>
  <?php } ?>
</table>
<div>&nbsp;</div>
<input type="submit" tabindex="<?=$i+3?>">
