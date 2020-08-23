<?php
include 'access/useraccesscontrol.php';

$list = false;
$alist = false;
$clist = false;
$aclist = false;

if (isset($_GET['list'])) {
	$list = true;
	$listno = $_GET['list'];
}

if (isset($_GET['clist'])) {
	$clist = true;
	$listno = $_GET['clist'];
}

//query 
if ($list) {

	$userlist = mysqli_query($con, "SELECT * FROM user_list JOIN shopkeeper ON user_list.lsid=shopkeeper.sid WHERE user_list.listno='$listno'");

	$getlistinfo = mysqli_fetch_assoc($userlist);
	$listname = $getlistinfo['sname'];

	$getlist = mysqli_query($con, "SELECT * FROM user_listitems JOIN itemmaster ON user_listitems.litmid=itemmaster.itmid WHERE user_listitems.listno='$listno'");

} else if ($clist) {

	$customlist = mysqli_query($con, "SELECT * FROM custom_list WHERE custom_list.clistno='$listno'");

	$getlistinfo = mysqli_fetch_assoc($customlist);
	$listname = $getlistinfo['cl_name'];

	$getlist = mysqli_query($con, "SELECT * FROM custom_listitems JOIN itemmaster ON custom_listitems.cl_itemid=itemmaster.itmid WHERE custom_listitems.clistno='$listno'");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>
		<?php echo $listname; ?>-eGross
	</title>
	<link rel="shortcut icon" href="lander_plugins/img/fev-icon.png">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.bootstrap4.min.css" rel="stylesheet">
</head>

<body>
<div id="Table-Data">
	<div class="p-4 text-uppercase">
		<h4>
			<?php echo $listname; ?>
		</h4>
	</div>
	<div class="container-fluid table-responsive">
		<?php if ($list) { ?>
			<table id="example" class="table table-bordered" style="width:100%">
				<thead>
					<tr>
						<th>Item Name</th>
						<th>Quantity</th>
						<th>Price</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($getlist as $key => $getlist) { ?>
						<tr>
							<td class="text-capitalize">
								<?php echo $getlist['iname']; ?>
							</td>
							<td> <?php echo $getlist['lqty']; ?> </td>
							<td> <?php echo ($getlist['iprice'] * $getlist['lqty']); ?> </td>
						</tr>
					<?php } ?>

				</tbody>
			</table>
		<?php } else if ($clist) { ?>
			<table id="example" class="table table-bordered" style="width:100%">
				<thead>
					<tr>
						<th>Item Name</th>
						<th>Quantity</th>
						<th>Price</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($getlist as $key => $getlist) { ?>
						<tr>
							<td class="text-capitalize">
								<?php echo $getlist['iname']; ?>
							</td>
							<td> <?php echo $getlist['cl_qty']; ?> </td>
							<td> <?php echo ($getlist['iprice'] * $getlist['cl_qty']); ?> </td>
						</tr>
					<?php } ?>

				</tbody>
			</table>
		<?php } else { ?>

			<table id="example" class="table table-striped table-bordered" style="width:100%">
				<thead>
					<tr>
						<th>Item Name</th>
						<th>Price</th>
						<th>Quantity</th>
					</tr>
					<tr>
						<th colspan="3" class="text-center">Shop Name</th>
					</tr>
					<tr>
						<th colspan="3" class="text-center">Category</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Tiger Nixon</td>
						<td>System Architect</td>
						<td>Edinburgh</td>
					</tr>

				</tbody>
			</table>
		<?php } ?>

	</div>
	<div class="text-center">
		<a href="javascript:genPDF();" class="btn btn-lg btn-primary pdf">Download PDF</a>
		<button class="btn btn-lg btn-primary clipboard">Share List</button>
	</div>
</div>
</body>
<script>
	$(document).ready(function() {
		var $temp = $("<input>");
		var $url = $(location).attr('href');
		$('.clipboard').on('click', function() {
			$("body").append($temp);
			$temp.val($url).select();
			document.execCommand("copy");
			$temp.remove();
			$(".clipboard").text("URL copied!");
		})
	});
	function genPDF(){
		html2canvas(document.getElementById("Table-Data"),{
			onrendered: function(canvas){
				var img = canvas.toDataURL("image/png");
				var doc = new jsPDF();
				doc.addImage(img, 'JPEG',20,20);
				doc.save('egross.pdf'); 
			}
		});
	}
</script>
<script src="https://code.jquery.com/jquery-3.5.1.js" defer=""></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" defer=""></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js" defer=""></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js" defer=""></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.bootstrap4.min.js" defer=""></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" defer=""></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" defer=""></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" defer=""></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js" defer=""></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js" defer=""></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.colVis.min.js" defer=""></script>
</html>