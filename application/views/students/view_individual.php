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
          <th>&nbsp;</th>
          <th>Date</th>
          <th>Status</th>
        </tr>
        <? $i=1;
        foreach ($class_attendance[$class_id] as $k2 => $item) { ?>
          <tr class="<?=($i % 2 == 0) ? 'even' : 'odd'?>">
            <td><?=$i++?></td>
            <td><?=$item->date?></td>
            <td><?=$item->attendance?></td>
          </tr>
        <? } ?>
      </table>
      <h4>Grades</h4>
      <table>
        <tr>
          <th>&nbsp;</th>
          <th>Date</th>
          <th>Description</th>
          <th>Score</th>
          <th>Possible Score</th>
          <th>Final test?</th>
        </tr>
        <?for ($i = 0; $i < count($class_grades[$class_id]); $i++) { 
          $grades = $class_grades[$class_id][$i]; ?>
          <tr class="<?=($i % 2 != 0) ? 'even' : 'odd'?>">
            <td><?=$i+1?></td>
            <td><?=$grades->date?></td>
            <td><?=$grades->description?></td>
            <td><?=$grades->score?></td>
            <td><?=$grades->score_possible?></td>
            <td><?=($grades->final_test == 0) ? 'No' : 'Yes'?></td>
          </tr>
        <? } ?>
      </table>
      <div>&nbsp;</div>
      <table>
        <tr>
          <th>Regular Percentage</th>
          <th>Final Test Percentage</th>
          <th>Grand Total</th>
        </tr>
        <tr>
          <td><?=$class_average[$class_id]['regular']?>%</td>
          <td><?=$class_average[$class_id]['final']?>%</td>
          <td><b><?=$class_average[$class_id]['total']?>%</b></td>
        </tr>
      </table>
      <?=form_open("grades/add_single")?>
        <?=form_hidden('student_id', $id)?>
        <?=form_hidden('class_id', $class_id)?>
        <?=form_input(array('name'=>'date','required'=>'required','type'=>'date'))?>
        <?=form_input(array('name'=>'description','required'=>'required','placeholder'=>'Description'))?>
        <?=form_input(array('name'=>'score','required'=>'required','type'=>'number','placeholder'=>"Score",'title'=>'Score'))?>
        <?=form_input(array('name'=>'score_possible','required'=>'required','title'=>'Possible score','placeholder'=>'Possible score','type'=>'number','value'=>100,'min'=>1))?>
        <?=form_dropdown('final_test',array('No','Yes'))?>
        <?=form_submit('','Add grade')?>
      </form>
<? } ?>
