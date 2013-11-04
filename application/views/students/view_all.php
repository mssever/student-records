<? if ($add_success) { ?>
  <h2><?=$add_success?></h2>
<? } ?>
<table>
  <tr>
    <th>&nbsp;</th>
    <th>Name</th>
    <th>Nickname</th>
    <th>Classes</th>
    <th>Operations</th>
  </tr>
  <? $i = 1; ?>
  <? foreach ($students as $key => $student) { ?>
    <tr class="<?=($i % 2 == 0) ? 'even' : 'odd'?>">
      <td><?=$i++?></td>
      <td><?=anchor('students/view/'.$student->id, $student->full_name)?></td>
      <td><?=$student->nickname?></td>
      <td>&nbsp;<!-- Insert Classes Here --></td>
      <td><?=anchor('students/edit/'.$student->id,'edit')?> <?=anchor('students/delete/'.$student->id,'delete')?></td>
    </tr>
  <? } ?>
</table>

<h2>Add Student</h2>
<div id="validation_errors"><?=validation_errors()?></div>
<?=form_open('students/view')?>
<p><?=form_input(array('name'=>'first_name','required'=>'required','placeholder'=>'First name'))?>
<?=form_input(array('name'=>'last_name','required'=>'required','placeholder'=>'Last name'))?>
<?=form_input(array('name'=>'nickname','placeholder'=>'Nickname (optional)'))?>
<?=form_submit('','Add')?></p>
