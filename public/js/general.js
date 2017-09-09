$(document).ready(function() {
    // initial
    $('#content').load('tutorteaching');

    // handle menu click
    $('ul#nava li a').click(function() {
        var page = $(this).attr('href');
        $('#content').load(page)
        return false;
    });

});