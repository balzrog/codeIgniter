/**
 * Created by Balzrog on 02/03/2016.
 */

$(document).ready(function() {
    refreshNavBar();
});

function refreshNavBar(){
   $(".navBar_item").removeClass("active");
    var fileName = returnFileName();
    var allDocs = $(".navBar_item");
    allDocs.children().each(function(){
        var kid = $(this);
        if(kid.attr("href") == fileName){
            kid.parent("li").addClass("active");
        }
    })
}

function returnFileName(){
    var fileName = location.pathname.substring(location.pathname.lastIndexOf("/") + 1);
    return fileName;
}
function activeButtonProfile() {
    $('body').on('click', '.btn-group button', function (e) {
        $(this).addClass('active');
        $(this).siblings().removeClass('active');

        //do any other button related things
    });

}