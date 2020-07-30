$(document).ready(function(){
		//副级评论隐藏和显示开始
		$('.has_son').click(function(){
			var target=$(this).attr("value");
			target='.son-'+target;
			//alert(target);
			if($(target).css("display")=="block"){
				$(target).css({"display":"none"});
			}else{
				$(target).css({"display":"block"});
			}
		});
		//副级评论隐藏和显示结束
		//
		//控制显隐样式
		var has_son_length=$('.has_son').length;
		for(i=0;i<has_son_length;i++){
			var this_son=$('.has_son').eq(i).attr("value");
			var son_name='son-'+this_son;
			//alert(son_name);
			if (!$('div').hasClass(son_name)) {
				$('.has_son').eq(i).parent().css({"margin-left":"730px"});
				$('.has_son').eq(i).css({"display":"none"});
			}
		}
		//控制显隐样式结束
		//
		//完善评论提交信息开始
		$("[class^='reply']").click(function(){
			if ($(this).attr("class").indexOf("_")>0) {
				var pid=$(this).attr("value");
				$('#change_pid').val(pid);
			}
			else{
				var pid=$(this).parent().parent().parent().attr("class").split("-")[1];
				$('#change_pid').val(pid);
				var former_content=$('#reply_content').val();
				var content="@"+$(this).attr("value")+"	";
				$('#reply_content').val(content);
			}
		});
		//完善评论提交信息结束

	});