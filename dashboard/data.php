<?php 
include '../db.php';
?>

<?php 
if (isset($_POST['1'])) {
$id = $_POST['id'];
$sql = "SELECT * FROM drive WHERE hide=0 AND id='$id' ORDER BY id DESC LIMIT 50";
$m = mysqli_query($db,$sql);
while ($row=mysqli_fetch_array($m)) {
?>
<button class="button blue" onclick="open_drive(1)">Back</button>
<form action="" id="collect_form">
	
<table class="input_table res2">
  
  <tr>
      <td>Serial</td>
      <td>
        <?php echo $row['serial'] ?>
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
    <tr>
      <td>Total Paid Amount</td>
      <td>
        <?php echo $row['paid_amount'] ?> Taka
      </td>
    </tr>
    <tr>
      <td>Total Due Amount</td>
      <td>
        <?php echo ($row['total_amount'])-($row['paid_amount']) ?> Taka
      </td>
    </tr>
    <tr>
      <td>Collect</td>
      <td>
        <input type="number" value="" class="input" autofocus id="collect" min="0" max="<?php echo ($row['total_amount'])-($row['paid_amount']) ?>">
      </td>
    </tr>
    <tr>
      <td></td>
      <td>
        <input type="submit" value="Collect" class="submit" >
      </td>
    </tr>
  </table>

</form>
<script>
$(document).ready(function() {
	$("#collect_form").submit(function(event) {
		event.preventDefault();
		$.ajax({
			url: 'collect.php',
			type: 'POST',
			data: "1&&id=<?php echo $id ?>&&amount="+$("#collect").val(),
		})
		.done(function(data) {
			if ($.trim(data)=='Collected !') {
          open_detail(<?php echo $id ?>);
          $("body,html").animate({
            scrollTop: 5000
          },1000);
        }
		});
		
	});
});
</script>
<?php
}
}




if (isset($_POST['2'])) {
$id = $_POST['id'];
$sql = "SELECT * FROM hajj WHERE hide=0 AND id='$id' ORDER BY id DESC LIMIT 50";
$m = mysqli_query($db,$sql);
while ($row=mysqli_fetch_array($m)) {
?>
<button class="button blue" onclick="open_drive(1)">Back</button>
<form action="" id="collect_form">
  
<table class="input_table res2">
  
  
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
  <tr>
      <td>Address</td>
      <td>
        <?php echo $row['address'] ?>
      </td>
  </tr>
    <tr>
      <td>Total Paid Amount</td>
      <td>
        <?php echo $row['paid_amount'] ?> Taka
      </td>
    </tr>
    <tr>
      <td>Total Due Amount</td>
      <td>
        <?php echo ($row['total_amount'])-($row['paid_amount']) ?> Taka
      </td>
    </tr>
    <tr>
      <td>Collect</td>
      <td>
        <input type="number" value="" class="input" autofocus id="collect" min="0" max="<?php echo ($row['total_amount'])-($row['paid_amount']) ?>">
      </td>
    </tr>
    <tr>
      <td></td>
      <td>
        <input type="submit" value="Collect" class="submit" >
      </td>
    </tr>
  </table>

</form>
<script>
$(document).ready(function() {
  $("#collect_form").submit(function(event) {
    event.preventDefault();
    $.ajax({
      url: 'collect.php',
      type: 'POST',
      data: "2&&id=<?php echo $id ?>&&amount="+$("#collect").val(),
    })
    .done(function(data) {
      if ($.trim(data)=='Collected !') {
          open_detail(<?php echo $id ?>);
          $("body,html").animate({
            scrollTop: 5000
          },1000);
        }
    });
    
  });
});
</script>
<?php
}
}
if (isset($_POST['s41df1'])) {

   $sql = "SELECT * FROM hajj WHERE hide=0";
  $m  = mysqli_query($db,$sql);
  $qs = mysqli_num_rows($m);  
  $sql = "SELECT id,SUM(total_amount),SUM(paid_amount),SUM(ticket+visa+transport+rent+food+other) FROM hajj WHERE hide=0";
  $m  = mysqli_query($db,$sql);
  $r = mysqli_fetch_array($m);
  // $v = mysqli_num_rows($m);

  echo "You Have $qs Data. <br> In Total,<br> Your account Balance is ".$r['SUM(total_amount)']." Taka. Your Customer Due is ".($r['SUM(total_amount)']-$r['SUM(paid_amount)'])." Taka. Your Profit is ".($r['SUM(paid_amount)']-$r['SUM(ticket+visa+transport+rent+food+other)'])." Taka. <br><br> Are You Sure You Want To clear Your Dashboard at this position? You May not be able to collect your Customer's Due.";

  ?>
<input type="password" id="cl54" placeholder="clear password" style="padding: 10px;">
<a href="javascript:void(0)" onclick="reset_clear_ps()">Reset Clear Password</a>
  <?php
}


