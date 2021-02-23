<?php 
include '../db.php';
$id = $_POST['id'];
$sql = "SELECT * FROM dhar_nin WHERE id='$id'";
$m = mysqli_query($db,$sql);
$row  =mysqli_fetch_array($m);
?>
<form id="ftz">
<button class="button blue" onclick="open_drive(1)">Back</button>
  
<table class="input_table ">
    <tr>
      <td>Name</td>
      <td>
        <input type="text" name="name" value="<?php echo $row['user'] ?>" autocomplete="off" class="input bordered">
      </td>
    </tr>
  <tr>
      <td>Phone</td>
      <td>
        <input value="<?php echo $row['phone'] ?>" type="text" name="phone" autocomplete="off" id="total" class="input bordered">
      </td>
    </tr>
    <tr>
      <td>Address</td>
      <td>
        <textarea name="address" class="input bordered" spellcheck><?php echo $row['address'] ?></textarea>
      </td>
    </tr>
    <tr>
      <td><input type="hidden" name="sdff0"> <input type="hidden" value="<?php echo $row['user'] ?>" name="user"><input type="hidden" value="<?php echo $row['phone'] ?>" name="phones"></td>
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