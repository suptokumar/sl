<?php 
include '../db.php';
$id = $_POST['id'];
$sql = "SELECT * FROM dhar_din WHERE id='$id'";
$m = mysqli_query($db,$sql);
$row  =mysqli_fetch_array($m);
$user = $row['user'];
$phone = $row['phone'];
?>
<button class="button blue" onclick="open_drive(1)">Back</button>
<table class="input_table">
	<tr>
		<td>Name: <?php echo $row['user'] ?></td>
		<td>Phone: <?php echo $row['phone'] ?></td>
		<td>Address: <?php echo $row['address'] ?></td>
	</tr>
</table>

<!-- <table class="input_table res1">
	<tr>
		<td>Status</td>

		<td>Total</td>
		<td>Paid</td>
		<td>Due</td>
		<td>Description</td>
		<td>Adder</td>
		<td>Date</td>
		<td>Print</td>
	</tr>

<?php 
$sql = "SELECT * FROM dhar_din_copy WHERE user='$user' AND phone='$phone'";
$m = mysqli_query($db,$sql);

while ($row = mysqli_fetch_array($m)) {
?>
<tr>
	<td><?php if ($row['new']==0) {
		echo "<span style='color:green'>New Due</span>";
	} ?></td>
	<td><?php echo $row['amount'] ?> Taka</td>
	<td><?php echo $row['paid'] ?> Taka</td>
	<td><?php echo ($row['amount'])-($row['paid']) ?> Taka</td>
	<td><?php echo $row['des'] ?></td>
	<td><?php echo $row['adder'] ?></td>
	<td><?php echo $row['date'] ?></td>
	<td>Print</td>
</tr>
<?php
}

?>



</table> -->


<table class="input_table res2">
	<tr>
		<td>Total</td>
		<td>Paid</td>
		<td>Due</td>
		<td class="auto_hide">Description</td>
		<td>Date</td>
		<td>Options</td>
	</tr>

<?php 
$sql = "SELECT * FROM dhar_din WHERE user='$user' AND phone='$phone'";
$m = mysqli_query($db,$sql);

while ($row = mysqli_fetch_array($m)) {
?>
<tr>

	<td><?php echo $row['amount'] ?> Taka</td>
	<td><?php echo $row['paid'] ?> Taka</td>
	<td><?php echo ($row['amount'])-($row['paid']) ?> Taka</td>
	<td class="auto_hide"><?php echo $row['des'] ?></td>
	<td><?php echo $row['date'] ?></td>
	<td>
		<a href="javascript:void(0)" onclick="edit(<?php echo $row['id'] ?>)" class="button green">Edit</a>
		<a href="javascript:void(0)" onclick="history(<?php echo $row['id'] ?>)" class="button blue">History</a>
		<a href="print_dhar_din.php?id=<?php echo $row['id'] ?>" target="_blank" class="button yellow">🖨️ Print</a></td>
</tr>
<?php
}

?>



</table>