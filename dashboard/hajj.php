<?php 
include '../db.php';
if (!isset($_SESSION['ms'])) {
	header("Location: ../login.php");
} else {
	$ms = $_SESSION['ms'];
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
  <li><a class="active" href="hajj.php">হজ</a></li>
  <?php if (user_detail("role",$ms)==2) {
  	?>

  <li><a href="daily.php">দৈনিক খরচ</a></li>
  <li><a href="dhar_din.php">ধার দিন</a></li>
  <li><a href="dhar_nin.php">ধার নিন</a></li>
  	<?php 
  } ?>
  <li style="float: right; background: #9B0007;" class="logout"><a style="color: white;" href="../logout.php">প্রস্থান</a></li>
</ul>
</nav>
<div class="container">
  <table class="link_table">
    <tr>
      <td></td>
      <td><a class="link2 right" href="hajj.php">নতুন অনুমতিপত্র সংযোজন</a><a class="link2 right" href="hajj_report.php">পুরাতন অনুমতিপত্র দেখুন</a></td>
    </tr>
  </table>
  <?php 
if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  $passport = $_POST['passport'];
  $tracking = $_POST['tracking'];
  $type = $_POST['type'];
  $total = $_POST['total'];
  $paid = $_POST['paid'];
  $description = $_POST['description'];
  $ticket = 0;
  $visa = 0;
  $transport = 0;
  $rent = 0;
  $food = 0;
  $others = 0;
  $adder = user_detail("user",$ms);
  $date = date("Y-m-d H:i:s");
  $gid= time();
  $sql = "INSERT INTO `hajj` (`name`, `address`, `phone`, `passport`, `tracking`, `type`, `total_amount`, `paid_amount`, `description`, `ticket`, `visa`, `transport`, `rent`, `food`, `other`, `hide`, `new`, `g_id`, `adder`, `datetime`, `pre`) VALUES ('$name', '$address', '$phone', '$passport', '$tracking', '$type', '$total', '$paid', '$description', '$ticket', '$visa', '$transport', '$rent', '$food', '$others', '0', '0', '$gid', '$adder', '$date', '0')";
  mysqli_query($db,$sql);
  $sql = "INSERT INTO `hajj_copy` (`name`, `address`, `phone`, `passport`, `tracking`, `type`, `total_amount`, `paid_amount`, `description`, `ticket`, `visa`, `transport`, `rent`, `food`, `other`, `hide`, `new`, `g_id`, `adder`, `datetime`, `pre`) VALUES ('$name', '$address', '$phone', '$passport', '$tracking', '$type', '$total', '$paid', '$description', '$ticket', '$visa', '$transport', '$rent', '$food', '$others', '0', '0', '$gid', '$adder', '$date', '0')";
  if (mysqli_query($db,$sql)) {
    ?>
<div class="ani_top success">সংযোজন হয়েছে। <a href="print_invoices.php?gid=<?php echo $gid ?>">প্রিন্ট করতে এখানে ক্লিক করুন</a></div>
    <?php
  }
}

  ?>
  <div class="dashboard">
    <?php 
$sql = "SELECT SUM(total_amount) FROM hajj WHERE hide=0";
$m = mysqli_query($db,$sql);
$t = mysqli_fetch_array($m);
    ?>
    <div class="part">
      Total Amount
      <h2><?php echo number_format($t[0],2) ?> Taka</h2>
    </div>
        <?php 
$sql = "SELECT SUM(paid_amount) FROM hajj WHERE hide=0";
$m = mysqli_query($db,$sql);
$s = mysqli_fetch_array($m);
    ?>
    <div class="part">
      Total Paid
      <h2><?php echo number_format($s[0],2) ?> Taka</h2>
    </div>
    <?php 
$sql = "SELECT SUM(total_amount-paid_amount) FROM hajj WHERE hide=0";
$m = mysqli_query($db,$sql);
$v = mysqli_fetch_array($m);
    ?>
    <div class="part class_unik">
      Total Due
      <h2><?php echo number_format($v[0],2) ?> Taka</h2>
    </div>
            <?php 
