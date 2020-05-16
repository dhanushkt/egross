<script src="lander_plugins/js/jquery-3.3.1.min.js" defer=""></script>
<script src="lander_plugins/js/bootstrap.min.js" defer=""></script>
<script src="lander_plugins/js/multirange.js" defer=""></script>
<script src="lander_plugins/js/slick.min.js" defer=""></script>
<script src="lander_plugins/js/owl.carousel.min.js" defer=""></script>
<script src="lander_plugins/sync_owl_carousel.js" defer=""></script>
<script src="lander_plugins/js/scripts.js" defer=""></script>
<script src="https://code.jquery.com/jquery-3.5.1.js" defer=""></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"defer=""></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js" defer=""></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js" defer=""></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.bootstrap4.min.js" defer=""></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" defer=""></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" defer=""></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" defer=""></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js" defer=""></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js" defer=""></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.colVis.min.js" defer=""></script>

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