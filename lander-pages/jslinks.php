<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<!-- <script src="lander_plugins/js/bootstrap.min.js" defer=""></script> -->
<script src="lander_plugins/js/multirange.js" defer=""></script>
<script src="lander_plugins/js/slick.min.js" defer=""></script>
<!-- <script src="lander_plugins/js/owl.carousel.min.js" defer=""></script> -->
<!-- <script src="lander_plugins/js/sync_owl_carousel.js" defer=""></script> -->
<script src="lander_plugins/js/scripts.js" defer=""></script>
<!-- <script src="lander_plugins/js/sync_owl_carousel.js" defer=""></script> -->

<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> -->

<!-- preloader script -->
<script>
	var preloader = document.getElementById("loading");

	function myFunction() {
		preloader.style.display = 'none';
	};
</script>

<!--Search-->
<script src="typeahead.min.js"></script>
<script>
	$(document).ready(function() {
		$('input.typeahead').typeahead({
			name: 'typeahead',
			remote: 'search.php?key=%QUERY',
			limit: 10
		});
		$('.good-deal-product .owl-theme').each(function() {
			$(this).owlCarousel({
				loop: true,
				nav: false,
				dots: false,
				autoplay: true,
				autoplayTimeout: 5500,
				autoplayHoverPause: true,
				responsiveClass: true,
				margin: 30,
				responsive: {
					320: {
						items: 1
					},
					480: {
						items: 2
					},
					768: {
						items: 4
					}
				}
			});
		});
	});
</script>
<!-- script to stick nav bar on top when scrolling -->
<!-- <script>
    window.onscroll = function() {
        myFunction()
    };

    var header = document.getElementById("myHeader");
    var sticky = header.offsetTop;

    function myFunction() {
        if (window.pageYOffset > sticky) {
            header.classList.add("sticky");
        } else {
            header.classList.remove("sticky");
        }
    }
</script> -->