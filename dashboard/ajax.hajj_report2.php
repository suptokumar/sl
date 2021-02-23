<?php 
include '../db.php';
$id = $_POST['id'];
?>

<?php 
$sql = "SELECT * FROM hajj WHERE hide=0 AND id='$id' ORDER BY id DESC LIMIT 50";
$m = mysqli_query($db,$sql);
$gid = 0;
while ($row=mysqli_fetch_array($m)) {
?>
<button class="button blue" onclick="open_drive(1)">Back</button>
<table class="input_table res2">
  <tr>
      <td>Name</td>
      <td>
        <?php echo $row['name'] ?>
      </td>
    </tr>
  <tr>
      <td>Address</td>
      <td>
        <?php echo $row['address'] ?>
      </td>
    </tr> 
    <tr>
      <td>Phone Number</td>
      <td>
        <?php echo $row['phone'] ?>
      </td>
    </tr>
  </table>
  <table class="input_table res2">
    <tr>
      <td>Passport</td>
      <td>
        <?php echo $row['passport'] ?>
      </td>
    </tr>
  <tr>
      <td>E-tracking</td>
      <td>
        <?php echo $row['tracking'] ?>
      </td>
    </tr>
  </table>
  <table class="input_table res2">
  <tr>
      <td>Hajj Category</td>
      <td>
        <?php echo $row['type'] ?>
      </td>
    </tr>
  <tr>
      <td>Total Amount</td>
      <td>
        <?php echo $row['total_amount'] ?> Taka
      </td>
    </tr>
  <tr>  <tr>
      <td>Paid Amount</td>
      <td>
        <?php echo $row['paid_amount'] ?> Taka
      </td>
    </tr>
  <tr>
      <td>Due amount</td>
      <td>
        <?php echo ($row['total_amount'])-($row['paid_amount']) ?> Taka
      </td>
    </tr>
    <tr>
      <td>Description</td>
      <td>
        <?php echo $row['description']; $gid=$row['g_id']; ?>
      </td>
    </tr>
<!--     <tr>
      <td>Costing Details</td>
      <td>
        Ticket: <strong><?php echo $row['ticket']; ?> Taka</strong><br>
        Visa: <strong><?php echo $row['visa']; ?> Taka</strong><br>
        Transport: <strong><?php echo $row['transport']; ?> Taka</strong><br>
        Home Rent: <strong><?php echo $row['rent']; ?> Taka</strong><br>
        Foot Cost: <strong><?php echo $row['food']; ?> Taka</strong><br>
        Others: <strong><?php echo $row['other']; ?> Taka</strong><br>
      </td>
    </tr> -->
  </table>
<?php
}
$sql = "SELECT * FROM hajj_copy WHERE g_id='$gid'";
$m = mysqli_query($db,$sql);
while ($row = mysqli_fetch_array($m)) {
?>
  <table class="input_table res2">
    <tr>
      <td  style="width:10% !important"><?php if ($row['type']!='edited') {
        echo "<span style='color: green;'>Collected</span>";
      } else {
        echo "<span style='color: orange;'>Edited</span>";
      } ?></td>
      <?php 
if ($row['type']=='edited') {
 ?>
<td><?php echo $row['description'] ?></td>
<td><?php echo $row['adder'] ?></td>
<td><?php echo date("h:ia ,d M Y",strtotime($row['datetime'])) ?> <span style="border: 1px solid green; border-radius: 10px; color: green; padding: 4px;"> <?php echo date("D",strtotime($row['datetime'])) ?></td>

 <?php 
} else {
  ?>
<td>Total: <?php echo ($row['total_amount'])-($row['pre']) ?> Taka</td>
<td>Paid: <?php echo $row['paid_amount'] ?> Taka</td>
<td>Due: <?php echo ($row['total_amount'])-($row['pre'])-($row['paid_amount']) ?> Taka</td>
<td><?php echo $row['adder'] ?></td>
<td><?php echo date("h:ia ,d M Y",strtotime($row['datetime'])) ?> <span style="border: 1px solid green; border-radius: 10px; color: green; padding: 4px;"> <?php echo date("D",strtotime($row['datetime'])) ?></td>
<td><a class="button green" target='_blank' href="print_invoices.php?id=<?php echo $row['id'] ?>&&gid=<?php echo $row['g_id'] ?>">🖨️ Print</a></td>
  <?php
}
      ?>
    </tr>
  </table>
<?php
}
?>