$sql = "SELECT SUM(amount) FROM hajj_cost WHERE hide=0";
$m = mysqli_query($db,$sql);
$r = mysqli_fetch_array($m);
    ?>
    <div class="part">
      Total Cost
      <h2><?php echo number_format($r[0],2) ?> Taka</h2>
    </div>
    <div class="part">
      Total Profit
      <h2><?php echo number_format(($s[0])-($r[0]),2) ?> Taka</h2>
    </div>
    <div class="parts">
      <button class="button" onclick="_clear();">Clear Dashboard</button>
      <button class="button" onclick="_report();">Previous Reports</button>
      <button class="button" onclick="__add_cost();">Add New Cost</button>
      <button class="button" onclick="__cost();">Costing Details</button>
    </div>
  </div>
  <script>
    function __add_cost()
    {
     $.ajax({
  url: 'data.php',
  type: 'POST',
  data: {sd01004: 'd5201'},
})
.done(function(data) {
  $(".clear").html(data);
$(".clear").dialog({
        open: true,
        modal: true,
        show: "clip",
        hide: "explode",
        title: "Add Cost",
        buttons:{
          "Add":function(){
            if ($("#amount").val()=='' || $("#amount").val()<1) {
              alert("আপনি হয়ত ভুল বশত টাকার ঘরটা ফাঁকা রেখেছেন ।");
            } else {

$.ajax({
  url: 'edit.php',
  type: 'POST',
  data: "dsgasdf&&amount="+$("#amount").val()+"&&type="+$("#costing").val()+"&&des="+$("#des").val(),
})
.done(function(data) {
  if (data=='Success') {
    __cost();
  } else {
    $(".clear").html(data);
     $(".clear").dialog({
        open: true,
        modal: true,
        show: "bounce",
        hide: "explode",
        title: "Message",
        buttons:{
          "Ok":function(){
$(this).dialog("close");
          }
        }
      });
  }
});
            }

          },
          "Cancel":function(){
$(this).dialog("close");
          }
        }
      });


});
    }

function __openDelete(id,back)
{
  $(".cst_delete").html("Are you sure, you want to delete this?");
  $(".cst_delete").dialog({
    open: true,
    modal: true,
    title: "Confirmation",
    width: "auto",
    buttons:{
      "Yes":function(){
        $.ajax({
          url: 'edit.php',
          type: 'POST',
          data: {asdggt: 'dfe',id: id},
        })
        .done(function(data) {
           if (data=='Success') {
    $(".cst_delete").dialog("close");
    __openCost(back);
  } else {
    $(".cst_delete").html(data);
     $(".cst_delete").dialog({
        open: true,
        modal: true,
        show: "bounce",
        hide: "fade",
        title: "Message",
        buttons:{
          "Ok":function(){
$(this).dialog("close");
__openCost(back);
          }
        }
      });
  }
        });
        
      },
      "No":function(){
        $(".cst_delete").dialog("close");
    __openCost(back);
      }
    }
  });
}


function __costEdit(id,back)
{
   $.ajax({
  url: 'data.php',
  type: 'POST',
  data: {d8h741d: 'd5201',id: id},
})
.done(function(data) {
  $(".cst_edit").html(data);
$(".cst_edit").dialog({
        open: true,
        modal: true,
        show: "clip",
        width: "scale",
        hide: "fade",
        title: "Edit Cost",
        buttons:{
          "Update":function(){
            if ($("#amount").val()=='' || $("#amount").val()<1) {
              alert("আপনি হয়ত ভুল বশত টাকার ঘরটা ফাঁকা রেখেছেন ।");
            } else {

$.ajax({
  url: 'edit.php',
  type: 'POST',
  data: "d64d54d1&&amount="+$("#amount").val()+"&&donoe="+$("#donoe").val()+"&&type="+$("#costing").val()+"&&des="+$("#des").val(),
})
.done(function(data) {
  if (data=='Success') {
    $(".cst_edit").dialog("close");
    __openCost(back);
  } else {
    $(".clear").html(data);
     $(".clear").dialog({
        open: true,
        modal: true,
        show: "bounce",
        hide: "fade",
        title: "Message",
        buttons:{
          "Ok":function(){
$(this).dialog("close");
__openCost(back);
          }
        }
      });
  }
});
            }

          },
          "Cancel":function(){
$(this).dialog("close");
__openCost(back);
          }
        }
      });


});
}


    function __cost()
    {
     $.ajax({
  url: 'data.php',
  type: 'POST',
  data: {f54ggh1f: 'd5201'},
})
.done(function(data) {
  $(".clear").html(data);
$(".clear").dialog({
        open: true,
        modal: true,
        width: "auto",
        show: "clip",
        hide: "explode",
        title: "Costing Details",
        buttons:{
          "Cancel":function(){
$(this).dialog("close");
          }
        }
      });

});
    }