if (isset($_POST['sd01004'])) {
?>
<label for="costing">Cost Type</label>
<select name="costing" id="costing" class="input">
  <option value="Ticket">Ticket</option>
  <option value="Visa">Visa</option>
  <option value="Transport">Transport</option>
  <option value="Home Rent">Home Rent</option>
  <option value="Food">Food</option>
  <option value="Others">Others</option>
</select>
<label for="amount">Costing Amount</label>
<input type="number" placeholder="amount" id="amount" class="input" name="amount">
<label for="des">Costing Description</label>
<textarea name="des" id="des" placeholder="I am costing...." class="input"></textarea>
<?php
}


if (isset($_POST['d541014'])) {
?>
<label for="costing">Old Password</label><br>
<input type="password" name="old_pass44" id="old_pass44" class="" style="padding: 10px"><br><br>
<label for="amount">New Password</label><br>
<input type="password" id="password44" class="" name="password" style="padding: 10px">
<?php
}


if (isset($_POST['d8h741d'])) {
  $id = $_POST['id'];
  $sql = "SELECT * FROM hajj_cost WHERE id='$id'";
  $m = mysqli_query($db,$sql);
  $row = mysqli_fetch_array($m);
?>
<input type="hidden" id="donoe" value="<?php echo $row['id'] ?>">
<label for="costing">Cost Type</label>
<select name="costing" id="costing" class="input">
  <option value="Ticket" <?php if($row['type']=='Ticket'){echo "selected";} ?>>Ticket</option>
  <option value="Visa" <?php if($row['type']=='Visa'){echo "selected";} ?>>Visa</option>
  <option value="Transport" <?php if($row['type']=='Transport'){echo "selected";} ?>>Transport</option>
  <option value="Home Rent" <?php if($row['type']=='Home Rent'){echo "selected";} ?>>Home Rent</option>
  <option value="Food" <?php if($row['type']=='Food'){echo "selected";} ?>>Food</option>
  <option value="Others" <?php if($row['type']=='Others'){echo "selected";} ?>>Others</option>
</select>
<label for="amount">Costing Amount</label>
<input type="number" placeholder="amount" id="amount" value="<?php echo $row['amount'] ?>" class="input" name="amount">
<label for="des">Costing Description</label>
<textarea name="des" id="des" placeholder="I am costing...." class="input"><?php echo $row['des'] ?></textarea>
<?php
}



if (isset($_POST['f54ggh1f'])) {
  $sql ="SELECT *,SUM(amount) FROM hajj_cost WHERE hide=0 GROUP BY type";
  $m = mysqli_query($db,$sql);
  ?>
<table class="input_table">
  <tr>
    <td>
      Costing Type
    </td>
  <td>Costing Amount</td>
  <td>Description</td>
  <td>Details</td>
</tr>
<?php
if (mysqli_num_rows($m)==0) {
  ?>
<td colspan="5" style="text-align: center;">Nothing Found</td>
  <?php
}
  while ($row = mysqli_fetch_array($m)) {
    ?>
    <tr>
      
<td><?php echo $row['type'] ?></td>
<td><?php echo $row['SUM(amount)'] ?> Taka</td>
<td><?php echo $row['des'] ?></td>
<td><button class="button" onclick="__openCost('<?php echo $row['type'] ?>')">Open</button></td>
    </tr>
<?php
  }
  ?>
</table>
<?php
}


if (isset($_POST['ee54d1'])) {
  $type = $_POST['type'];
  $sql ="SELECT * FROM hajj_cost WHERE hide=0 AND type='$type'";
  $m = mysqli_query($db,$sql);
  ?>
<table class="input_table">
  <tr>
    <td>
      Costing Type
    </td>
  <td>Costing Amount</td>
  <td>Description</td>
  <td>Date</td>
  <td>Option</td>
</tr>
<?php
if (mysqli_num_rows($m)==0) {
  ?>
<td colspan="5" style="text-align: center;">Nothing Found</td>
  <?php
}
  while ($row = mysqli_fetch_array($m)) {
    ?>
    <tr>
      
<td><?php echo $row['type'] ?></td>
<td><?php echo $row['amount'] ?> Taka</td>
<td><?php echo $row['des'] ?></td>
<td><?php echo date("h:ia, d M Y", strtotime($row['date'])) ?></td>
<td>
  <button class="button" onclick="__costEdit('<?php echo $row['id'] ?>','<?php echo $row['type'] ?>')">Edit</button>
  <button class="button" onclick="__openDelete('<?php echo $row['id'] ?>','<?php echo $row['type'] ?>')">Delete</button>
</td>
    </tr>
<?php
  }
  ?>
</table>
<?php
}
?>
