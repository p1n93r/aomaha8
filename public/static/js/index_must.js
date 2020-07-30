//index页面的主体jq
//轮播的定位到相应推文列表
$(document).ready(function(){
    $('.c-top').eq(0).css('background-color','#D9EDF7');
     $('#myCarousel').on('slide.bs.carousel', function (event) {
                var $hoder = $('#myCarousel').find('.item'),
                    $items = $(event.relatedTarget);
                var getIndex= $hoder.index($items);
                $('.c-top').eq(getIndex).css('background-color','#D9EDF7');
                $('.c-top').not($('.c-top').eq(getIndex)).css('background-color','#FFFFFF');                              
            });
});