function __openCost(id){
  $.ajax({
  url: 'data.php',
  type: 'POST',
  data: {ee54d1: 'd5201',type: id},
})
.done(function(data) {
  $(".clear").html(data);
$(".clear").dialog({
        open: true,
        modal: true,
        width: "auto",
        show: "clip",
        hide: "explode",
        title: "Costing Details",
        buttons:{
          "Back":function(){
__cost();
          },
          "Cancel":function(){
$(this).dialog("close");
          }
        }
      });


});
    }



function _clear()
    {
     $.ajax({
  url: 'data.php',
  type: 'POST',
  data: {s41df1: 'd5201'},
})
.done(function(data) {
  $(".clear").html(data);
$(".clear").dialog({
        open: true,
        modal: true,
        show: "bounce",
        hide: "explode",
        title: "Confirmation",
        buttons:{
          "হ্যাঁ":function(){
$.ajax({
  url: 'edit.php',
  type: 'POST',
  data: {s41df1: 'd5201',pass: $("#cl54").val()},
})
.done(function(data) {
  if (data=='Success') {
    location.reload();
  } else {
    $(".clear").html(data);
     $(".clear").dialog({
        open: true,
        modal: true,
        show: "bounce",
        hide: "explode",
        title: "Message",
        buttons:{
          "Ok":function(){
$(this).dialog("close");
          }
        }
      });
  }
});

          },
          "না":function(){
$(this).dialog("close");
          }
        }
      });


});
    }
