var user;
$(function () {
    user = $('#hide-user-id').html();
    $.ajax({
        url: 'isFaned',
        type: 'GET',
        data: {
            username: user
        },
        success: function (result) {
            if (result == 'true'){
                $('#btn-fan').html('<button type="button" class="btn btn-default" onclick="unFan(user)">取消关注</button>');
            }
            else {
                $('#btn-fan').html('<button type="button" class="btn btn-warning" onclick="fan(user)">  关注  </button>');
            }
        }
    });
});


function fan() {
    $.ajax({
        url: 'fan',
        type: 'GET',
        data: {
            username: user
        },
        success: function (result) {
            if (result == 'true'){
                $('#btn-fan').html('<button type="button" class="btn btn-default" onclick="unFan(user)">取消关注</button>');
            }
            else {
                alert("对不起，关注失败...");
            }
        }
    });
}

function unFan() {
    $.ajax({
        url: 'unFan',
        type: 'GET',
        data: {
            username: user
        },
        success: function (result) {
            if (result == 'true'){
                $('#btn-fan').html('<button type="button" class="btn btn-warning" onclick="fan(user)">  关注  </button>');
            }
            else {
                alert("对不起，关注失败...");
            }
        }
    });
}