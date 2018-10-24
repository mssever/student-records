<ol>
  <?php foreach ($classes_text as $class) { ?>
    <li><?=anchor('classes/view/'.$class['id'], $class['desc'])?></li>
  <?php } ?>
</ol>
<p><?=anchor('classes/add', 'Add another class')?></p>
