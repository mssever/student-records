<table border=1>
  <tr>
    <th>Term Begins</th>
    <th>Class Type</th>
    <th>Level</th>
    <th>Class Time</th>
  </tr>
  <tr>
    <td><?=$class->term_begins?></td>
    <td><?=$class->type?></td>
    <td><?=$class->level?></td>
    <td><?=$class->time?></td>
  </tr>
</table>
<ul>
  <li><?=anchor('students/class/'.$id, "Manage the list of students in this class")?></li>
  <li><?=anchor('classes/attendance/'.$id, "Manage attendance for this class")?></li>
  <li><?=anchor('classes/grades/'.$id, "Manage grades for this class")?></li>
  <li>Class options
    <ul>
      <li><?=anchor('classes/edit/'.$id, "Edit this class")?></li>
      <li><?=anchor('classes/delete/'.$id, "Delete this class", array('onclick'=>"return confirm('Are you sure you want to delete this class?');"))?></li>
    </ul>
  </li>
</ul>
