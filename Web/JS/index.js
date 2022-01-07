/**universal func *************/
function sfalert(str){
    var al=document.getElementById('sal_ct');
    al.innerHTML= str;
    var appear=document.getElementById('salert');
    appear.style.display = 'block';
    setTimeout(function(){appear.style.display = 'none';}, 2500);
}

/********************************* */
function log_out(){
    $.ajax({
        type: "POST",
        url: "index.php",
        data: {"log_out":"1"},
        // dataType: "json",
        dataType: "text",
        success: function(msg){
            window.location.reload();
        },
        error:function(msg){
            alert('服务器发生错误');
        }
    });
}
/***********index part***************/
// var cnt=0;
function apply_vac(){
    $(".r_bot").css("display","none");
    var input_info_box=document.getElementById("input_info_box");
    input_info_box.style.width='70%';
    input_info_box.style.height='80%';
    input_info_box.style.opacity='1';
}

$(".change_pub").click(function(){
    $(".input_ntc_box").css("display","70%");
    $(".input_ntc_box").css("width","70%");
    $(".input_ntc_box").css("height","80%");
    $(".input_ntc_box").css("opacity","1");
});

$("#apply_btn").click(function(){
    var vac_type=$("#vac_type").val();
    var begd=$("#date_beg").val();
    var endd=$("#date_end").val();
    var vac_reason=$("#reason").val();
    if(!(vac_reason&&vac_type&&begd&&endd)){
        sfalert('请填写完整');
        return ;
    }
    if(vac_type!="事假"&&vac_type!="病假"&&vac_type!="出差"&&vac_type!="带薪休假"){
        sfalert('请填写正确请假类型');
        return 0;
    }
    $.ajax({
        type: "POST",
        url: "PHP/apply.php",
        data: {"vac_type":vac_type,"date_beg":begd,"date_end":endd,"vac_reason":vac_reason},
        // dataType: "json",
        dataType: "text",
        success: function(msg){
            sfalert(msg);
            if(msg=='申请成功，请等待管理员审核')
                $("body").trigger("click");
        },
        error:function(msg){
            sfalert('服务器发生错误');
        }
    });
});

/*************************************** */

/********personal_rec part*************/
$(".check_detail").click(function(){
    var idx=$(".check_detail").index(this);
    var boxname=".box"+idx;
    $(".reason_box").css("display","none");
    $(boxname).css("display","block");
});

$(".shut_btn").click(function(){
    $(".reason_box").css("display","none");
});

/**************************************/


/*********approve part********* *******/
$(".pass_req").click(function(){
    var pre_btn=$(this);
    var idx=$(".pass_req").index(this);
    var boxname=".num"+idx;
    var numid=$(boxname).text();
    $.ajax({
        type: "POST",
        url: "PHP/confirm.php",
        data: {"num":numid},
        // dataType: "json",
        dataType: "text",
        success: function(msg){
            sfalert(msg);
            if(msg=='已批准')
                pre_btn.css("display","none");
        },
        error:function(msg){
            sfalert('服务器发生错误');
        }
    });
});
/************************************ */

/**********count part*************** */
//按年
$(".year_rec").click(function() {
    var y_cnt;      //json格式
    $.ajax({
        type: "POST",
        url: "PHP/count.php",
        data: {"type":"year"},
        dataType: "json",
        // dataType: "text",
        async:false,  //同步AjAX请求(默认是异步执行！)
        success: function(msg){
            // console.log(msg['2021']);
            y_cnt=msg;
        },
        error:function(msg){
            sfalert('服务器发生错误');
        }
    });
    // console.log(y_cnt);
    var cont=$(".chart_box");
    var title = {
        text: "年度请假情况总结"
    };
    var xAxis = {
        categories: ['2015', '2016', '2017', '2018', '2018', '2019'
                ,'2020', '2021', '2022', '2023', '2024', '2025']
    };
    var yAxis = {
        title: {
            text: '人次'
        },
        plotLines: [{
            value: 0,
            width: 1,
            color: '#808080'
        }]
    };   

    var tooltip = {
        valueSuffix: '次'
    }

    var legend = {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle',
        borderWidth: 0
    };
    var arr=['2015', '2016', '2017', '2018', '2018', '2019'
    ,'2020', '2021', '2022', '2023', '2024', '2025'];
    data_cnt=[];
    for(var i=0;i<11;i++) data_cnt[i]=parseInt(y_cnt[arr[i]]);
    // console.log(data_cnt);
    var series =  [
        {
            name: '累计请假人次',
            data: data_cnt
        }
    ];
    var json = {};
    json.title = title;
    json.xAxis = xAxis;
    json.yAxis = yAxis;
    json.tooltip = tooltip;
    json.legend = legend;
    json.series = series;

    cont.css("display","block");
    cont.highcharts(json);
});
//按月
$(".mon_rec").click(function() {
    var y_cnt;      //json格式
    $.ajax({
        type: "POST",
        url: "PHP/count.php",
        data: {"type":"mon"},
        dataType: "json",
        // dataType: "text",
        async:false,  //同步AjAX请求(默认是异步执行！)
        success: function(msg){
            // console.log(msg);
            y_cnt=msg;
        },
        error:function(msg){
            sfalert('服务器发生错误');
        }
    });
    var cont=$(".chart_box");
    var title = {
        text: "月度请假情况总结"
    };
    var chart = {
        type: 'column'
    };
    var xAxis = {
        categories: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
        title: {
            text: '月份'
        }
    };
    var yAxis = {
        title: {
            text: '人次'
        },
        plotLines: [{
            value: 0,
            width: 1,
            color: '#808080'
        }]
    };   

    var tooltip = {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:f} 人次</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    }
    var plotOptions = {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    };  
    var credits = {
        enabled: false
    };
    data_cnt=[];
    var s=0;
    for(var i=0;i<12;i++) {
        data_cnt[i]=parseInt(y_cnt[i+1+""]);
        s+=data_cnt[i];
    }
    // console.log(data_cnt);
    var series =  [
        {
            name: '累计请假人次',
            data: data_cnt
        }
    ];

    var json = {};
    json.chart = chart;
    json.title = title;
    json.xAxis = xAxis;
    json.yAxis = yAxis;
    json.tooltip = tooltip;
    json.series = series;
    json.plotOptions = plotOptions;
    json.credits = credits;
    cont.css("display","block");
    cont.highcharts(json);
});

