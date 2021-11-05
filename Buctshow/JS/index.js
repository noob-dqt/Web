
function creatdiv(){
                //创建一个div
		var text = document.getElementById('text').value;
		var time = document.getElementById('time').value;
		var place = document.getElementById('place').value;
		// alert(text+time+place);
		if(text==''||time==''||place==''){
			alert("输入框不能为空");
		}else{

		
		var div = document.createElement('div');
		div.innerHTML =
						'<div class="post__head">'+
							'<a href="#" class="post__head-img">'+
								'<img src="img/headimg.jpg" alt="">'+
							'</a>'+
							'<div class="post__head-title">'+
								'<h5><a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">fuge331</font></font></a></h5>'+
								'<p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">现在</font></font></p>'+
							'</div>'+

							'<div class="post__dropdown">'+
								'<a class="dropdown-toggle post__dropdown-btn" href="#" role="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'+
									'<i class="icon ion-md-more"></i>'+
								'</a>'+

								'<ul class="dropdown-menu dropdown-menu-right post__dropdown-menu" aria-labelledby="dropdownMenu1">'+
									'<li><a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">编辑</font></font></a></li>'+
									'<li><a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">删除</font></font></a></li>'+
									'<li><a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">隐藏</font></font></a></li>'+
								'</ul>'+
							'</div>'+
						'</div>'+

						

						

						'<div class="post__options">'+
							'<span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'+place+'</font></font></span>'+
							'<p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'+time+'</font></font></p>'+
						'</div>'+

						'<div class="post__description">'+
							'<p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'+text+'</font></font></p>'+
							'<a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">查看更多</font></font></a>'+
						'</div>';
					
		div.className = "post";//设置div的属性，如：class，title，id 等等

		var bo = document.getElementById("ddd"); //获取body对象.
        // alert('插入成功');
		//动态插入到body中
		bo.insertBefore(div,bo.firstChild);
		}
        // alert(bo.insertBefore(div,bo.firstChild.nextSibling))

		// alert('dwdwd');
		// div.innerHTML = '<img' + '>'; //设置显示的数据，可以是标签．
		// div.className = "video-"+(i+1);//设置div的属性，如：class，title，id 等等
 
		// var bo = document.body; //获取body对象.
		// //动态插入到body中
		// bo.insertBefore(div, bo.lastChild);

}
function creatds(){
	//创建一个div
var text = ['希望找到一起学习的小伙伴！','有朋友一起学习吗？','大家一起努力，共同进步!'];
var time = ['13:00-15:00','15:00-16:00','18:00-21:00'];
var place =['风雨操场','教学楼','宿舍楼'];
var name=['vaede','sonyyyer','fudw'];
for (i=0;i<5;i++)
{
	ntext=text[Math.floor(Math.random()*10)%3];
	ntime=time[Math.floor(Math.random()*10)%3];
	nplace=place[Math.floor(Math.random()*10)%3];
	nname=name[Math.floor(Math.random()*10)%3];
var div = document.createElement('div');
div.innerHTML =
			'<div class="post__head">'+
				'<a href="#" class="post__head-img">'+
					'<img src="img/headimg.jpg" alt="">'+
				'</a>'+
				'<div class="post__head-title">'+
					'<h5><a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'+nname+'</font></font></a></h5>'+
					'<p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">现在</font></font></p>'+
				'</div>'+

				'<div class="post__dropdown">'+
					'<a class="dropdown-toggle post__dropdown-btn" href="#" role="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'+
						'<i class="icon ion-md-more"></i>'+
					'</a>'+

					'<ul class="dropdown-menu dropdown-menu-right post__dropdown-menu" aria-labelledby="dropdownMenu1">'+
						'<li><a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">编辑</font></font></a></li>'+
						'<li><a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">删除</font></font></a></li>'+
						'<li><a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">隐藏</font></font></a></li>'+
					'</ul>'+
				'</div>'+
			'</div>'+

			

			

			'<div class="post__options">'+
				'<span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'+nplace+'</font></font></span>'+
				'<p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'+ntime+'</font></font></p>'+
			'</div>'+

			'<div class="post__description">'+
				'<p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'+ntext+'</font></font></p>'+
				'<a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">查看更多</font></font></a>'+
			'</div>';
		
div.className = "post";//设置div的属性，如：class，title，id 等等

var bo = document.getElementById("ddd"); //获取body对象.
// alert('插入成功');
//动态插入到body中
bo.insertBefore(div,bo.lastChild);
}
// alert(bo.insertBefore(div,bo.firstChild.nextSibling))

// alert('dwdwd');
// div.innerHTML = '<img' + '>'; //设置显示的数据，可以是标签．
// div.className = "video-"+(i+1);//设置div的属性，如：class，title，id 等等

// var bo = document.body; //获取body对象.
// //动态插入到body中
// bo.insertBefore(div, bo.lastChild);

}
