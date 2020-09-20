<?php
include 'access/useraccesscontrol.php';

$list = false;
$clist = false;
$alist = false;
$aclist = false;

if (isset($_GET['list'])) {
	$list = true;
	$listno = $_GET['list'];
} else if (isset($_GET['clist'])) {
	$clist = true;
	$listno = $_GET['clist'];
} else if (isset($_GET['alist'])) {
	$alist = true;
	$listno = $_GET['alist'];
} else if (isset($_GET['aclist'])) {
	$aclist = true;
	$listno = $_GET['aclist'];
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
} else if ($alist) {

	$getuser = mysqli_query($con, "SELECT * FROM user WHERE uid='$listno'");

	$getuserinfo = mysqli_fetch_assoc($getuser);
	$listname = $getuserinfo['uname'];
} else if ($aclist) {

	$getuser = mysqli_query($con, "SELECT * FROM user WHERE uid='$listno'");

	$getuserinfo = mysqli_fetch_assoc($getuser);
	$listname = $getuserinfo['uname'];
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
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.bootstrap4.min.css" rel="stylesheet">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
	<div id="Table-Data">
		<div class="p-4 text-uppercase">
			<div class="pull-right">
				<a class="btn btn-light" title="Save as PDF" href="https://pdf-ace.com/pdfme?cache=0&cache_for=0" target="_blank"><i class="fa fa-save"></i></a>
				<a class="btn btn-light clipboard" title="Share URL"><i class="fa fa-share"></i></a>
			</div>
			<h4>
				<?php

				if ($list || $clist) {
					echo $listname;
				} else if ($alist) {
					echo "$listname's Lists";
				} else if ($aclist) {
					echo "$listname's Custom Lists";
				}

				?>
			</h4>
		</div>
		<div class="container-fluid table-responsive">
			<?php if ($list) { ?>
				<table id="example" class="table table-bordered" style="width:100%">
					<thead>
						<tr class="bg-danger text-white">
							<th>Item Name</th>
							<th>Description</th>
							<th>Quantity</th>
							<th>Price</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($getlist as $key => $getlist) { ?>
							<tr style="background-color: #ECECEC;">
								<td class="text-capitalize">
									<?php echo $getlist['iname']; ?>
								</td>
								<td> <?php echo $getlist['idesc']; ?> </td>
								<td> <?php echo $getlist['lqty']; ?> </td>
								<td> <?php echo ($getlist['iprice'] * $getlist['lqty']); ?> </td>
							</tr>
						<?php } ?>

					</tbody>
				</table>
			<?php } else if ($clist) { ?>
				<table id="example" class="table table-bordered" style="width:100%">
					<thead>
						<tr class="bg-danger text-white">
							<th>Item Name</th>
							<th>Description</th>
							<th>Quantity</th>
							<th>Price</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($getlist as $key => $getlist) { ?>
							<tr style="background-color: #ECECEC;">
								<td class="text-capitalize">
									<?php echo $getlist['iname']; ?>
								</td>
								<td> <?php echo $getlist['idesc']; ?> </td>
								<td> <?php echo $getlist['cl_qty']; ?> </td>
								<td> <?php echo ($getlist['iprice'] * $getlist['cl_qty']); ?> </td>
							</tr>
						<?php } ?>

					</tbody>
				</table>
			<?php } else if ($alist) { ?>

				<table id="noSortTable" class="table table-bordered" style="width:100%">
					<thead>
						<!-- <tr>
						<th style="display: none;"></th>
						<th style="display: none;"></th>
						<th style="display: none;"></th>
					</tr> -->

						<tr class="bg-danger text-white">
							<th>Item Name</th>
							<th>Description</th>
							<th>Price</th>
							<th>Quantity</th>
						</tr>
					</thead>

					<tbody>
						<?php
						$getshops = mysqli_query($con, "SELECT * FROM user_list JOIN shopkeeper ON user_list.lsid=shopkeeper.sid WHERE user_list.luid='$listno'");

						foreach ($getshops as $key => $getshops) {
						?>
							<tr style="background-color: #ECECEC;">
								<td class="text-center" colspan="4">
									<h5> <?php echo $getshops['sname'];  ?> </h5>
								</td>
								<td style="display: none;"></td>
								<td style="display: none;"></td>
							</tr>
							<?php
							$getthislistno = $getshops['listno'];

							$getcategory = mysqli_query($con, "SELECT * FROM user_listitems JOIN itemmaster ON user_listitems.litmid=itemmaster.itmid JOIN scat ON itemmaster.iscid = scat.scid WHERE user_listitems.listno='$getthislistno' GROUP BY scat.scid ");

							foreach ($getcategory as $key1 => $getcategory) {
							?>
								<tr class="table-light">
									<td colspan="4">
										<h6> <?php echo $getcategory['scname']; ?> </h6>
									</td>
									<td style="display: none;"></td>
									<td style="display: none;"></td>
								</tr>

								<!-- <tr>
								<th>Item Name</th>
								<th>Price</th>
								<th>Quantity</th>
							</tr> -->
								<?php
								$getscatid = $getcategory['scid'];

								$getitems = mysqli_query($con, "SELECT * FROM user_listitems JOIN itemmaster ON user_listitems.litmid=itemmaster.itmid JOIN scat ON itemmaster.iscid = scat.scid WHERE user_listitems.listno='$getthislistno' AND scat.scid='$getscatid'");

								foreach ($getitems as $key2 => $getitems) {
								?>
									<tr>
										<td>
											<img width="50" src="uploads/item/<?php echo $getitems['iimg']; ?>">
											<?php echo $getitems['iname']; ?>
										</td>
										<td>
											<?php echo  $getitems['idesc']; ?>
										</td>

										<td>
											<?php echo $getitems['lqty']; ?>
										</td>
										<td>
											<?php echo ($getitems['iprice'] * $getitems['lqty']); ?>
										</td>
									</tr>
								<?php } ?>
							<?php } ?>
						<?php } ?>
					</tbody>
				</table>
			<?php } else if ($aclist) {  ?>

				<table id="noSortTable" class="table table-bordered" style="width:100%">
					<thead>
						<!-- <tr>
						<th style="display: none;"></th>
						<th style="display: none;"></th>
						<th style="display: none;"></th>
					</tr> -->

						<tr class="bg-danger text-white">
							<th>Item Name</th>
							<th>Description</th>
							<th>Price</th>
							<th>Quantity</th>
						</tr>
					</thead>

					<tbody>
						<?php
						$getclists = mysqli_query($con, "SELECT * FROM custom_list WHERE custom_list.cl_uid='$listno'");

						foreach ($getclists as $key => $getclists) {
						?>

							<?php
							$getthisclistno = $getclists['clistno'];

							$getcategory = mysqli_query($con, "SELECT * FROM custom_listitems JOIN itemmaster ON custom_listitems.cl_itemid=itemmaster.itmid JOIN scat ON itemmaster.iscid = scat.scid WHERE custom_listitems.clistno='$getthisclistno' GROUP BY scat.scid "); ?>

							<?php if (mysqli_num_rows($getcategory) >= 1) { ?>
								<tr style="background-color: #ECECEC;">
									<td class="text-center" colspan="4">
										<h5> <?php echo $getclists['cl_name'];  ?> </h5>
									</td>
									<td style="display: none;"></td>
									<td style="display: none;"></td>
								</tr>
							<?php } ?>

							<?php foreach ($getcategory as $key1 => $getcategory) {
							?>

								<tr>
									<td colspan="4">
										<h6> <?php echo $getcategory['scname']; ?> </h6>
									</td>
									<td style="display: none;"></td>
									<td style="display: none;"></td>
								</tr>

								<!-- <tr>
								<th>Item Name</th>
								<th>Price</th>
								<th>Quantity</th>
							</tr> -->
								<?php
								$getscatid = $getcategory['scid'];

								$getitems = mysqli_query($con, "SELECT * FROM custom_listitems JOIN itemmaster ON custom_listitems.cl_itemid=itemmaster.itmid JOIN scat ON itemmaster.iscid = scat.scid WHERE custom_listitems.clistno='$getthisclistno' AND scat.scid='$getscatid'");

								foreach ($getitems as $key2 => $getitems) {
								?>
									<tr>
										<td>
											<img width="50" src="uploads/item/<?php echo $getitems['iimg']; ?>">
											<?php echo $getitems['iname']; ?>
										</td>
										<td>
											<?php echo $getitems['idesc']; ?>
										</td>
										
										<td>
											<?php echo $getitems['cl_qty']; ?>
										</td>
										<td>
											<?php echo ($getitems['iprice'] * $getitems['cl_qty']); ?>
										</td>
									</tr>
								<?php } ?>
							<?php } ?>
						<?php } ?>
					</tbody>
				</table>
			<?php } ?>
		</div>
</body>
<script>
	$(document).ready(function() {
		var table = $('#example').DataTable({
			lengthChange: false,
			paging: false,
			buttons: ['pdf']
		});

		var table = $('#noSortTable').DataTable({
			lengthChange: false,
			paging: false,
			"bSort": false,
			buttons: ['pdf']
		});

		$("#example_filter").hide();
		$(".dataTables_info").hide();
		$("#noSortTable_filter").hide();
		var $temp = $("<input>");
		var $url = $(location).attr('href');
		$('.clipboard').on('click', function() {
			$("body").append($temp);
			$temp.val($url).select();
			document.execCommand("copy");
			$temp.remove();
			$(".clipboard").text("Copied!");
		})
	});
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