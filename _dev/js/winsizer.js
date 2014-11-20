    function adjustStyle(width) {
    width = parseInt(width);
    if (width < 1500) {
       $("#body").removeClass("slecna"); 
    } else {
       $("#body").addClass("slecna"); 
    }
}

$(function() {
    adjustStyle($(this).width());
    $(window).resize(function() {
        adjustStyle($(this).width());
    });
});