function reset_clear_ps(){
$.ajax({
  url: 'data.php',
  type: 'POST',
  data: {d541014: 'value1'},
})
.done(function(data) {
 $(".pas_res").html(data);
 $(".pas_res").dialog({
  open: true,
  width: "auto",
  height: "auto",
  modal: true,
  title: "Reset Clear Password",
  buttons:{
    "ok":function(){
      $.ajax({
        url: 'edit.php',
        type: 'POST',
        data: "a4410sdfe&&oli="+$("#old_pass44").val()+"&&password="+$("#password44").val(),
      })
      .done(function(data) {
      $(".pas_res").dialog("close");
        alert(data);
      });
      
    },
    "close":function(){
      $(this).dialog("close");
    }
  }
 });
})
.fail(function() {
  console.log("error");
})
.always(function() {
  console.log("complete");
});

}
function open_report(id)
{
  $.ajax({
    url: 'pre.hajj.php',
    type: 'POST',
    data: {id: id},
  })
  .done(function(data) {
    $(".report").html(data);
    $(".report").dialog({
        open: true,
        modal: true,
        show: "scale",
        width: "auto",
        hide: "explode",
        title: "Previous Reports",
        buttons:{
          "Back":function(){
_report();
          },
          "Close":function(){
$(this).dialog("close");
          }
        }
      });
  });
  
}
function open_detail(id,back){
    $.ajax({
        url: 'pre.hajj_report.php',
        type: 'POST',
        data: "id="+id+"&&back="+back,
      })
      .done(function(data) {
        $(".report").html(data);
    $(".report").dialog({
        open: true,
        modal: true,
        show: "scale",
        width: "auto",
        hide: "explode",
        title: "Previous Reports",
        buttons:{
          "Back":function(){
open_report(back);
          },
          "Close":function(){
$(this).dialog("close");
          }
        }
      });
      });
    }

    function _report()
    {
      $.ajax({
        url: 'ajax.previous_report.php',
        type: 'POST',
      })
      .done(function(data) {
        $(".report").html(data);
        $(".report").dialog({
        open: true,
        modal: true,
        show: "scale",
        width: "auto",
        hide: "explode",
        title: "Previous Reports",
        buttons:{
          "Close":function(){
$(this).dialog("close");
          }
        }
      });
      })
      .fail(function() {
        $(".report").html("নেটওয়ার্কে সমস্যা ।");
      });
      
      
    }
  </script>
  <div class="clear" style="display: none;"></div>
  <div class="report" style="display: none;"></div>
  <div class="cst_edit" style="display: none;"></div>
  <div class="cst_delete" style="display: none;"></div>
  <div class="pas_res" style="display: none;"></div>
  <form action="" method="POST">
    
  <table class="input_table width">
  <tr>
  <td>Name</td>
      <td>
        <input type="text" name="name" autocomplete="off" class="input bordered">
      </td>
    </tr>
  <tr>
  <tr>
  <td>Address</td>
      <td>
        <input type="text" name="address" autocomplete="off" class="input bordered">
      </td>
    </tr>
  <tr>
      <td>Phone Number</td>
      <td>
        <input type="text" name="phone" autocomplete="off" class="input bordered">
      </td>
    </tr>
  </table>
  <table class="input_table">
    <tr>
      <td>Passport</td>
      <td>
        <input type="text" name="passport" autocomplete="off" class="input bordered">
      </td>
    </tr>
  <tr>
      <td>E-tracing Number</td>
      <td>
        <input type="text" name="tracking" autocomplete="off" class="input bordered">
      </td>
    </tr>
  </table>
  <table class="input_table width">
  <tr>
      <td>Hajj Category</td>
      <td>
        <select name="type" class="input bordered">
          <option value="Hajj">Hajj</option>
          <option value="Omrah">Omrah</option>
        </select>
      </td>
    </tr>
  <tr>
      <td>Total Amount</td>
      <td>
        <input type="text" name="total" autocomplete="off" onkeyup="document.getElementById('due').value=(document.getElementById('total').value-document.getElementById('paid').value)" id="total" class="input bordered">
      </td>
    </tr>
  <tr>  <tr>
      <td>Paid Amount</td>
      <td>
        <input type="text" name="paid" autocomplete="off" onkeyup="document.getElementById('due').value=(document.getElementById('total').value-document.getElementById('paid').value)" id="paid" class="input bordered">
      </td>
    </tr>
  <tr>
      <td>Due amount</td>
      <td>
        <input type="text" disabled name="due" id="due" class="input bordered">
      </td>
    </tr>
    <tr>
      <td>Description</td>
      <td>
        <textarea name="description" class="input bordered" spellcheck></textarea>
      </td>
    </tr>
  </table>
<!--       <table class="input_table width">
<tr>
  <td style="background: lightgreen">Costing Detail</td>
</tr>
    <td>Ticket</td>
      <td>
        <input type="text" name="ticket" autocomplete="off" id="ticket" class="input bordered">
      </td>
    </tr>
    <td>Visa</td>
      <td>
        <input type="text" name="visa" autocomplete="off" id="visa" class="input bordered">
      </td>
    </tr>

    <td>Transport</td>
      <td>
        <input type="text" name="transport" autocomplete="off" id="transport" class="input bordered">
      </td>
    </tr>
    <td>Home Rent</td>
      <td>
        <input type="text" name="rent" autocomplete="off" id="rent" class="input bordered">
      </td>
    </tr>
    <td>Food Cost</td>
      <td>
        <input type="text" name="food" autocomplete="off" id="food" class="input bordered">
      </td>
    </tr>
    <td>Others</td>
      <td>
        <input type="text" name="others" autocomplete="off" id="others" class="input bordered">
      </td>
    </tr>

  </table> -->
  <table class="input_table">
    <tr>
      <td></td>
      <td>
        <input name="submit" type="submit" class="submit" value="Submit">
      </td>
    </tr>
  </table>
  </form>
</div>
</body>
</html>
