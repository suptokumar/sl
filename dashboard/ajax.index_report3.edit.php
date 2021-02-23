<?php 
include '../db.php';
$id = $_POST['id'];
?>

<?php 
$sql = "SELECT * FROM drive WHERE hide=0 AND id='$id' ORDER BY id DESC LIMIT 50";
$m = mysqli_query($db,$sql);
while ($row=mysqli_fetch_array($m)) {
?>
<button class="button blue" onclick="open_drive(1)">Back</button>
<script>
	$(document).ready(function() {
		$("#m25 input,#m25 textarea,#m25 select").keyup(function(event) {
			$(".submit").removeClass('done');
  				$(".submit").removeAttr('disabled');
			$(".submit").val("Update");
		});
		$("#m25 input,#m25 textarea,#m25 select").change(function(event) {
			$(".submit").removeClass('done');
  				$(".submit").removeAttr('disabled');
			$(".submit").val("Update");
		});
	});
</script>
<form action="" id="m25">
  <table class="input_table">
    <tr>
      <td>Serial Number</td>
      <td>
        <input type="text" name="serial" class="input bordered" autocomplete="off" value="<?php echo $row['serial'] ?>">
      </td>
    </tr>
  <tr>
      <td>Learner issue date</td>
      <td>
        <input type="date" name="issue_date" class="input bordered" autocomplete="off" value="<?php echo $row['issue'] ?>">
      </td>
    </tr>
  <tr>
      <td>DCTB</td>
      <td>
        <input type="text" name="dctb" class="input bordered" autocomplete="off" value="<?php echo $row['DCTB'] ?>">
      </td>
    </tr>
  <tr>
      <td>DCTB date</td>
      <td>
        <input type="date" name="dctb_date" class="input bordered" autocomplete="off" value="<?php echo $row['DCTB_date'] ?>">
      </td>
    </tr>
  <tr>
      <td>Name</td>
      <td>
        <input type="text" name="name" class="input bordered" autocomplete="off" value="<?php echo $row['name'] ?>">
      </td>
    </tr>
  <tr>
      <td>Phone Number</td>
      <td>
        <input type="text" name="phone" class="input bordered" autocomplete="off" value="<?php echo $row['phone'] ?>">
      </td>
    </tr>
  </table>
  <table class="input_table">
    <tr>
      <td>Refference Name</td>
      <td>
        <input type="text" name="r_name" class="input bordered" autocomplete="off" value="<?php echo $row['r_name'] ?>">
      </td>
    </tr>
  <tr>
      <td>Refference Phone Number</td>
      <td>
        <input type="text" name="r_phone" class="input bordered" autocomplete="off" value="<?php echo $row['r_phone'] ?>">
      </td>
    </tr>
  </table>
  <table class="input_table">
  <tr>
      <td>License Type</td>
      <td>
        <select name="type" class="input bordered">
          <option value="Non-professional" <?php if ($row['type']=='Non-rofessional') {
          	echo "selected";
          } ?>>Non-professional</option>
          <option value="Professional" <?php if ($row['type']=='Professional') {
          	echo "selected";
          } ?>>Professional</option>
        </select>
      </td>
    </tr>
  <tr>
      <td>Vehicle Class</td>
      <td>
        <select name="class" class="input bordered">
          <option value="Motorcycle" <?php if ($row['v_class']=='Motorcycle') {
          	echo "selected";
          } ?>>Motorcycle</option>
          <option value="Light" <?php if ($row['v_class']=='Light') {
          	echo "selected";
          } ?>>Light</option>
          <option value="Motorcycle and Light" <?php if ($row['v_class']=='Motorcycle and Light') {
          	echo "selected";
          } ?>>Motorcycle and Light</option>
        </select>
      </td>
    </tr>
  <tr>
      <td>Total Amount</td>
      <td>
        <input type="text" autocomplete="off" onkeyup="document.getElementById('due').value=(document.getElementById('total').value-document.getElementById('paid').value)" name="total" id="total" class="input bordered" value="<?php echo $row['total_amount'] ?>">
      </td>
    </tr>
  <tr>  <tr>
      <td>Paid Amount</td>
      <td>
        <input type="text" autocomplete="off" onkeyup="document.getElementById('due').value=(document.getElementById('total').value-document.getElementById('paid').value)" name="paid" id="paid" class="input bordered" value="<?php echo $row['paid_amount'] ?>">
      </td>
    </tr>
  	<tr>
      <td>Due amount</td>
      <td>
        <input type="text" disabled name="due" id="due" class="input bordered" autocomplete="off"  value="<?php echo ($row['total_amount'])-($row['paid_amount']) ?>">
      </td>
    </tr>
    <tr>
      <td>Description</td>
      <td>
        <textarea name="description" class="input bordered"><?php echo $row['description'] ?></textarea>
      </td>
    </tr>
     <tr>
      <td>File BRTA Sent</td>
      <td>
        <select name="file_brta" class="input bordered">
          <option value="No" <?php if ($row['file_brta']=='No') {
          	echo "selected";
          } ?>>No</option>
          <option value="Yes" <?php if ($row['file_brta']=='Yes') {
          	echo "selected";
          } ?>>Yes</option>
        </select>
      </td>
    </tr>
    <tr>
      <td>Driving Reference Number</td>
      <td>
      	<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
      	<input type="hidden" name="1">
        <input type="text" autocomplete="off" name="ref_number" class="input bordered" value="<?php echo $row['driving_refference'] ?>">
      </td>
    </tr>
    <tr>
      <td></td>
      <td>
        <input name="submit" type="submit" class="submit" value="Update">
      </td>
    </tr>
  </table>
  </form>
  <script>
  	$(document).ready(function() {
  		$("#m25").submit(function(event) {
  			var data = $(this).serialize();
  			event.preventDefault();
  			$.ajax({
  				url: 'edit.php',
  				type: 'POST',
  				data: data,
  				beforeSend:function()
  				{
  					$(".submit").addClass('process');
  					$(".submit").val("Please Wait...");
  				$(".submit").attr('disabled','disabled');
  				}
  			})
  			.done(function(data) {
  				$(".submit").removeClass('process');
  				$(".submit").addClass('done');
  				$(".submit").val(data);
  			});
  			
  		});
  	});
  </script>
<?php
}
?>
