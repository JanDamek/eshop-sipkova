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


function zak_obj(){
    var obj = document.getElementById('zak_obj');
    var fak = document.getElementById('zak_fak');
    obj.style.display = '';
    fak.style.display = 'none';
}

function zak_fak(){
    var obj = document.getElementById('zak_obj');
    var fak = document.getElementById('zak_fak');
    obj.style.display = 'none';
    fak.style.display = '';
}