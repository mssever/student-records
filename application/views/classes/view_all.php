<ol>
  <? foreach ($classes as $class) { ?>
    <li><?=anchor('classes/view/'.$class->id, $class->time.' Level '.$class->level.' '.$class->type.' class beginning on '.$class->term_begins)?></li>
  <? } ?>
</ol>
<p><?=anchor('classes/add', 'Add another class')?></p>