//按人
$(".emp_rec").click(function() {
    var y_cnt;      //json格式
    $.ajax({
        type: "POST",
        url: "PHP/count.php",
        data: {"type":"emp"},
        dataType: "json",
        // dataType: "text",
        async:false,  //同步AjAX请求(默认是异步执行！)
        success: function(msg){
            // console.log(msg);
            y_cnt=msg;
        },
        error:function(msg){
            sfalert('服务器发生错误');
        }
    });
    // console.log(y_cnt);
    var cont=$(".chart_box");
    var chart = {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false
    };
    var title = {
        text: "各员工请假次数比例"
    };
    var tooltip = {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    };
    var plotOptions = {
        pie: {
           allowPointSelect: true,
           cursor: 'pointer',
           dataLabels: {
              enabled: true,
              format: '<b>{point.name}</b>: {point.percentage:.1f} %',
              style: {
                 color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
              }
           }
        }
    };

    data_cnt=[];
    var j=0;
    for(var i in y_cnt){
        var x=[i+"",parseInt(y_cnt[i])];
        data_cnt[j++]=x;
    }
    var series= [{
        type: 'pie',
        name: '占比',
        data: data_cnt
    }];  
    var json = {};
    json.chart=chart;
    json.title = title;
    json.tooltip = tooltip;
    json.series = series;
    json.plotOptions = plotOptions;
    cont.css("display","block");
    cont.highcharts(json);
});

//按部门
$(".dep_rec").click(function(){
    var y_cnt;      //json格式
    $.ajax({
        type: "POST",
        url: "PHP/count.php",
        data: {"type":"dep"},
        dataType: "json",
        // dataType: "text",
        async:false,  //同步AjAX请求(默认是异步执行！)
        success: function(msg){
            // console.log(msg);
            y_cnt=msg;
        },
        error:function(msg){
            sfalert('服务器发生错误');
        }
    });
    var cont=$(".chart_box");
    var title = {
        text: "各部门请假情况汇总"
    };
    
    var chart = {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false
    };
    var tooltip = {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    };
    var plotOptions = {
        pie: {
           allowPointSelect: true,
           cursor: 'pointer',
           dataLabels: {
              enabled: true,
              format: '<b>{point.name}</b>: {point.percentage:.1f} %',
              style: {
                 color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
              }
           }
        }
    };
    data_cnt=[];
    var j=0;
    for(var i in y_cnt){
        var x=[i+"",parseInt(y_cnt[i])];
        data_cnt[j++]=x;
    }
    var series= [{
        type: 'pie',
        name: '占比',
        data: data_cnt
    }];  
    var json = {};
    json.chart=chart;
    json.title = title;
    json.tooltip = tooltip;
    json.series = series;
    json.plotOptions = plotOptions;
    cont.css("display","block");
    cont.highcharts(json);
});

