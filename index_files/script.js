YMaps.jQuery(function () {
    var map = new YMaps.Map(YMaps.jQuery("#footer-map")[0]);
    map.setCenter(new YMaps.GeoPoint(37.040741, 55.577649), 7);
    var placemark = new YMaps.Placemark(new YMaps.GeoPoint(37.040741, 55.577649));
    placemark.name = "Адвокат Константин Иванов";
    map.addOverlay(placemark);
});

$(document).ready(function () {

    $('img.doc').click(function () {
        $('#modal-pic').attr('src', $(this).attr('src'));
        $('#doc-modal').modal('show');
    });

    $('.modal-body input:eq(1)').mask('+7 (999) 999 9999');

    $('.review-pic').click(function () {
        $('.review-pic').removeClass('active');
        $(this).addClass('active');
        $('.review-tab').removeClass('active');
        $('#' + $(this).data('id')).addClass('active');
    });
/*
    $('#send-cb').click(function () {
        var name = $('.modal-body input:eq(0)').val();
        var phone = $('.modal-body input:eq(1)').val();
        var num_pattern = /^\+?[78]\s\(?\d{3}\)?\s?\d{3}.?\d{4}$/i;
        console.log(phone);
        if (!num_pattern.test(phone)) {
            swal({
                title: "Ошибка",
                text: "Введите номер телефона!",
                type: "error",
                confirmButtonText: "OK"
            });
            $('.modal-body input:eq(1)').val('');
            return false;
        }
        $.ajax({
            type: 'POST',
            url: '/callback.php',
            data: {
                'name': name,
                'phone': phone
            },
            success: function () {
                swal('Заявка отправлена!', 'Наш специалист свяжется с вами в течение нескольких минут', 'success');
                $('.modal-body input:eq(1)').val('');
            }
        });
    });
    */
});
