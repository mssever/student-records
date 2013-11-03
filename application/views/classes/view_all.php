<table border="1">
  <tr>
    <th>Term Begins</th>
    <th>Class Type</th>
    <th>Level</th>
    <th>Class Time</th>
  </tr>
  <? foreach ($classes as $class) { ?>
  <tr>
    <td><?=anchor('classes/view/'.$class->id, $class->term_begins); ?></td>
    <td><?=anchor('classes/view/'.$class->id, $class->type); ?></td>
    <td><?=anchor('classes/view/'.$class->id, $class->level); ?></td>
    <td><?=anchor('classes/view/'.$class->id, $class->time); ?></td>
  </tr>
  <? } ?>
</table>
<p><?=anchor('classes/add', 'Add another class')?></p>
