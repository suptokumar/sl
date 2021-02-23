<?php 
include '../db.php';
$id = $_POST['id'];
?>

<?php 
$sql = "SELECT * FROM drive WHERE hide=0 AND id='$id' ORDER BY id DESC LIMIT 50";
$m = mysqli_query($db,$sql);
$gid = 0;
while ($row=mysqli_fetch_array($m)) {
?>
<button class="button blue" onclick="open_drive(1)">Back</button>
<table class="input_table res2">
  <?php if ($row['driving_refference']!='') {

    ?>
    <tr>
      <td>Driving Refference Number</td>
      <td>
        <?php echo $row['driving_refference']; ?>
      </td>
    </tr>
    <?php
  }else {
     ?>

    <tr>
      <td>File BRTA Sent</td>
      <td>
        <?php if($row['file_brta']=="No"){echo "<span style='color: red'>No</span>";} else {echo "<span style='color: green'>Yes</span>";} ?>
      </td>
    </tr>
     <?php  
    } ?>
 
    <tr>
      <td>Serial Number</td>
      <td>
        <?php echo $row['serial'] ?>
      </td>
    </tr>
  <tr>
      <td>Learner issue date</td>
      <td>
        <?php echo $row['issue'] ?> | <span style="border: 1px solid green; border-radius: 10px; color: green; padding: 4px;"><?php echo date("d(D) M Y",strtotime($row['issue'])) ?></span>
      </td>
    </tr>
  <tr>
      <td>DCTB</td>
      <td>
        <?php echo $row['DCTB'] ?>
      </td>
    </tr>
  <tr>
      <td>DCTB date</td>
      <td>
        <?php echo $row['DCTB_date'] ?> <span style="border: 1px solid green; border-radius: 10px; color: green; padding: 4px;"> <?php echo date("d(D) M Y",strtotime($row['DCTB_date'])) ?></span>
      </td>
    </tr>
  <tr>
      <td>Name</td>
      <td>
        <?php echo $row['name'] ?>
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
      <td>Refference Name</td>
      <td>
        <?php echo $row['r_name'] ?>
      </td>
    </tr>
  <tr>
      <td>Refference Phone Number</td>
      <td>
        <?php echo $row['r_phone'] ?>
      </td>
    </tr>
  </table>
  <table class="input_table res2">
  <tr>
      <td>License Type</td>
      <td>
        <?php echo $row['type'] ?>
      </td>
    </tr>
  <tr>
      <td>Vehicle Class</td>
      <td>
        <?php echo $row['v_class'] ?>
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
  </table>
<?php
}
$sql = "SELECT * FROM drive_copy WHERE g_id='$gid'";
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
<td><a class="button green" href="print_invoice.php?id=<?php echo $row['id'] ?>&&gid=<?php echo $row['g_id'] ?>">🖨️ Print</a></td>
  <?php
}
      ?>
    </tr>
  </table>
<?php
}
?>
