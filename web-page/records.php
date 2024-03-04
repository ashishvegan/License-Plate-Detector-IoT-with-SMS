<table class="table table-hover table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">License No.</th>
      <th scope="col">Owner</th>
      <th scope="col">Address</th>
      <th scope="col">Fine</th>
      <th scope="col">Chassis No.</th>
      <th scope="col">Time</th>
      <th scope="col">Date</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php
include_once("config.php");
$sr=1;
$ul = mysqli_query($al,"SELECT * FROM detected_records ORDER BY id DESC");
while($pr = mysqli_fetch_array($ul))
{
?>
    <tr>
      <th scope="row"><?php echo $sr++;?></th>
      <td><?php echo $pr['license'];?></td>
      <td><?php echo $pr['owner'];?></td>
      <td><?php echo $pr['address'];?></td>
      <td><?php echo $pr['fine'];?></td>
      <td><?php echo $pr['chassis_no'];?></td>
      <td><?php echo $pr['time'];?></td>
      <td><?php echo $pr['date'];?></td>
      <td>
      <?php if($pr['image']!=NULL) { ?>
      <a href="uploads/<?php echo $pr['image'];?>" class="btn btn-sm btn-success">View Image</a> <?php } ?>
      <a href="delete-record.php?key=<?php echo $pr['rowid'];?>" class="btn btn-sm btn-danger">Delete</a></td>
    </tr>
    <?php
}
?>
  </tbody>
</table>
