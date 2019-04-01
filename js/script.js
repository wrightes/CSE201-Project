/* This is the js file which will contain javascript functions to sort, filter, and search apps */

jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
});