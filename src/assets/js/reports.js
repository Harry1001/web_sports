$(function () {
    $.ajax({
        url: 'reports/loadReports',
        type: 'GET',
        data:{},
        success: function (dataList) {
            console.log(dataList);
            if (dataList.length <= 0){
                $('#reports-container').append("<div>对不起，没有被举报的活动</div>");
            }
            else {
                $('#reports-container').append('<table class="table table-striped table-hover"><tr><th>活动名称</th><th>活动时间</th><th>活动地点</th><th>活动介绍</th><th>操作</th></tr></table>');
                console.log(dataList.length);
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


        }
    });
});

function getDetail(actvt_id) {
    console.log('catch activity id: '+actvt_id);
    var win = window.open('activity/'+actvt_id);
    win.focus();
}

function deleteActivity(event) {
    event.preventDefault();
    event.stopPropagation();
    var btn = $(event.target);
    var tr = $(btn).parent().parent();
    var activityId = $(btn).attr('value');
    $.ajax({
        url: 'activity/delete_report',
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