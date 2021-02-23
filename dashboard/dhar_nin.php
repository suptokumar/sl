<?php 
include '../db.php';
if (!isset($_SESSION['ms'])) {
  header("Location: ../login.php");
} else {
  $ms = $_SESSION['ms'];
}
if (user_detail("role",$ms)!=2) {
  header("Location: index.php");
}
 ?>
 <!DOCTYPE html>
<html>
<head>
  <title>Teenandtakey - The ultimate software</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/menu.css<?php echo $lock ?>">
  <script src="css/jquery.js"></script>
  <script src="ui/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="ui/jquery-ui.min.css">
</head>
<body>
<nav class="nav">

<ul>
  <li><a href="index.php">চালনার অনুমতিপত্র</a></li>
  <li><a href="hajj.php">হজ</a></li>
  <?php if (user_detail("role",$ms)==2) {
    ?>

  <li><a href="daily.php">দৈনিক খরচ</a></li>
  <li><a href="dhar_din.php">ধার দিন</a></li>
  <li><a class="active" href="dhar_nin.php">ধার নিন</a></li>
    <?php 
  } ?>
  <li style="float: right; background: #9B0007;" class="logout"><a style="color: white;" href="../logout.php">প্রস্থান</a></li>
</ul>
</nav>
<div class="container">

  <?php 
if (isset($_POST['submit'])) {
  
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $paid = $_POST['paid'];
  $total = $_POST['total'];
  $description = $_POST['description'];
  $adder = user_detail("user",$ms);
  $date = date("Y-m-d H:i:s");
  $gid= time();
  $sql = "INSERT INTO `dhar_nin` (`id`, `user`, `phone`, `address`, `gid`, `amount`,`paid`, `des`, `date`, `adder`) VALUES (NULL, '$name', '$phone', '$address', '$gid', '$total','$paid', '$description', '$date', '$adder')";
  mysqli_query($db,$sql);
   $sql = "INSERT INTO `dhar_nin_copy` (`id`, `user`, `phone`, `address`, `gid`, `amount`,`paid`, `des`, `date`, `adder`, `pre`, `new`) VALUES (NULL, '$name', '$phone', '$address', '$gid', '$total','$paid', '$description', '$date', '$adder', '0', '0')";
  if (mysqli_query($db,$sql)) {
    ?>
<div class="ani_top success">সংযোজন হয়েছে। <a href="print_dhar_nin.php?gid=<?php echo $gid ?>" target="_blank">প্রিন্ট করুন</a></div>
    <?php
  }
}

  ?>
  <form action="" method="POST">
    
  <table class="input_table">
    <tr>
      <td>Name</td>
      <td>
        <input type="text" name="name" required="" autocomplete="off" class="input bordered">
      </td>
    </tr>
    <tr>
      <td>Phone Number</td>
      <td>
        <input type="text" name="phone" required="" autocomplete="off" class="input bordered">
      </td>
    </tr>
    <tr>
      <td>Address</td>
      <td>
        <input type="text" name="address" autocomplete="off" class="input bordered">
      </td>
    </tr>
    <tr>
      <td>Total Amount</td>
      <td>
        <input type="text" name="total" autocomplete="off" id="total" class="input bordered">
      </td>
    </tr>
    <tr>
      <td>Paid Amount</td>
      <td>
        <input type="text" name="paid" autocomplete="off" id="total" class="input bordered">
      </td>
    </tr>
    <tr>
      <td>Description</td>
      <td>
        <textarea name="description" class="input bordered" spellcheck></textarea>
      </td>
    </tr>
    <tr>
      <td></td>
      <td>
        <input name="submit" type="submit" class="submit" value="Submit">
      </td>
    </tr>
  </table>
  </form>
</div>
<div class="container" style="border: 1px solid #ccc;">
  <table class="link_table">
    <tr>
      <td>
        <input type="text" onchange="open_drive(1); " onkeyup="open_drive(1); " placeholder="search" id="search" style="padding: 10px 2%; margin: 1%; width: 94%; border: 1px solid #ccc;">
      </td>

    </tr>
  </table>
  <div class="dt"></div>
</div>
<script>
  $(document).ready(function() {
    open_drive(1);
  });
  function open_drive(page)
    {
      var search = $.trim($("#search").val());


      $.ajax({
        url: 'ajax.dhar_nin.php',
        type: 'POST',
        data: "search="+search+"&page="+page,
      })
      .done(function(data) {
        $(".dt").html(data);

        $(".dts").html($(".htdocs1").html());

      
      });
      
    }
    function history(id)
    {
      $.ajax({
        url: 'ajax.dhar_nin.history.php',
        type: 'POST',
        data: "id="+id,
      })
      .done(function(data) {
        $(".report").html(data);
        $(".report").dialog({
open: true,
modal: false,
title: "More Details",
hide: "explode",
show: "bounce",
width: "auto",
buttons:{
  "close":function(){
    $(".report").dialog("close");
  }
}
        });
      });
    }
    function edits(id)
    {
      $.ajax({
        url: 'ajax.dhar_nin.user_change.php',
        type: 'POST',
        data: "id="+id,
      })
      .done(function(data) {
        $(".dt").html(data);
      });
    }
    function edit(id)
    {
      $.ajax({
        url: 'ajax.dhar_nin.amount_change.php',
        type: 'POST',
        data: "id="+id,
      })
      .done(function(data) {
        $(".dt").html(data);
      });
    }

    function open_detail(id)
    {
      $.ajax({
        url: 'ajax.dhar_nin.detail.php',
        type: 'POST',
        data: "id="+id,
      })
      .done(function(data) {
        $(".dt").html(data);
      });
    }
function collect(id)
    {
      $.ajax({
        url: 'ajax.dhar_nin.collect.php',
        type: 'POST',
        data: "id="+id,
      })
      .done(function(data) {
        $(".dt").html(data);
      });
    }


function deletes(id)
    {
      $(".delete").html("আপনি কি সত্যি এই ফাইলটি ডিলিট করতে চান ?");
      $(".delete").dialog({
        open: true,
        modal: true,
        title: "Confirmation",
        buttons:{
          "Yes":function(){
            $.ajax({
              url: 'delete.php',
              type: 'POST',
              data: "sdf&id="+id,
            })
            .done(function(data) {
               var ret = $.parseJSON(data);
              if(ret[0]){
                $(".delete").dialog("close");
                $( "#d"+id ).effect("explode",500);
              } else {
              $(".delete").html(ret[1]);
              $(".delete").dialog({
                buttons:{
                  "ok":function(event) {
                   $(".delete").dialog("close");
                  }
                }
              });
              }
            });
            
          },
          "Cancel":function(){
            $(".delete").dialog("close");
          }
        }
      });
    }
</script>
<div class="report"></div>
<div class="delete"></div>
</body>
</html>
