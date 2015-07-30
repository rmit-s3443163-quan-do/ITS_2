/**
 * Created by JayDz on 30/07/15.
 */

var offer = '';
var topic = '';
var cur_mass = '';
var cur_edit = '';

click2();

function click2() {
    $('#offering-save').click(function () {
        var course_id = offer.attr('id').split('::')[1];

        var text = $('#offer-text').val();
        var start = $('#offer-start').val();
        var end = $('#offer-end').val();
        var url = $(this).children('span').attr('id') + course_id;

        $.ajax({
            type: "POST",
            url: url,
            dataType: 'json',
            data: {
                text: text,
                start: start,
                end: end
            },
            complete: function (data) {
                offer.closest('h4').siblings('.offer-add-here').html(data.responseText);
                click2();
            }
        });
    });

    $('#topic-save').click(function () {
        var offering = topic.attr('id').split('::')[1];

        var text = $('#topic-text').val();
        var url = $(this).children('span').attr('id') + offering;

        $.ajax({
            type: "POST",
            url: url,
            dataType: 'json',
            data: {
                text: text
            },
            complete: function (data) {
                topic.closest('h4').siblings('.topic-add-here').html(data.responseText);
                click2();
            }
        });
    });

    $('.btn-add-offering').click(function () {
        offer = $(this);
        $('.offering-modal').modal('show');
    });

    $('.btn-add-topic').click(function () {
        topic = $(this);
        $('.topic-modal').modal('show');
    });
    $('.btn-mass-enrol').click(function () {
        cur_mass = $(this).attr('id');
        $('.mass-modal').modal('show');
    });


    $(".modal").on('shown.bs.modal', function () {
        $(this).find("input:first").focus();
    });

    var c2 = $('.click2');

    c2.tooltip({
        'title': 'click to edit',
        'placement': 'right'
    });

    c2.click(function () {

        if (cur_edit != '')
            click2dismiss();

        cur_edit = $(this);

        var html = cur_edit.html().trim();

        if (/New Offering/.test(html))
            html = '';

        cur_edit.after('<div id="click2tmp"><input type="text" class="click2input" id="tmp-text" value="' + html + '"/> &nbsp; ' +
            '<span onclick="click2dismiss()" class="glyphicon glyphicon-remove incorrect"></span> &nbsp; ' +
            '<span onclick="click2save()" class="glyphicon glyphicon-ok correct"></span></div>');

        var tmp_text = $('#tmp-text');

        tmp_text.focus();
        tmp_text.keypress(function (e) {
            if ((e.keyCode || e.which) === 13) {
                click2save();
            }
        });
        $(document).keyup(function (e) {
            if (e.keyCode == 27 && cur_edit != '')
                click2dismiss();
        });
        $(this).hide();
    });
    $('[data-toggle="tooltip"]').tooltip();

}


function click2dismiss() {
    $('#click2tmp').remove();
    cur_edit.show();
}

function click2save() {
    var html = $('#tmp-text').val();
    $('#click2tmp').remove();
    cur_edit.html(html);
    cur_edit.show();

    var url = cur_edit.siblings('input[type=hidden]').val();
    var name = cur_edit.siblings('input[type=hidden]').attr('name');

    $.ajax({
        type: "POST",
        url: url,
        dataType: 'json',
        data: {data: name + '::' + html},
        beforeSend: function () {
            cur_edit.after(' <span id="updating" class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span>');
        },
        complete: function (data) {
            console.log(data.responseText);
            var update = $('#updating');
            update.after(' <span id="done" class="glyphicon glyphicon-ok correct"></span>');
            update.remove();

            setTimeout(function () {
                $('#done').fadeOut(300, function () {
                    $(this).remove();
                });
            }, 1000);
        }
    });

    cur_edit = '';
}

