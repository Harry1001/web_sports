$(document).ready(function () {
    getAll(1);
});

function getAll(page) {
    $('#dropdownMenu1').html("全部 <span class='caret'></span>");
    loadRow(page, 'joined/all')
}

function active(page) {
    $('#dropdownMenu1').html("活跃中 <span class='caret'></span>");
    loadRow(page, 'joined/active')
}

function expired(page) {
    $('#dropdownMenu1').html("已过期 <span class='caret'></span>");
    loadRow(page, 'joined/expired')
}

function loadRow(page, url) {
    $.ajax({
        url: url,
        type: 'GET',
        data: {
            page: page
        },
        success: function (dataList) {
            $('tr').remove('.activity_row');
            for (var i=0;i<dataList.length;i++){
                var item = dataList[i];
                var domstr = "<tr class=\"activity_row\" onclick='getDetail("+item.id+")'><td>" +
                    item.title +
                    "</td><td>" +
                    item.time +
                    "</td><td>" +
                    item.position +
                    "</td><td>" +
                    item.introduction +
                    "</td><td><button type='button' class='btn btn-danger' value='" +
                    item.id +
                    "'>删除</button></td></tr>";
                $('table').append(domstr);
            }
            $('.btn-danger').click(function (event) {
                deleteActivity(event);
            });
        }
    });
}

function getDetail(actvt_id) {
    console.log('catch activity id: '+actvt_id);
    var win = window.open(''+actvt_id);
    win.focus();
}

function deleteActivity(event) {
    event.preventDefault();
    event.stopPropagation();
    var btn = $(event.target);
    var tr = $(btn).parent().parent();
    var activityId = $(btn).attr('value');
    $.ajax({
        url: 'delete_join',
        type: 'GET',
        data: {
            actvt_id: activityId
        },
        success: function (result) {
            console.log(result);
            if (result == 'true'){
                $(tr).remove();
            }
            else {
                alert('对不起，删除失败，请稍后重试！');
            }
        }
    });
}