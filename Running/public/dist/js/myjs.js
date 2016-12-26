/**
 * Created by wang on 2016/10/13 0013.
 */
$(function () {
    $('li.dropdown').mouseover(function() {
        $(this).addClass('open');    }).mouseout(function() { $(this).removeClass('open');    });

});

$(function () {
    if(location.hash) {
        var tab_link="a[href='"+location.hash+"']"
        $(tab_link).tab('show');
    }
    $(document.body).on("click", "#mytab a[data-toggle]", function(event) {

        location.hash = this.getAttribute("href");
    });

});
