function sfalert(str){
    var al=document.getElementById('sal_ct');
    al.innerHTML= str;
    var appear=document.getElementById('salert');
    appear.style.display = 'block';
    setTimeout(function(){appear.style.display = 'none';}, 3000);
}

$("body").click(function(e) {
    if(!$(e.target).closest(".cg_infomation,.cg_box,.add_dep,.add_box").length) {
        $(".cg_box").css("height","0");
        $(".cg_infomation").css("background-color","#fff");
        $(".add_box").css("height","0");
    }
});
//************修改部门 */
var idx;    //记录点击的位置
$(".cg_infomation").click(function(){
    $(".cg_box").css("height","5%");
    idx=$(".cg_infomation").index(this);
    var cur=$(this);
    $(".cg_infomation").css("background-color","#fff");
    cur.css("background-color","rgb(0 0 0 / 8%)");
});
$(".cg_btn").click(function(){
    var id=$(".cg_id").val();
    $tagname=".the_id"+idx;
    var oldid=$($tagname).text();
    // console.log($tagname);
    // console.log(oldid);
    var name=$(".cg_name").val();
    var mid=$(".cg_mid").val();
    var pid=$(".cg_pid").val();
    var pwd=$(".cg_pwd").val();
    var lev=$(".cg_lev").val();
    if(!(id||name||mid||pwd||pid||lev)) {
        sfalert("啥也没填啊");
        return ;
    }
    // console.log(id);console.log(name);console.log(mid);console.log(pwd);
    $.ajax({
        type: "POST",
        url: "PHP/change_emp.php",
        data: {"oldid":oldid,"newid":id,"newname":name,"newmid":mid,"newpwd":pwd,"newpid":pid,"newlev":lev},
        // dataType: "json",
        dataType: "text",
        success: function(msg){
            sfalert(msg);
            if(msg=="修改成功")
                setTimeout(function(){
                    window.location.reload();
                },500);    
        },
        error:function(msg){
            sfalert('服务器发生错误');
        }
    });
});

$(".cg_btn_dep").click(function(){
    var id=$(".cg_id").val();
    $tagname=".the_id"+idx;
    var oldid=$($tagname).text();
    var name=$(".cg_name").val();
    var loc=$(".cg_loc").val();
    if(!(id||name||loc)) {
        sfalert("啥也没填啊");
        return ;
    }
    // console.log(oldid);console.log(id);console.log(name);console.log(loc);
    $.ajax({
        type: "POST",
        url: "PHP/change_dep.php",
        data: {"oldid":oldid,"newid":id,"newname":name,"newloc":loc},
        // dataType: "json",
        dataType: "text",
        success: function(msg){
            sfalert(msg);
            if(msg=="修改成功")
                setTimeout(function(){
                    window.location.reload();
                },500);    
        },
        error:function(msg){
            sfalert('服务器发生错误');
        }
    });
});
//**********增加部门 */
$(".add_dep").click(function(){
    $(".add_box").css("height","5%");
    $(".cg_box").css("height",0);
    $(".cg_infomation").css("background-color","#fff");
});

$(".add_btn_dep").click(function(){
    var id=$(".add_id").val();
    var name=$(".add_name").val();
    var loc=$(".add_loc").val();
    if(!(id&&name&&loc)) {
        sfalert("请填写完整");
        return ;
    }
    // console.log(oldid);console.log(id);console.log(name);console.log(loc);
    $.ajax({
        type: "POST",
        url: "PHP/add_dep.php",
        data: {"newid":id,"newname":name,"newloc":loc},
        // dataType: "json",
        dataType: "text",
        success: function(msg){
            sfalert(msg);
            if(msg=="添加成功")
                setTimeout(function(){
                    window.location.reload();
                },500);    
        },
        error:function(msg){
            sfalert('服务器发生错误');
        }
    });
});
/***********删除部门 */
$(".delete_dep").click(function(){
    if(confirm("确定删除该部门?删除后原属于该部门的员工部门号将会置为0，请及时分配这些员工进入其他部门")){
        var tagname=".the_id"+$(".delete_dep").index(this); 
        var id=$(tagname).text();
        // console.log(tagname);console.log(id);
        $.ajax({
            type: "POST",
            url: "PHP/delete_dep_emp.php",
            data: {"delete":"dep","oldid":id},
            // dataType: "json",
            dataType: "text",
            success: function(msg){
                sfalert(msg);
                if(msg=="删除成功")
                    setTimeout(function(){
                        window.location.reload();
                    },500);    
            },
            error:function(msg){
                sfalert('服务器发生错误');
            }
        });
    }
});

/***********删除员工 */
$(".delete_emp").click(function(){
    if(confirm("确定删除该员工?删除后会将其所有请假记录同时删除")){
        var tagname=".the_id"+$(".delete_emp").index(this); 
        var id=$(tagname).text();
        // console.log(tagname);console.log(id);
        $.ajax({
            type: "POST",
            url: "PHP/delete_dep_emp.php",
            data: {"delete":"emp","oldid":id},
            // dataType: "json",
            dataType: "text",
            success: function(msg){
                sfalert(msg);
                if(msg=="删除成功")
                    setTimeout(function(){
                        window.location.reload();
                    },500);    
            },
            error:function(msg){
                sfalert('服务器发生错误');
            }
        });
    }
});