<h2><?=anchor("classes/view/$class_id", $class_name)?></h2>
<p><?=anchor("grades/add_by_class/$class_id", "Add new grades for this class »")?></p>
<?=form_open("classes/add_class_grades")?>
<? //echo "<pre>".htmlspecialchars(print_r($students,TRUE),ENT_QUOTES|ENT_HTML5)."</pre>";?>
<?
  $num_grades = 0;
  foreach ($students as $key => $s) {
    $num_grades = max(count($s['grades']), $num_grades);
  }
?>
<table>
  <tr>
    <th>&nbsp;</th>
    <th>Name</th>
    <th>Nickname</th>
    <th>Grades</th>
<?
    for ($i = 0; $i < $num_grades; $i++) {
      echo "    <th>&nbsp;</th>\n";
    }
?>
  </tr>
  <? for ($i = 0; $i < count($students); $i++) {
    $i2 = $i+1; ?>
    <tr class="<?=($i2 % 2 == 0) ? 'even' : 'odd'?>">
      <td><?=$i2?></td>
      <td><?=$students[$i]['student']->full_name?></td>
      <td><?=anchor("students/view/".$students[$i]['student']->id,$students[$i]['student']->nickname)?></td>
      <td>
        <table>
          <tr>
            <th>Reg.</th>
            <td><?=$students[$i]['score_regular']?>%</td>
          </tr>
          <tr>
            <th>Final</th>
            <td><?=$students[$i]['score_final']?>%</td>
          </tr>
          <tr>
            <th>Total</th>
            <td><b><?=$students[$i]['score_grand_total']?>%</b></td>
          </tr>
        </table>
      </td>
      <? for ($j = 0; $j < count($students[$i]['grades']); $j++) { ?>
        <? $grades = $students[$i]['grades'][$j]; ?>
        <td>
          <table>
            <tr>
              <th>Date</th>
              <td><?=$grades->date?></td>
            </tr>
            <tr>
              <th>Desc.</th>
              <td><?=$grades->description?></td>
            </tr>
            <tr>
              <th>Score</th>
              <td><?=$grades->score?></td>
            </tr>
            <tr>
              <th>Poss.</th>
              <td><?=$grades->score_possible?></td>
            </tr>
            <tr>
              <th>F.T.?</th>
              <td><?=($grades->final_test == 0) ? 'No' : 'Yes'?></td>
            </tr>
          </table>
        </td>
      <? } ?>
    </tr>
  <? } ?>
</table>
</form>
