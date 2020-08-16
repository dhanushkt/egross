    var cItemId;

    var preloader = document.getElementById("loading");

    function myFunction() {
        preloader.style.display = 'none';
    };
    

    $(document).ready(function() {
        var getAllimg = document.getElementsByClassName("verifyImg");
        var i;
        for (i = 0; i < getAllimg.length; i++) {
            var width = getAllimg[i].naturalWidth;
            var height = getAllimg[i].naturalHeight;

            if (width < 200 && height < 200) {
                getAllimg[i].src = 'uploads/item/default_egross.png';
            }
        }
        $('#carouselExampleIndicators').carousel({
            interval: 2000,
            cycle: true
        })
    });


    $(".btnSwicth").on('click', function() {
        var listid=$(this).attr('data-list');
        $.ajax({
            url: 'custom-add-list.php',
            type: 'POST',
            data: {
                id: cItemId,
                listid: listid 
            },
            success: function() {
                $(this).addClass('btn-success');
                $(this).find('.fa').addClass('fa-save');
            }
        });
        if($(this).hasClass("btn-danger"))
        {
            $.ajax({
                url: 'delete-customlist.php',
                type: 'POST',
                data: {
                    id: cItemId,
                    listid: listid 
                },
                success: function() {
                    $(this).removeClass( "btn-success" ).addClass( "btn-danger" );
                    $(this).find('.fa').removeClass( "fa-save" ).addClass( "fa-times" );
                }
            });
        }
    });
    $(".Click-here").on('click', function() {
        $(".custom-model-main").addClass('model-open');
        var getitemnane=$(this).attr('data-item');
        cItemId=$(this).attr('data-id');
        $("#getitemname").text(getitemnane);
        
    });
    $(".closebtn").click(function() {
        $(".custom-model-main").removeClass('model-open');
    });


    $(document).ready(function() {
        $(".searchs").keyup(function() {
            var searchTerm = $(".searchs").val();
            var listItem = $('.results tbody').children('tr');
            var searchSplit = searchTerm.replace(/ /g, "'):containsi('")

            $.extend($.expr[':'], {
                'containsi': function(elem, i, match, array) {
                    return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
                }
            });

            $(".results tbody tr").not(":containsi('" + searchSplit + "')").each(function(e) {
                $(this).attr('visible', 'false');
            });

            $(".results tbody tr:containsi('" + searchSplit + "')").each(function(e) {
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