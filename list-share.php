<!doctype>
<html>

<head>
	<title>jsPDF</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<style>
		@CHARSET "UTF-8";

		.page-break {
			page-break-after: always;
			page-break-inside: avoid;
			clear: both;
		}

		.page-break-before {
			page-break-before: always;
			page-break-inside: avoid;
			clear: both;
		}
	</style>
</head>

<body>
	<button onclick="generate()">Generate PDF</button>
	<div id="html-2-pdfwrapper" style='position: absolute; left: 20px; top: 50px; bottom: 0; overflow: auto; width: 600px'>
		<div class="container">
			<h2>Your List</h2>
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Item Name</th>
						<th>Price</th>
					</tr>
				</thead>
				<tbody>
				<tr>
						<td>John</td>
						<td>Doe</td>
						<td>john@example.com</td>
					</tr>
				</tbody>
			</table>
		</div>
		<!-- <h1 style='page-break-before: always; margin-top:100px;'>Yet Another Page</h1> -->
	</div>

	<script src='dist/jspdf.min.js'></script>

	<script>
		var base64Img = null;
		imgToBase64('logo.png', function(base64) {
			base64Img = base64;
		});

		margins = {
			top: 70,
			bottom: 40,
			left: 30,
			width: 550
		};

		generate = function() {
			var pdf = new jsPDF('p', 'pt', 'a4');
			pdf.setFontSize(18);
			pdf.fromHTML(document.getElementById('html-2-pdfwrapper'),
				margins.left, // x coord
				margins.top, {
					// y coord
					width: margins.width // max width of content on PDF
				},
				function(dispose) {
					headerFooterFormatting(pdf, pdf.internal.getNumberOfPages());
				},
				margins);

			var iframe = document.createElement('iframe');
			iframe.setAttribute('style', 'position:absolute;right:0; top:0; bottom:0; height:100%; width:650px; padding:20px;');
			document.body.appendChild(iframe);

			iframe.src = pdf.output('datauristring');
		};

		function headerFooterFormatting(doc, totalPages) {
			for (var i = 1; i >= 1; i--) {
				doc.setPage(i);
				//header
				header(doc);

				footer(doc, i, totalPages);
				doc.page++;
			}
		};

		function header(doc) {
			doc.setFontSize(30);
			doc.setTextColor(40);
			doc.setFontStyle('normal');

			if (base64Img) {
				doc.addImage(base64Img, 'PNG', margins.left, 10, 150, 40);
			}

			doc.text("", margins.left + 50, 40);
			doc.setLineCap(2);
			doc.line(3, 70, margins.width + 43, 70); // horizontal line
		};

		// You could either use a function similar to this or pre convert an image with for example http://dopiaza.org/tools/datauri
		// http://stackoverflow.com/questions/6150289/how-to-convert-image-into-base64-string-using-javascript
		function imgToBase64(url, callback, imgVariable) {

			if (!window.FileReader) {
				callback(null);
				return;
			}
			var xhr = new XMLHttpRequest();
			xhr.responseType = 'blob';
			xhr.onload = function() {
				var reader = new FileReader();
				reader.onloadend = function() {
					imgVariable = reader.result.replace('text/xml', 'image/jpeg');
					callback(imgVariable);
				};
				reader.readAsDataURL(xhr.response);
			};
			xhr.open('GET', url);
			xhr.send();
		};

		function footer(doc, pageNumber, totalPages) {

			var str = "Page " + pageNumber + " of " + totalPages

			doc.setFontSize(10);
			doc.text(str, margins.left, doc.internal.pageSize.height - 20);

		};
	</script>
</body>

</html>