//按类型
$(".tp_rec").click(function() {
    var y_cnt;      //json格式
    $.ajax({
        type: "POST",
        url: "PHP/count.php",
        data: {"type":"vac"},
        dataType: "json",
        // dataType: "text",
        async:false,  //同步AjAX请求(默认是异步执行！)
        success: function(msg){
            // console.log(msg['2021']);
            y_cnt=msg;
        },
        error:function(msg){
            sfalert('服务器发生错误');
        }
    });
    // console.log(y_cnt);
    var cont=$(".chart_box");
    var title = {
        text: "请假类型统计"
    };
    var xAxis = {
        categories: ['事假', '病假', '出差', '带薪休假']
    };
    var yAxis = {
        title: {
            text: '人次'
        },
        plotLines: [{
            value: 0,
            width: 1,
            color: '#808080'
        }]
    };   

    var tooltip = {
        valueSuffix: '次'
    }

    var legend = {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle',
        borderWidth: 0
    };
    var arr= ['事假', '病假', '出差', '带薪休假'];
    data_cnt=[];
    for(var i=0;i<4;i++) data_cnt[i]=parseInt(y_cnt[arr[i]]);
    // console.log(data_cnt);
    var series =  [
        {
            name: '累计人次',
            data: data_cnt
        }
    ];
    var json = {};
    json.title = title;
    json.xAxis = xAxis;
    json.yAxis = yAxis;
    json.tooltip = tooltip;
    json.legend = legend;
    json.series = series;
    cont.css("display","block");
    cont.highcharts(json);
});

//按请假天数
$(".cnt_rec").click(function() {
    var y_cnt;      //json格式
    $.ajax({
        type: "POST",
        url: "PHP/count.php",
        data: {"type":"cnt"},
        dataType: "json",
        // dataType: "text",
        async:false,  //同步AjAX请求(默认是异步执行！)
        success: function(msg){
            // console.log(msg);
            y_cnt=msg;
        },
        error:function(msg){
            sfalert('服务器发生错误');
        }
    });
    // console.log(y_cnt);
    var cont=$(".chart_box");
    var chart = {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false
    };
    var title = {
        text: "请假时长分类统计表"
    };
    var tooltip = {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    };
    
    var plotOptions = {
        pie: {
           allowPointSelect: true,
           cursor: 'pointer',
           dataLabels: {
              enabled: true,
              format: '<b>{point.name}天</b>: {point.percentage:.1f}%',
              style: {
                 color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
              }
           }
        }
    };

    var s=0;
    for(var i in y_cnt)
        s+=parseInt(y_cnt[i]);
    data_cnt=[];
    var j=0;
    for(var i in y_cnt){
        var x=[i+"",parseInt(y_cnt[i])/s];
        data_cnt[j++]=x;
    }
    // console.log(data_cnt);
    var series= [{
        type: 'pie',
        name: '比例',
        data: data_cnt
    }];  
    var json = {};
    json.chart=chart;
    json.title = title;
    json.tooltip = tooltip;
    json.series = series;
    json.plotOptions = plotOptions;
    cont.css("display","block");
    cont.highcharts(json);
});
/*********************************** */

/**search part *************/
$(".reset_ret_btn").click(function(){
    var path=window.location.href;
    $.ajax({
        type: "POST",
        url: path,
        data: {"search_text":"search_false"},
        // dataType: "json",
        dataType: "text",
        // async:false,  //同步AjAX请求(默认是异步执行！)
        success: function(msg){
            // window.location.reload();
        },
        error:function(msg){
            alert('服务器发生错误');
        }
    });
});

$(".search_inp").keypress(function(e){
    var key=e.which;
    if(key==13){
        $(".sear_box_0").trigger("click");
    }
});

$(".reset_btn").click(function(){
    var path=window.location.href;
    $.ajax({
        type: "POST",
        url: path,
        data: {"search_text":"search_false"},
        // dataType: "json",
        dataType: "text",
        // async:false,  //同步AjAX请求(默认是异步执行！)
        success: function(msg){
            window.location.reload();
        },
        error:function(msg){
            alert('服务器发生错误');
        }
    });
});
$(".sear_box_0").click(function(){
    var path=window.location.href;
    // alert(path);
    var sear_inp=$(".search_inp").val();
    if(sear_inp=="") sear_inp="search_false";

    // alert("AJAX:"+sear_inp);
    $.ajax({
        type: "POST",
        url: path,
        data: {"search_text":sear_inp},
        // dataType: "json",
        dataType: "text",
        // async:false,  //同步AjAX请求(默认是异步执行！)
        success: function(msg){
            window.location.reload();
        },
        error:function(msg){
            alert('服务器发生错误');
        }
    });
});
/************************* */
/**************删除记录******** */
$(".delete_rec").click(function(){
    if(confirm("删除后不可恢复，是否删除该条记录!")){
        var tagname=".num"+$(".delete_rec").index(this); 
        var id=$(tagname).text();
        // console.log(tagname);console.log(id);
        $.ajax({
            type: "POST",
            url: "PHP/delete_rec.php",
            data: {"delete":"rec","num":id},
            // dataType: "json",
            dataType: "text",
            success: function(msg){
                sfalert(msg);
                if(msg=="删除成功")
                    setTimeout(function(){
                        window.location.reload();
                    },800);    
            },
            error:function(msg){
                sfalert('服务器发生错误');
            }
        });
    }
});