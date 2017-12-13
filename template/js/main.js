jQuery(document).ready(function ($) {

    //Сортировка
    $(".sort input").change(function () {
       var id = $(this).attr('id');
       $('#load').fadeIn(1000, function () {
           $.ajax({
                url: '/sort/'+id,
                type: 'get',
                data: 'sort_id='+id,

                success: function (html) {
                    $('body').html(html);
                    $('#load').fadeOut(400);

                    var str = '/sort/' + id;
                    if(window.location.pathname.length <= 7){
                        history.pushState(null, null, str);
                    }
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
    $(".list-group a").click(function (e) {
        e.preventDefault();
        var id = $(this).attr('data-id');

        $('#load').fadeIn(1000, function () {
            $.ajax({
                url: '/category/'+id,
                type: 'get',
                data: {
                    'cat_id': id
                },

                success: function (html) {
                    $('body').html(html);
                    $('#load').fadeOut(400);

                    var str = '/category/' + id;
                    if(window.location.pathname.length <= 11){
                        history.pushState(null, null, str);
                    }

                }
            });
        });
    });

    //Сортирока категорий

        $(".sort1").on('change', 'input', function () {
            var str = window.location.pathname;
            var s = str.substr(10, 1);
            var sort_id = $(this).attr('id');
            $('#load').fadeIn(1000, function () {
                $.ajax({
                    url: '/category/'+s+'/sort/'+sort_id,
                    type: 'get',
                    data: {
                        'cat_id': s,
                        'sort_id': sort_id
                    },

                    success: function (html) {
                        $('body').html(html);
                        $('#load').fadeOut(400);
                    }
                });
            });
        })



});
