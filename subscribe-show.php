<?php
/*
Plugin Name:fangbao-subscribe-show
Plugin URI: http://wp.fang1688.cn/php/688.html
Description:由方包开发的wp插件（subscribe-show），是一款微信公众号涨粉工具，本插件可以隐藏文章中的任意部分内容，当访客关注您的微信公众号后，可获取验证码查看隐藏内容。使用方法：在文章编辑页插入短代码[collapse title="点击展开 查看更多"]此处输入你要隐藏的内容[/collapse]；详情请点击下方“插件主页”。
Version: 1.0
Author: 方包
Author URI: http://www.fang1688.cn
License: GPLv2
*/

//设置时区为 亚洲/上海
date_default_timezone_set('Asia/Shanghai');

class subscribe_show {
	


	//构造方法，创建类的时候调用
	function subscribe_show() {
		

		
 		//引用文件的钩子
		add_action( 'wp_enqueue_scripts', 'fbao_enqueue_style' );
		add_action( 'wp_enqueue_scripts', 'fbao_enqueue_script');		

		//自定义引用样式表
		function fbao_enqueue_style() {
			wp_enqueue_style( 'core', plugins_url('css/modal.css', __FILE__) , false ); 
		}
	
			//自定义引用脚本文件
		function fbao_enqueue_script() {
 
			wp_enqueue_script('plugin_script', plugins_url('js/modal.js', __FILE__), '','1.1', true);
		}	 
		
		//添加一个 hcsem 短标签，调用 hcsem_shortcode 方法进行处理
		add_shortcode( 'collapse', array( $this, 'fb_show' ) );
		
		add_action('admin_print_footer_scripts', 'appthemes_add_collapse' );


//添加展开/收缩快捷标签按钮
function appthemes_add_collapse() {
?>
    <script type="text/javascript">
		
        if ( typeof QTags != 'undefined' ) {
            QTags.addButton( 'collapse', '展开/收缩按钮', '[collapse title="点击展开 查看更多"]','[/collapse]' );
        } 
    </script>
<?php 
}




		
	}

	function fb_show( $atts, $content = "" ) {
				 
		 $first = '<link rel="stylesheet" type="text/css" rel="external nofollow" target="_blank" href="https://cdn.bootcss.com/sweetalert/1.1.3/sweetalert.min.css" >';
		 $second = '<script src="https://cdn.bootcss.com/sweetalert/1.1.3/sweetalert.min.js"></script>';
		 // $first = '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
				// 文章页添加展开收缩效果
	extract(shortcode_atts(array("title"=>""),$atts));
	return '<div style="margin: 0.5em 0;">
		    <div class="xControl">
			    <a href="javascript:void(0)" class="collapseButton xButton"><span class="xTitle">'.$title.'</span></a>
			    <div style="clear: both;"></div>
		    </div>
		<div class="xContent" style="display: none;">'.$content.'</div>
	</div>'.$first.$second;

		
		
		
// 		$atts = shortcode_atts( array(
// 			'title' => '方包博客',
// 		), $atts, 'fbshow' );
// 		
// 		return $atts['title'];

	}







}

new subscribe_show();





function fb_subscribe_show() {
	
	//插件停用，设置停用标识为1
	update_option( "fb_subscribe_show", "yes" );
	
}