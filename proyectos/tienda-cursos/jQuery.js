$(window).resize(function() {
    let vhWidth = $(window).width();
    console.log(vhWidth)

    if(vhWidth >= 712){
        navMobile.classList.add("none");
    }
});