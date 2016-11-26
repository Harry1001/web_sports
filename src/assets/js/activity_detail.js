
function join() {
    var actvt_id = $('#hide-id').html();
    $.ajax({
        url: "join",
        type: 'GET',
        data: {
            id: actvt_id
        },
        success: function (result) {
            if (result == 'true'){
                location.reload();
                alert("加入成功!");
            }
            else {
                alert("对不起，加入活动失败!");
            }
        }
    });
}

function report() {
    var actvt_id = $('#hide-id').html();
    $.ajax({
        url: "report",
        type: 'GET',
        data: {
            id: actvt_id
        },
        success: function (result) {
            if (result == 'true'){
                alert("举报成功!");
            }
            else {
                alert("对不起，加入活动失败!");
            }
        }
    });
}