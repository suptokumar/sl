<?php 
include '../db.php';
$id = $_POST['id'];
$sql = "SELECT * FROM daily WHERE id='$id'";
$m = mysqli_query($db,$sql);
$row  =mysqli_fetch_array($m);
?>
<form id="ftz">
<button class="button blue" onclick="open_drive(1)">Back</button>
  
<table class="input_table ">
    <tr>
      <td>Expense Name</td>
      <td>
        <input type="text" name="name" value="<?php echo $row['name'] ?>" autocomplete="off" class="input bordered">
      </td>
    </tr>
  <tr>
      <td>Total Amount</td>
      <td>
        <input value="<?php echo $row['amount'] ?>" type="text" name="total" autocomplete="off" id="total" class="input bordered">
      </td>
    </tr>
    <tr>
      <td>Description</td>
      <td>
        <textarea name="description" class="input bordered" spellcheck><?php echo $row['des'] ?></textarea>
      </td>
    </tr>
    <tr>
      <td><input type="hidden" name="10d"> <input type="hidden" value="<?php echo $row['id'] ?>" name="id"></td>
      <td>
        <input name="submit" type="submit" class="submit" value="Save">
      </td>
    </tr>
  </table>
</form>
<script>
  $(document).ready(function() {
    $("#ftz").submit(function(event) {
      event.preventDefault();
      var data = $(this).serialize();
      $.ajax({
        url: 'edit.php',
        type: 'POST',
        data: data,
      })
      .done(function(data) {
        open_drive(1);
      });
      
    });
  });
</script>