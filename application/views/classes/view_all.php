<ol>
  <? foreach ($classes_text as $class) { ?>
    <li><?=anchor('classes/view/'.$class['id'], $class['desc'])?></li>
  <? } ?>
</ol>
<p><?=anchor('classes/add', 'Add another class')?></p>
