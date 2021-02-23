<?php 
include '../db.php';
$limit = 500;
$page = 1;
$id = $_POST['id'];
$post = 0;
$sql = "SELECT * FROM hajj WHERE id='$id'";
$m = mysqli_query($db,$sql);
$row = mysqli_fetch_array($m);
$mon = date("m", strtotime($row['datetime']));
$yer = date("Y", strtotime($row['datetime']));
?>
  <table class="input_table res1">
    <tr>
      <td>Name</td>
      <td>Phone</td>
      <td class="auto_hide">Address</td>
      <td>Total Amount</td>
      <td>Paid Amount</td>
      <td>Due Amount</td>
      <td class="auto_hide">Date</td>
      <td>Options</td>

    </tr>
<?php 

$sql = "SELECT * FROM hajj WHERE hide=1 AND month(datetime)='$mon' AND year(datetime)='$yer' ORDER BY name ASC LIMIT $post,$limit";
$m = mysqli_query($db,$sql);
if (mysqli_num_rows($m)==0) {
  ?>
<td colspan="8" style="text-align: center;">কিছু পাওয়া গেল না</td>
  <?php
  exit();
}
while ($row=mysqli_fetch_array($m)) {
?>
<tr id="d<?php echo $row['id'] ?>">
  <td style="width: 8%;"><?php echo $row['name'] ?></td>
 <td><?php echo $row['phone'] ?></td>
  <td class="auto_hide"><?php echo $row['address'] ?></td>
  <td><?php echo $row['total_amount'] ?> Taka</td>
  <td><?php echo $row['paid_amount'] ?> Taka</td>
  <td><?php echo ($row['total_amount'])-($row['paid_amount']) ?> Taka</td>
  <td class="auto_hide"><?php echo date("h:ia, d M Y",strtotime($row['datetime'])) ?></td>
  <td><a href="javascript:void(0)" onclick="open_detail('<?php echo $row['id'] ?>','<?php echo $id ?>')" class='button green'>Detail</a></td>
</tr>
<?php
}
?>

  </table>

