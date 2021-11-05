var index = 0, len;
        // 类似获取一个元素数组
var imgBox = document.getElementsByClassName("no");
var kuai = document.getElementsByClassName("kuai");
len = imgBox.length;
kuai[index].style.backgroundColor = '#4db5f2';
imgBox[index].style.display = 'block';
// 逻辑控制函数
function slideShow() {
    index ++;
            // 防止数组溢出
    if(index >= len) index = 0;
            // 遍历每一个元素
    for(var i=0; i<len;i++) {
        imgBox[i].style.display = 'none';
        kuai[i].style.backgroundColor = 'transparent';
     }
                     // 每次只有一张图片显示
    imgBox[index].style.display = 'block';
    kuai[index].style.backgroundColor = '#4db5f2';

}
        
        // 定时器，间隔3s切换图片
setInterval(slideShow, 3000);

function play(a){
    for(var i=0; i<len;i++) {
        imgBox[i].style.display = 'none';
        kuai[i].style.backgroundColor = 'transparent';
     }    
    kuai[a].style.backgroundColor = '#4db5f2';
    imgBox[a].style.display = 'block';
    index = a;
}
