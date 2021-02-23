<?php 
include '../db.php';
error_reporting(0);
function convertNumber($number)
{
    list($integer, $fraction) = explode(".", (string) $number);

    $output = "";

    if ($integer{0} == "-")
    {
        $output = "negative ";
        $integer    = ltrim($integer, "-");
    }
    else if ($integer{0} == "+")
    {
        $output = "positive ";
        $integer    = ltrim($integer, "+");
    }

    if ($integer{0} == "0")
    {
        $output .= "zero";
    }
    else
    {
        $integer = str_pad($integer, 36, "0", STR_PAD_LEFT);
        $group   = rtrim(chunk_split($integer, 3, " "), " ");
        $groups  = explode(" ", $group);

        $groups2 = array();
        foreach ($groups as $g)
        {
            $groups2[] = convertThreeDigit($g{0}, $g{1}, $g{2});
        }

        for ($z = 0; $z < count($groups2); $z++)
        {
            if ($groups2[$z] != "")
            {
                $output .= $groups2[$z] . convertGroup(11 - $z) . (
                        $z < 11
                        && !array_search('', array_slice($groups2, $z + 1, -1))
                        && $groups2[11] != ''
                        && $groups[11]{0} == '0'
                            ? " and "
                            : ", "
                    );
            }
        }

        $output = rtrim($output, ", ");
    }

    if ($fraction > 0)
    {
        $output .= " point";
        for ($i = 0; $i < strlen($fraction); $i++)
        {
            $output .= " " . convertDigit($fraction{$i});
        }
    }

    return $output;
}

function convertGroup($index)
{
    switch ($index)
    {
        case 11:
            return " decillion";
        case 10:
            return " nonillion";
        case 9:
            return " octillion";
        case 8:
            return " septillion";
        case 7:
            return " sextillion";
        case 6:
            return " quintrillion";
        case 5:
            return " quadrillion";
        case 4:
            return " trillion";
        case 3:
            return " billion";
        case 2:
            return " million";
        case 1:
            return " thousand";
        case 0:
            return "";
    }
}

function convertThreeDigit($digit1, $digit2, $digit3)
{
    $buffer = "";

    if ($digit1 == "0" && $digit2 == "0" && $digit3 == "0")
    {
        return "";
    }

    if ($digit1 != "0")
    {
        $buffer .= convertDigit($digit1) . " hundred";
        if ($digit2 != "0" || $digit3 != "0")
        {
            $buffer .= " and ";
        }
    }

    if ($digit2 != "0")
    {
        $buffer .= convertTwoDigit($digit2, $digit3);
    }
    else if ($digit3 != "0")
    {
        $buffer .= convertDigit($digit3);
    }

    return $buffer;
}

function convertTwoDigit($digit1, $digit2)
{
    if ($digit2 == "0")
    {
        switch ($digit1)
        {
            case "1":
                return "ten";
            case "2":
                return "twenty";
            case "3":
                return "thirty";
            case "4":
                return "forty";
            case "5":
                return "fifty";
            case "6":
                return "sixty";
            case "7":
                return "seventy";
            case "8":
                return "eighty";
            case "9":
                return "ninety";
        }
    } else if ($digit1 == "1")
    {
        switch ($digit2)
        {
            case "1":
                return "eleven";
            case "2":
                return "twelve";
            case "3":
                return "thirteen";
            case "4":
                return "fourteen";
            case "5":
                return "fifteen";
            case "6":
                return "sixteen";
            case "7":
                return "seventeen";
            case "8":
                return "eighteen";
            case "9":
                return "nineteen";
        }
    } else
    {
        $temp = convertDigit($digit2);
        switch ($digit1)
        {
            case "2":
                return "twenty-$temp";
            case "3":
                return "thirty-$temp";
            case "4":
                return "forty-$temp";
            case "5":
                return "fifty-$temp";
            case "6":
                return "sixty-$temp";
            case "7":
                return "seventy-$temp";
            case "8":
                return "eighty-$temp";
            case "9":
                return "ninety-$temp";
        }
    }
}

function convertDigit($digit)
{
    switch ($digit)
    {
        case "0":
            return "zero";
        case "1":
            return "one";
        case "2":
            return "two";
        case "3":
            return "three";
        case "4":
            return "four";
        case "5":
            return "five";
        case "6":
            return "six";
        case "7":
            return "seven";
        case "8":
            return "eight";
        case "9":
            return "nine";
    }
}



