<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta charset="UTF-8">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, minimal-ui">
    <title>Secret Wall</title>
    <link rel="stylesheet" href="CSS/tree_h_style.css" />
  </head>
  <?php
      $flag=$_COOKIE['firstin'];
      if($flag=="false"){
        echo "<body>";
      }
      else{
        echo '<body onload="ntc()">';
      }
  ?>
  <!-- <body onload="ntc()"> -->
    <div id="fread">
      <h2><strong>用户必读</strong></h2>
      <p>有心事却找不到人倾诉？想吐槽却找不到地方？“秘密墙”专门用来服务北化学子，将一切想说却不能公开说的话统统塞到秘密墙上吧~~</p>
      <p>使用须知：本墙匿名发布信息，请文明用语，为保证隐私，信息发布后不能从个人页面找到，只能通过本页面搜索来找到自己曾经发布的信息</p> 
      <button id="fbtn" onclick="readed()">已阅读</button> 
      <button id="fbtn" onclick="closedtd()">今日不再弹出</button>
    </div>

    <div id="pub-box">
        <form>
          <textarea id="txtbox" name="user_secret" placeholder="在这里写下你想说的话吧"></textarea>
          <button type="button" onclick="canpub()">发布</button>
        </form>
        <button onclick="repub()">返回</button>
    </div>
    <div id="salert"><p id="sal_ct"></p></div>

    <div id="box">
      <h1>每一个相框都装着某个人“不可告人”的小秘密，点击即可偷窥~~</h1>
      <button id="btnl" onclick="window.location='index.php';">返回首页</button>
      <button id="btnl" onclick="pub()">发布秘密</button>
      <div class="searchbox">
          <form action="PHP/searchmsg.php" method="post">
            <button type="submit" >搜索</button>
            <input id="inputinfo" name="keywords" placeholder="请输入搜索关键词" required="required" oninvalid="msg_search()">
          </form>  
      </div>
      <div id="notice" class="off"></div>
      <div id="cells"></div>
      <div id="loader"><span>Loading</span></div>
    </div>
    <script type="text/template" id="template">
      <p><a href="#"><img onclick="show(this)" src="img/{{src}}.jpg" height="{{height}}" width="{{width}}" /></a></p>
    </script>
    <script src="JS/front.min.js"></script>
    <script src="JS/jqury.js"></script>
    <script src="JS/tree_h_script.js"></script>
  </body>
</html>