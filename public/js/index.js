
function top_btn(){
    $("html,body").stop().animate({scrollTop:0},500);
}

function bottom_btn(){
    $("html,body").stop().animate({scrollTop:$(document).height()},500);
}
function openNav() {
    document.getElementById("mySidebar").style.width = "100%";
    // document.getElementById("main").style.marginReft = "100%";
    }

    function closeNav() {
        document.getElementById("mySidebar").style.width = "0";
        // document.getElementById("main").style.marginReft= "0";
    }
    $(window).scroll(function() {
        var el = $('#header_top').offset().top;
        if(window.scrollY > el){
            $('#header').addClass('headerbox');
        } else {
            $('#header').removeClass('headerbox');
        }
    });