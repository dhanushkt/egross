/*
 * Custom Script functions for custom list
 */

// global variable 
var citemid;


//popup function
$(".Click-here").on('click', function () {
    $(".custom-model-main").addClass('model-open');
    var getitemnane = $(this).attr('data-item');
    citemid = $(this).attr('data-id');
    $("#getitemname").text(getitemnane);

    //load custom list on popup
    loadCustomList();
});

$(".closebtn").click(function () {
    $(".custom-model-main").removeClass('model-open');
});

//load list function
function loadCustomList() {

    $("#loadcList").load("clist_loadlist.php", {
        selitemid: citemid
    });
}

//add or remove item from clist

$("#loadcList").on('click', '.btnSwicth', function () {
    var clistid = $(this).attr('data-list');
    var $this = $(this);
    if ($(this).find('.fa').hasClass("fa-save")) {
        var clqty = 1;
        $.ajax({
            url: 'clist_additem.php',
            type: 'POST',
            data: {
                citemid: citemid,
                clistid: clistid,
                clqty: clqty
            },
            success: function () {
                console.log("sav");
                $this.toggleClass('btn-success btn-danger');
                $this.find('.fa').toggleClass('fa-save fa-times');
            }
        });
    }
    else {
        $.ajax({
            url: 'clist_delitem.php',
            type: 'POST',
            data: {
                citemid: citemid,
                clistid: clistid
            },
            success: function () {
                console.log("del");
                $this.toggleClass('btn-danger btn-success');
                $this.find('.fa').toggleClass('fa-times fa-save');

            }
        });
    }
});



$(document).ready(function () {
    $(".searchs").keyup(function () {
        var searchTerm = $(".searchs").val();
        var listItem = $('.results tbody').children('tr');
        var searchSplit = searchTerm.replace(/ /g, "'):containsi('")

        $.extend($.expr[':'], {
            'containsi': function (elem, i, match, array) {
                return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
            }
        });

        $(".results tbody tr").not(":containsi('" + searchSplit + "')").each(function (e) {
            $(this).attr('visible', 'false');
        });

        $(".results tbody tr:containsi('" + searchSplit + "')").each(function (e) {
            $(this).attr('visible', 'true');
        });

        var jobCount = $('.results tbody tr[visible="true"]').length;
        $('.counter').text(jobCount + ' item');

        if (jobCount == '0') {
            $('.no-result').show();
        } else {
            $('.no-result').hide();
        }
    });
});