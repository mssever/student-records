<p>New class:</p>

<?=validation_errors()?>

<?=form_open('classes/add')?>
<p><?=form_label('First day of term: ',"term_begins")?>
<?=form_input(array('name'=>'term_begins','type'=>'date','placeholder'=>"YYYY-MM-DD"))?></p>
<p><?=form_label('Class type: ','type')?>
<?=form_dropdown('type',array(''=>'','Grammar'=>'Grammar','Reading'=>'Reading'))?></p>
<p><?=form_label('Level: ','level')?>
<?=form_input(array('name'=>'level','type'=>'number','min'=>1,'value'=>1))?></p>
<p><?=form_label('Starting time: ','time')?>
<?=form_input(array('name'=>'time','type'=>'time'))?></p>
<p><?=form_submit('', 'Submit')?></p>
</form>
