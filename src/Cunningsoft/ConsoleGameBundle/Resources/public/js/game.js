$(function() {
    game = {
        init: function() {
            $('#container').bind('click', function(e) {
                $('#input').focus();
            });
            $('#input').focus();
        }
    }
});
$(document).ready(function() {
    game.init();
});
