<?php include '../db.php'; ?>

<table style="border-collapse: collapse;" class="input_table res2">
    <tr>
      <td>Expense Name</td>
      <td>Amount</td>
      <td>Description</td>
      <td>Date</td>
      <td>Options</td>
    </tr>

<?php 
$search = $_POST['search'];
$from = $_POST['from'];
$to = '';
if ($_POST['to']!='') {
$to = date("Y-m-d",strtotime($_POST['to'])+3600*24);
}
$limit = 25;
$page = $_POST['page'];
$post = ($_POST['page']-1)*$limit;
?>

<?php 
$ql = '';
if ($from!='') {
  $ql .=" AND date>='$from' ";
}
if ($to!='') {
  $ql .=" AND date<='$to' ";
}
if ($search!='') {
  $ql .=" AND (name LIKE '%$search%' OR des LIKE '%$search%') ";
}
if ($from=='' && $to=='' && $search=='') {
	$ql = " AND year(date)='".date("Y-m-d")."' AND month(date)='".date("m")."' AND day(date)='".date("d")."'";
	$asto = "Showing Todays Expense";
} else {
	$asto = "Custom Amount On Filter";
}
$sql = "SELECT * FROM daily WHERE amount!=0 ".$ql." ORDER BY CASE
WHEN name='$search' THEN 1
WHEN name LIKE '$search%' THEN 2
WHEN name LIKE '_$search%' THEN 3
WHEN name LIKE '__$search%' THEN 4
WHEN name LIKE '___$search%' THEN 5
WHEN name LIKE '____$search%' THEN 6
WHEN name LIKE '_____$search%' THEN 7
WHEN des LIKE '%$search%' THEN 7 END, name ASC LIMIT $post,$limit";
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
 <td><?php echo $row['amount'] ?> Taka</td>
  <td><?php echo $row['des'] ?></td>
  <td><?php echo date("h:ia, d M Y", strtotime($row['date'])) ?></td>
  <td>
<a href="javascript:void(0)" onclick="edit('<?php echo $row['id'] ?>')" class='button blue'>Update</a>
<a href="javascript:void(0)" onclick="deletes('<?php echo $row['id'] ?>')" class='button red'>Delete</a></td>
</tr>
<?php
}
?>

  </table>

  <?php


$ql = '';
if ($from!='') {
  $ql .=" AND date>='$from' ";
}
if ($to!='') {
  $ql .=" AND date<='$to' ";
}
if ($search!='') {
  $ql .=" AND (name LIKE '%$search%' OR des LIKE '%$search%') ";
}
if ($from=='' && $to=='' && $search=='') {
	$ql = " AND year(date)='".date("Y-m-d")."' AND month(date)='".date("m")."' AND day(date)='".date("d")."'";
	$asto = "Showing Todays Expense";
} else {
	$asto = "Custom Amount On Filter";
}

$sql = "SELECT SUM(amount) FROM daily WHERE  amount!=0 ".$ql." ORDER BY CASE
WHEN name='$search' THEN 1
WHEN name LIKE '$search%' THEN 2
WHEN name LIKE '_$search%' THEN 3
WHEN name LIKE '__$search%' THEN 4
WHEN name LIKE '___$search%' THEN 5
WHEN name LIKE '____$search%' THEN 6
WHEN name LIKE '_____$search%' THEN 7
WHEN des LIKE '%$search%' THEN 7 END, name ASC";
$m = mysqli_query($db,$sql);
$rest = mysqli_fetch_array($m);
?>
<div class="htdocs1" style="visibility: hidden;"><?php echo $asto."<br><strong>".$rest[0] ?></strong> Taka</div>
<?php

$sql = "SELECT * FROM daily WHERE  amount!=0 ".$ql." ORDER BY CASE
WHEN name='$search' THEN 1
WHEN name LIKE '$search%' THEN 2
WHEN name LIKE '_$search%' THEN 3
WHEN name LIKE '__$search%' THEN 4
WHEN name LIKE '___$search%' THEN 5
WHEN name LIKE '____$search%' THEN 6
WHEN name LIKE '_____$search%' THEN 7
WHEN des LIKE '%$search%' THEN 7 END, name ASC";
$m = mysqli_query($db,$sql);
$rest = mysqli_num_rows($m);


if ($rest>$limit) {
  
pagination($page,$rest,$limit);
}

function pagination($page,$total,$limit){
$crnt = $page;
$page_number = ceil($total/$limit);
echo "<ul class='pagination_bar'>";
if ($crnt==1) {
        ?>
<li class="pagenation_list"><a href="javascript:void(0)"><<</a></li>
<li class="pagenation_list"><a href="javascript:void(0)"><</a></li>
        <?php 
    } else {
    ?>
<li class="pagenation_list"><a onclick="open_drive(1)" href="javascript:void(0)"><<</a></li>
<li class="pagenation_list"><a onclick="open_drive(<?php echo ($crnt-1) ?>)" href="javascript:void(0)"><</a></li>
    <?php
}
for ($i=0; $i < $page_number; $i++) { 
    if (($i+1)==$crnt) {
        ?>
<li class="pagenation_list"><a href="javascript:void(0)" class="selected_crnt_page"><?php echo ($i+1) ?></a></li>
        <?php 
    } else {
    ?>
<li class="pagenation_list"><a onclick="open_drive(<?php echo ($i+1) ?>)" href="javascript:void(0)"><?php echo ($i+1) ?></a></li>
    <?php
}
}
if ($crnt==$page_number) {
        ?>
<li class="pagenation_list"><a href="javascript:void(0)" disabled>></a></li>
<li class="pagenation_list"><a href="javascript:void(0)" disabled>>></a></li>
        <?php 
    } else {
    ?>
<li class="pagenation_list"><a onclick="open_drive(<?php echo ($crnt+1) ?>)" href="javascript:void(0)">></a></li>
<li class="pagenation_list"><a onclick="open_drive(<?php echo ($page_number) ?>)" href="javascript:void(0)">>></a></li>
    <?php
}
echo "</ul>";
?>
<style>
.pagination_bar{
    width: 100%;
    text-align: center;
    background: white;
    padding: 1%;
}
.pagenation_list {
    display: inline-block;
    margin-left: -3px;
}
.pagenation_list a {
    text-decoration: none;
    color: #242424;
    background: linear-gradient(rgba(215,215,220),rgba(225,225,230));
    padding: 10px 20px;
    display: block;
}
.pagenation_list a.selected_crnt_page {
    background: tomato !important;
}
.pagenation_list a:hover {
    background: yellowgreen;
}

</style>
<?php 
}
 ?>
