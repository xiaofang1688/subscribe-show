 // 添加文章页展开收缩JS效果     
	  
	  
	  jQuery(document).ready(
        function(jQuery){
            jQuery('.collapseButton').click(
			    function(){
					
					var that =this;



swal({ 
  title: "优派编程",
  text: "<image src='https://www.fang1688.cn/wp-content/uploads/2020/07/qrcode_for_gh_1fd2e4a34038_258.jpg'></image><div>扫码关注上方微信公众号【优派编程】,回复暗号【验证码】</div>",
  type: "input",
   html: true,
  showCancelButton: true, 
  // confirmButtonColor: "#DD6B55",
//   confirmButtonText: "肯定删除！", 
//   cancelButtonText: "取消删除！",
  closeOnConfirm: false, 
  closeOnCancel: false ,
  inputPlaceholder: "请输入验证码",
  allowEscapeKey:false,
},
function(inputValue){ 

	  // console.log(inputValue);
  if (inputValue === false) {
	  swal.close();
	  return false;
  }
  if (inputValue === "") {
    swal.showInputError("你输入为空!");
    return false;
  }

if(inputValue === "168168"){
	  swal("Nice!","输入正确： " + inputValue,"success");
	  swal.close();
	console.log(jQuery(that));
	 jQuery(that).parent().parent().find('.xContent').slideToggle('slow');
	jQuery(that).parent().addClass("hidden-element");
}
else{
	swal.showInputError("请输入正确的验证码!");
	return false;
}



  
  
});



		
					
					
					
                   
                }
		    );
        }
    );