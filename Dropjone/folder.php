 <?php 
 $search = $_GET['search'];
 $dir = "../Dropjone/data/";
$b = scandir($dir,0);
for ($i=0; $i < count($b); $i++) { 
 	
// Sort in ascending order - this is default

// Sort in descending order

 if ($search=='') {
  if ($b[$i]=='.' || $b[$i]=='..') {
    
} else {
  ?>
    <div class="col" onclick="sopen(<?php echo $b[$i] ?>)">
      <img src="program/folder.png" style="width: 100%">
      <p><?php echo $b[$i] ?></p>
    </div>

    <?php
  }
 } else {
 	if ($b[$i]==$search) {
 		  ?>
    <div class="col" onclick="sopen(<?php echo $b[$i] ?>)">
      <img src="program/folder.png" style="width: 100%">
      <p><?php echo $b[$i] ?></p>
    </div>

    <?php
 	}
 }
}
 ?>