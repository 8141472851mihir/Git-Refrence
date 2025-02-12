$(document).ready(function () {
    var $wrapper = $('.main-wrapper'); 
    var $slimScrolls = $('.slimscroll'); 
    var $pageWrapper = $('.page-wrapper'); 
    feather.replace(); 

    $(window).resize(function () { 
        if ($('.page-wrapper').length > 0) { 
            var height = $(window).height(); 
            $(".page-wrapper").css("min-height", height); 
        } 
    });

    $('body').append('<div class="sidebar-overlay"></div>'); 

    $(document).on('click', '#mobile_btn', function () { 
        $wrapper.toggleClass('slide-nav'); 
        $('.sidebar-overlay').toggleClass('opened'); 
        $('html').addClass('menu-opened'); 
        $('#task_window').removeClass('opened'); 
        return false; 
    });

    $(".sidebar-overlay").on("click", function () { 
        $('html').removeClass('menu-opened'); 
        $(this).removeClass('opened'); 
        $wrapper.removeClass('slide-nav'); 
        $('.sidebar-overlay').removeClass('opened'); 
        $('#task_window').removeClass('opened'); 
    });

    $(document).on("click", ".hideset", function () { 
        $(this).parent().parent().parent().hide(); 
    }); 

    $(document).on("click", ".delete-set", function () { 
        $(this).parent().parent().hide(); 
    });

    if ($('.product-slide').length > 0) { 
        $('.product-slide').owlCarousel({ 
            items: 1, 
            margin: 30, 
            dots: false, 
            nav: true, 
            loop: false, 
            responsiveClass: true, 
            responsive: { 
                0: { items: 1 }, 
                800: { items: 1 }, 
                1170: { items: 1 } 
            } 
        }); 
    }

    if ($('.owl-product').length > 0) { 
        var owl = $('.owl-product'); 
        owl.owlCarousel({ 
            margin: 10, 
            dots: false, 
            nav: true, 
            loop: false, 
            touchDrag: false, 
            mouseDrag: false, 
            responsive: { 
                0: { items: 2 }, 
                768: { items: 4 }, 
                1170: { items: 8 } 
            } 
        }); 
    }

    if ($('.datanew').length > 0) { 
        $('.datanew').DataTable({ 
            "bFilter": true, 
            "sDom": 'fBtlpi', 
            'pagingType': 'numbers', 
            "ordering": true, 
            "language": { 
                search: ' ', 
                sLengthMenu: '_MENU_', 
                searchPlaceholder: "Search...", 
                info: "_START_ - _END_ of _TOTAL_ items", 
            }, 
            initComplete: (settings, json) => { 
                $('.dataTables_filter').appendTo('#tableSearch'); 
                $('.dataTables_filter').appendTo('.search-input'); 
            }, 
        }); 
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader(); 
            reader.onload = function (e) { 
                $('#blah').attr('src', e.target.result); 
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function () { readURL(this); }); 

    if ($('.datatable').length > 0) { 
        $('.datatable').DataTable({ "bFilter": false }); 
    }

    if ($('.datetimepicker').length > 0) { 
        $('.datetimepicker').datetimepicker({ 
            format: 'DD-MM-YYYY', 
            icons: { 
                up: "fas fa-angle-up", 
                down: "fas fa-angle-down", 
                next: 'fas fa-angle-right', 
                previous: 'fas fa-angle-left' 
            } 
        }); 
    }

    if ($('.toggle-password').length > 0) { 
        $(document).on('click', '.toggle-password', function () { 
            $(this).toggleClass("fa-eye fa-eye-slash"); 
            var input = $(".pass-input"); 
            if (input.attr("type") == "password") { 
                input.attr("type", "text"); 
            } else { 
                input.attr("type", "password"); 
            } 
        }); 
    }

    if ($('.toggle-passwords').length > 0) { 
        $(document).on('click', '.toggle-passwords', function () { 
            $(this).toggleClass("fa-eye fa-eye-slash"); 
            var input = $(".pass-inputs"); 
            if (input.attr("type") == "password") { 
                input.attr("type", "text"); 
            } else { 
                input.attr("type", "password"); 
            } 
        }); 
    }

    if ($('.toggle-passworda').length > 0) { 
        $(document).on('click', '.toggle-passworda', function () { 
            $(this).toggleClass("fa-eye fa-eye-slash"); 
            var input = $(".pass-inputs"); 
            if (input.attr("type") == "password") { 
                input.attr("type", "text"); 
            } else { 
                input.attr("type", "password"); 
            } 
        }); 
    }

    if ($('.select').length > 0) { 
        $('.select').select2({ minimumResultsForSearch: -1, width: '100%' }); 
    }

    if ($('.counter').length > 0) { 
        $('.counter').counterUp({ delay: 20, time: 2000 }); 
    }

    if ($('#timer-countdown').length > 0) { 
        $('#timer-countdown').countdown({ 
            from: 180, 
            to: 0, 
            movingUnit: 1000, 
            timerEnd: undefined, 
            outputPattern: '$day Day $hour : $minute : $second', 
            autostart: true 
        }); 
    }

    if ($('#timer-countup').length > 0) { 
        $('#timer-countup').countdown({ from: 0, to: 180 }); 
    }

    if ($('#timer-countinbetween').length > 0) { 
        $('#timer-countinbetween').countdown({ from: 30, to: 20 }); 
    }

    if ($('#timer-countercallback').length > 0) { 
        $('#timer-countercallback').countdown({ 
            from: 10, 
            to: 0, 
            timerEnd: function () { 
                this.css({ 'text-decoration': 'line-through' }).animate({ 'opacity': .5 }, 500); 
            } 
        }); 
    }

    if ($('#timer-outputpattern').length > 0) { 
        $('#timer-outputpattern').countdown({ 
            outputPattern: '$day Days $hour Hour $minute Min $second Sec..', 
            from: 60 * 60 * 24 * 3 
        }); 
    }

    if ($('#summernote').length > 0) { 
        $('#summernote').summernote({ height: 300, minHeight: null, maxHeight: null, focus: true }); 
    }

    if ($slimScrolls.length > 0) { 
        $slimScrolls.slimScroll({ 
            height: 'auto', 
            width: '100%', 
            position: 'right', 
            size: '7px', 
            color: '#ccc', 
            wheelStep: 10, 
            touchScrollStep: 100 
        }); 

        var wHeight = $(window).height() - 60; 
        $slimScrolls.height(wHeight); 
        $('.sidebar .slimScrollDiv').height(wHeight); 

        $(window).resize(function () { 
            var rHeight = $(window).height() - 60; 
            $slimScrolls.height(rHeight); 
            $('.sidebar .slimScrollDiv').height(rHeight); 
        }); 
    }

    var Sidemenu = function () { this.$menuItem = $('#sidebar-menu a'); }; 

    function init() { 
        var $this = Sidemenu; 
        $('#sidebar-menu a').on('click', function (e) { 
            if ($(this).parent().hasClass('submenu')) { 
                e.preventDefault(); 
            } 
            if (!$(this).hasClass('subdrop')) { 
                $('ul', $(this).parents('ul:first')).slideUp(250); 
                $('a', $(this).parents('ul:first')).removeClass('subdrop'); 
                $(this).next('ul').slideDown(350); 
                $(this).addClass('subdrop'); 
            } else if ($(this).hasClass('subdrop')) { 
                $(this).removeClass('subdrop'); 
                $(this).next('ul').slideUp(350); 
            } 
        }); 
        $('#sidebar-menu ul li.submenu a.active').parents('li:last').children('a:first').addClass('active').trigger('click');
    }

    init(); 

    $(document).on('mouseover', function (e) { 
        e.stopPropagation(); 
        if ($('body').hasClass('mini-sidebar') && $('#toggle_btn').is(':visible')) { 
            var targ = $(e.target).closest('.sidebar, .header-left').length; 
            if (targ) { 
                $('body').addClass('expand-menu'); 
                $('.subdrop + ul').slideDown(); 
            } else { 
                $('body').removeClass('expand-menu'); 
                $('.subdrop + ul').slideUp(); 
            } 
            return false; 
        } 
    });

    $(document).on('click', '#toggle_btn', function () { 
        if ($('body').hasClass('mini-sidebar')) { 
            $('body').removeClass('mini-sidebar'); 
            $(this).addClass('active'); 
            $('.subdrop + ul').slideDown(); 
            localStorage.setItem('screenModeNightTokenState', 'night'); 
            setTimeout(function () { 
                $("body").removeClass("mini-sidebar"); 
                $(".header-left").addClass("active"); 
            }, 100); 
        } else { 
            $('body').addClass('mini-sidebar'); 
            $(this).removeClass('active'); 
            $('.subdrop + ul').slideUp(); 
            localStorage.removeItem('screenModeNightTokenState', 'night'); 
            setTimeout(function () { 
                $("body").addClass("mini-sidebar"); 
                $(".header-left").removeClass("active"); 
            }, 100); 
        } 
        return false; 
    });

    if (localStorage.getItem('screenModeNightTokenState') == 'night') { 
        setTimeout(function () { 
            $("body").removeClass("mini-sidebar"); 
            $(".header-left").addClass("active"); 
        }, 100); 
    }

    $('.submenus').on('click', function () { 
        $('body').addClass('sidebarrightmenu'); 
    });

    $('#searchdiv').on('click', function () { 
        $('.search-form').toggleClass('active'); 
    });
});
