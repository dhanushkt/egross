<script src="lander_plugins/js/jquery-3.3.1.min.js" defer=""></script>
<script src="lander_plugins/js/bootstrap.min.js" defer=""></script>
<script src="lander_plugins/js/multirange.js" defer=""></script>
<script src="lander_plugins/js/slick.min.js" defer=""></script>
<script src="lander_plugins/js/owl.carousel.min.js" defer=""></script>
<script src="lander_plugins/sync_owl_carousel.js" defer=""></script>
<script src="lander_plugins/js/scripts.js" defer=""></script>

<!-- script to stick nav bar on top when scrolling -->
<script>
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
</script>