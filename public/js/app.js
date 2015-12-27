$(function() {
    var $fullText = $('.admin-fullText');
    $('#admin-fullscreen').on('click', function() {
        $.AMUI.fullscreen.toggle();
    });

    $(document).on($.AMUI.fullscreen.raw.fullscreenchange, function() {
        $fullText.text($.AMUI.fullscreen.isFullscreen ? '退出全屏' : '开启全屏');
    });
});

var alert = function(message, type) {
    var alertModal = $('#alert-modal');
    // $('#alert-modal .am-modal-hd').text(title);
    $('#alert-modal .am-modal-bd').text(message);
    type = type ? type : 'default';
    $('#alert-modal .am-modal-hd, #alert-modal .am-modal-bd')
        .removeClass('am-text-default')
        .removeClass('am-text-warning')
        .removeClass('am-text-danger')
        .removeClass('am-text-primary')
        .addClass('am-text-' + type);

    alertModal.modal('open');

    $(document).keypress(function(event) {
        if (event.which == 13) {
            alertModal.modal('close');
        }
    });
}