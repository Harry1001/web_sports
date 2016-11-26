var direction = 0;


$(document).ready(function () {
    getActivities(1);
});

function getActivities(page) {
    $.ajax({
        url: "activity/get_activities",
        type: 'GET',
        data: {
            page: page
        },
        success: function (dataList) {
            var obj = dataList;
            $('.content-container').empty();
            if (obj.length > 0){
                $('.content-container').append("<ul class='timeline'></ul>");
                for (var i=0;i<obj.length;i++){
                    var item = obj[i];
                    var domstr = "<li><div class='"+
                        getNextDirection()+
                        "'><div class='flag-wrapper'><a href='activity/" +
                            item.id +
                        "'><span class='flag'>" +
                            item.title +
                        "</span></a><span class='time-wrapper'><span class='time'>" +
                            item.time +
                        "</span></span></div><div class='desc'>" +
                            item.introduction +
                        "</div></div></li>";
                    $('.timeline').append(domstr);
                }
            }
            else {
                $('.content-container').append("<div id='fail_prompt'>对不起，没有其他活动可以显示</div>");
            }
        }
    });
}

function getNextDirection() {
    if (direction == 0){
        direction ++;
        return "direction-r";
    }
    else {
        direction --;
        return "direction-l";
    }
}