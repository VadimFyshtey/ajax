jQuery(document).ready(function ($) {

    //Сортировка
    $(".sort input").change(function () {
       var id = $(this).attr('id');
       $('#load').fadeIn(1000, function () {
           $.ajax({
                url: '/sort/',
                type: 'post',
                data: 'sort_id='+id,

                success: function (html) {
                    $('body').html(html).hide().slideDown(400);
                    $('#load').fadeOut(400);

                }
           });
       });
    });

    //Модальное окно
    $(".buy a").click(function () {
        var id = $(this).attr('data-id');
        $.ajax({
            url: "/buy",
            type: 'post',
            data: {
                'prod_id': id
            },

            success: function (html) {
                var p = JSON.parse(html);
                $("#myModal").modal();
                $('.modal-body #name').html(p[0].name);
                $('.modal-body #price').html('Цена: ' + p[0].price + ' грн.');
                $('.modal-body #date').html('Дата: ' + p[0].date);
            }
        });
    });

    //Категории
    $(".list-group a").click(function () {
        var id = $(this).attr('data-id');
        window.location.href = '#'+id;
        $('#load').fadeIn(1000, function () {
            $.ajax({
                url: '/category/',
                type: 'post',
                data: {
                    'cat_id': id
                },

                success: function (html) {
                    $('body').html(html).hide().slideDown(400);
                    $('#load').fadeOut(400);
                    // history.pushState(null, null, '/category/1');
                }
            });
        });
    });

});
