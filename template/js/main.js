jQuery(document).ready(function ($) {

    var firstSection = '/' + location.pathname.replace('/', '').split('/')[0] + '/index.php';

    //Сортировка
    $(".sort input").change(function () {
       var id = $(this).attr('id');
       $('#load').fadeIn(200, function () {
           $.ajax({
                url: firstSection + '/sort/'+id,
                type: 'get',
                data: 'sort_id='+id,

                success: function (html) {
                    $('body').html(html);
                    $('#load').fadeOut(100);
                    $('.sort input').eq(id - 1).prop('checked', true);
                    var str =  firstSection + '/sort/' + id;
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
            url: firstSection + "/buy",
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

        $('#load').fadeIn(200, function () {
            $.ajax({
                url: firstSection + '/category/'+id,
                type: 'get',
                data: {
                    'cat_id': id
                },

                success: function (html) {
                    $('body').html(html);
                    $('#load').fadeOut(100);

                    var str = firstSection + '/category/' + id;
                        history.pushState(null, null, str);

                }
            });
        });
    });

    //Сортирока категорий
    $(".sort1").on('change', 'input', function () {
        var str = window.location.pathname;
        var s = str.substr(-1);

        var sort_id = $(this).attr('id');

        $('#load').fadeIn(200, function () {
            $.ajax({
                url: firstSection + '/category/'+s+'/sort/'+sort_id,
                type: 'get',
                data: {
                    'cat_id': s,
                    'sort_id': sort_id
                },

                success: function (html) {
                    $('body').html(html);
                    $('#load').fadeOut(100);

                    var str = firstSection + '/category/' + s + '/sort/' + sort_id;
                    history.pushState(null, null, str);
                    $('.sort1 input').eq(sort_id - 1).prop('checked', true);

                }
            });
        });
    });

});
