
//jq开始
	$(document).ready(function(){

		//调用打字机函数开始
   		type_write($('#c-cate-top-two p'),100);
   		//调用打字机函数结束
   		 		
});
//jq结束


//打字机函数开始
	function type_write(obj,speed) {
			  var words=obj.html();
			  var n=words.length;
			  var m=0;
			  obj.html("");

		var	 e=setInterval(function(){
				var single_word=words.substr(m,1);
					if(single_word=="<"){
						m=words.indexOf(">",m)+1;
					}else{
			  			m++;
					}
			  		obj.html(words.substr(0,m)+(m&1? "_":" "));
			  		if(m>n){
			  			clearInterval(e);
			  			obj.html(words.substr(0,m));
			  		}	
				},speed);		
			}
//打字机函数结