if (!isset($_GET['gid'])) {
	header("Location: index_report.php");
}
$gid = $_GET['gid'];
if (!isset($_GET['id'])) {
$sql = "SELECT * FROM hajj_copy WHERE g_id='$gid' LIMIT 1";
	
} else {
$id = $_GET['id'];
$sql = "SELECT * FROM hajj_copy WHERE id='$id'";
}
$m = mysqli_query($db,$sql);
if (mysqli_num_rows($m)==0) {
	echo "Sorry There is an Error. Target File wasn't Found. <a href='hajj_report.php'>Go to Report File</a> ";
}
while ( $row = mysqli_fetch_array($m) ) {
	?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Print <?php echo $gid; ?></title>
</head>
<body>
	<header style="text-align: center;">
        <br>
        <span style="color: #971fbede; font-size: 34px; text-shadow: 1px 1px 2px black;">আলহাজ্ব শামসুজ্জোহা হজ্ব কাফেলা </span> <br>
       <span style="color: #971fbede; font-size: 34px; text-shadow: 1px 1px 2px black;"> মোবাইল: ০১৭১৯-৪৩৫৩৬৩</span>
	</header>
	<div class="container">
		<style>
			td {
				border: 1px solid #bbb;
				padding: 10px;
				width: auto !important;
				color: #333;
				font-family: arial;
			}
		</style>
		<table style="border-collapse: collapse; margin: 0px auto; width: 96%;">
			<tr>
				<td>
					Name: <?php echo $row['name'] ?>
				</td>
				<td>
					Phone Number: <?php echo $row['phone'] ?>
				</td>
				<td>
					Address: <?php echo $row['address'] ?>
				</td>
			</tr>
			<tr>
				<td>
					Hajj Category: <?php echo $row['type'] ?>
				</td>
				<td>
					Passport: <?php echo $row['passport'] ?>
				</td>
				<td>
					Date: <?php echo date("h:ia ,d M Y",strtotime($row['datetime'])) ?>
				</td>
			</tr>
		</table>
		<table style="border-collapse: collapse; margin: 0px auto; width: 96%;">
			<tr>
				<td>
					E-tracking number:
				</td>
				<td>
					<?php echo $row['tracking'] ?>
				</td>
			</tr>
<!-- 			<tr>
				<td>
					Cost Detail:
				</td>
				<td>
					<table style="border-collapse: collapse;">
						<tr>
							<td>Ticket:</td>
							<td><?php echo $row['ticket'] ?> Taka</td>
						</tr>
						<tr>
							<td>Visa:</td>
							<td><?php echo $row['visa'] ?> Taka</td>
						</tr>
						<tr>
							<td>Transport:</td>
							<td><?php echo $row['transport'] ?> Taka</td>
						</tr>
						<tr>
							<td>Home Rent:</td>
							<td><?php echo $row['rent'] ?> Taka</td>
						</tr>
						<tr>
							<td>Food Cost:</td>
							<td><?php echo $row['food'] ?> Taka</td>
						</tr>
						<tr>
							<td>Others:</td>
							<td><?php echo $row['other'] ?> Taka</td>
						</tr>
					</table>
				</td>
			</tr> -->

			<tr>
				<td>
					Total Amount:
				</td>
				<td>
					<?php echo $row['total_amount'] ?> Taka
				</td>
			</tr>
<?php 
if ($row['new']==1) {
	?>
	<tr>
				<td>
					Previously Paid Amount:
				</td>
				<td>
					<?php echo $row['pre'] ?> Taka
				</td>
			</tr>
	<?php
}
 ?>
			<tr>
				<td>
					Paid Amount:
				</td>
				<td>
					<?php echo $row['paid_amount'] ?> Taka ( <?php echo convertNumber($row['paid_amount']) ?> Taka Only )
				</td>
			</tr>
			<tr>
				<td>
					Due Amount:
				</td>
				<td>
					<?php echo (($row['total_amount'])-($row['pre']))-($row['paid_amount']) ?> Taka
				</td>
			</tr>
		</table>
		<div style="overflow: hidden; width: 96%; margin: 5px auto;">
		<a href="Javascript:void(0)" style="float: right; text-decoration: none; color: #11A3FF; font-family: arial;" onclick="window.print();">⎙ Print</a>
		<a href="index_report.php" style="text-decoration: none; color: #11A3FF; font-family: arial;">◄ Back</a>
		</div>
	</div>
</body>
</html>
	<?php
}
?>
