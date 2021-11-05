void function(window, document, undefined) {
  "user strict";
  var MIN_COLUMN_COUNT = 2; // minimal column count
  var COLUMN_WIDTH = 152.5;   // cell width: 190, padding: 14 * 2, border: 1 * 2
  var CELL_PADDING = 26;    // cell padding: 14 + 10, border: 1 * 2
  var GAP_HEIGHT = 5;      // vertical gap between cells
  var GAP_WIDTH = 5;       // horizontal gap between cells
  var THRESHOLD = 2000;     // determines whether a cell is too far away from viewport (px)

  var columnHeights;        // array of every column's height
  var columnCount;          // number of columns
  var noticeDelay;          // popup notice timer
  var resizeDelay;          // resize throttle timer
  var scrollDelay;          // scroll throttle timer
  var managing = false;     // flag for managing cells state
  var loading = false;      // flag for loading cells state

  var noticeContainer = document.getElementById('notice');
  var cellsContainer = document.getElementById('cells');
  var cellTemplate = document.getElementById('template').innerHTML;

  // Cross-browser compatible event handler.
  var addEvent = function(element, type, handler) {
    if(element.addEventListener) {
      addEvent = function(element, type, handler) {
        element.addEventListener(type, handler, false);
      };
    } else if(element.attachEvent) {
      addEvent = function(element, type, handler) {
        element.attachEvent('on' + type, handler);
      };
    } else {
      addEvent = function(element, type, handler) {
        element['on' + type] = handler;
      };
    }
    addEvent(element, type, handler);
  };

  // Get the minimal value within an array of numbers.
  var getMinVal = function(arr) {
    return Math.min.apply(Math, arr);
  };

  // Get the maximal value within an array of numbers.
  var getMaxVal = function(arr) {
    return Math.max.apply(Math, arr);
  };

  // Get index of the minimal value within an array of numbers.
  var getMinKey = function(arr) {
    var key = 0;
    var min = arr[0];
    for(var i = 1, len = arr.length; i < len; i++) {
      if(arr[i] < min) {
        key = i;
        min = arr[i];
      }
    }
    return key;
  };

  // Get index of the maximal value within an array of numbers.
  var getMaxKey = function(arr) {
    var key = 0;
    var max = arr[0];
    for(var i = 1, len = arr.length; i < len; i++) {
      if(arr[i] > max) {
        key = i;
        max = arr[i];
      }
    }
    return key;
  };

  // Pop notice tag after user liked or marked an item.
  var updateNotice = function(event) {
    clearTimeout(noticeDelay);
    var e = event || window.event;
    var target = e.target || e.srcElement;
    if(target.tagName == 'SPAN') {
      var targetTitle = target.parentNode.tagLine;
      noticeContainer.innerHTML = (target.className == 'like' ? 'Liked ' : 'Marked ') + '<strong>' + targetTitle + '</strong>';
      noticeContainer.className = 'on';
      noticeDelay = setTimeout(function() {
        noticeContainer.className = 'off';
      }, 2000);
    }
  };

  // Calculate column count from current page width.
  var getColumnCount = function() {
    return Math.max(MIN_COLUMN_COUNT, Math.floor((document.body.offsetWidth + GAP_WIDTH) / (COLUMN_WIDTH + GAP_WIDTH)));
//		return MIN_COLUMN_COUNT
  };

  // Reset array of column heights and container width.
  var resetHeights = function(count) {
    columnHeights = [];
    for(var i = 0; i < count; i++) {
      columnHeights.push(0);
    }
    console.log(count)
    cellsContainer.style.width = (count * (COLUMN_WIDTH + GAP_WIDTH)-GAP_WIDTH) + 'px';
  };

  // Fetch JSON string via Ajax, parse to HTML and append to the container.
  var appendCells = function(num) {
    if(loading) {
      // Avoid sending too many requests to get new cells.
      return;
    }
    var xhrRequest = new XMLHttpRequest();
    var fragment = document.createDocumentFragment();
    var cells = [];
    var images;
    xhrRequest.open('GET', 'json.php?n=' + num, true);
    xhrRequest.onreadystatechange = function() {
      if(xhrRequest.readyState == 4 && xhrRequest.status == 200) {
        images = JSON.parse(xhrRequest.responseText);
        for(var j = 0, k = images.length; j < k; j++) {
          var cell = document.createElement('div');
          cell.className = 'cell pending';
          cell.tagLine = images[j].title;
          cells.push(cell);
          console.log(images[j])
          front(cellTemplate, images[j], cell);
          fragment.appendChild(cell);
        }
        cellsContainer.appendChild(fragment);
        loading = false;
        adjustCells(cells);
      }
    };
    loading = true;
    xhrRequest.send(null);
  };

  // Fake mode, only for GitHub demo. Delete this function in your project.
  var appendCellsDemo = function(num) {
    if(loading) {
      // Avoid sending too many requests to get new cells.
      return;
    }
    var fragment = document.createDocumentFragment();
    var cells = [];
    var images = [0, 286, 143, 270, 143, 190, 285, 152, 275, 285, 285, 128, 281, 242, 339, 236, 157, 286, 259, 267, 137, 253, 127, 190, 190, 225, 269, 264, 272, 126, 265, 287, 269, 125, 285, 190, 314, 141, 119, 274, 274, 285, 126, 279, 143, 266, 279, 600, 276, 285, 182, 143, 287, 126, 190, 285, 143, 241, 166, 240, 190];
    for(var j = 0; j < 10; j++) {
    	console.log(key)
      var key = Math.floor(Math.random() * 50) + 1;    //*图片数量
      var cell = document.createElement('div');
      cell.className = 'cell pending';
      cell.tagLine = 'demo picture ' + key;
      cells.push(cell);
      front(cellTemplate, { 'title': 'demo picture ' + key, 'src': key, 'height': "auto", 'width': 122.5 }, cell);
      fragment.appendChild(cell);
    }
    // Faking network latency.
    setTimeout(function() {
      loading = false;
      cellsContainer.appendChild(fragment);
      adjustCells(cells);
    }, 1000);
  };

  // Position the newly appended cells and update array of column heights.
  var adjustCells = function(cells, reflow) {
    var columnIndex;
    var columnHeight;
    for(var j = 0, k = cells.length; j < k; j++) {
      // Place the cell to column with the minimal height.
      columnIndex = getMinKey(columnHeights);
      columnHeight = columnHeights[columnIndex];
      cells[j].style.height = (cells[j].offsetHeight - CELL_PADDING) + 'px';
      cells[j].style.left = columnIndex * (COLUMN_WIDTH + GAP_WIDTH) + 'px';
      cells[j].style.top = columnHeight + 'px';
      columnHeights[columnIndex] = columnHeight + GAP_HEIGHT + cells[j].offsetHeight;
      if(!reflow) {
        cells[j].className = 'cell ready';
      }
    }
    cellsContainer.style.height = getMaxVal(columnHeights) + 'px';
    manageCells();
  };

  // Calculate new column data if it's necessary after resize.
  var reflowCells = function() {
    // Calculate new column count after resize.
    columnCount = getColumnCount();
    if(columnHeights.length != columnCount) {
      // Reset array of column heights and container width.
      resetHeights(columnCount);
      adjustCells(cellsContainer.children, true);
    } else {
      manageCells();
    }
  };

  // Toggle old cells' contents from the DOM depending on their offset from the viewport, save memory.
  // Load and append new cells if there's space in viewport for a cell.
  var manageCells = function() {
    // Lock managing state to avoid another async call. See {Function} delayedScroll.
    managing = true;

    var cells = cellsContainer.children;
    var viewportTop = (document.body.scrollTop || document.documentElement.scrollTop) - cellsContainer.offsetTop;
    var viewportBottom = (window.innerHeight || document.documentElement.clientHeight) + viewportTop;

    // Remove cells' contents if they are too far away from the viewport. Get them back if they are near.
    // TODO: remove the cells from DOM should be better :<
    for(var i = 0, l = cells.length; i < l; i++) {
      if((cells[i].offsetTop - viewportBottom > THRESHOLD) || (viewportTop - cells[i].offsetTop - cells[i].offsetHeight > THRESHOLD)) {
        if(cells[i].className === 'cell ready') {
          cells[i].fragment = cells[i].innerHTML;
          cells[i].innerHTML = '';
          cells[i].className = 'cell shadow';
        }
      } else {
        if(cells[i].className === 'cell shadow') {
          cells[i].innerHTML = cells[i].fragment;
          cells[i].className = 'cell ready';
        }
      }
    }

    // If there's space in viewport for a cell, request new cells.
    if(viewportBottom > getMinVal(columnHeights)) {
      // Remove the if/else statement in your project, just call the appendCells function.
      if(1) {
        appendCellsDemo(columnCount);
      } else {
        appendCells(columnCount);
      }
    }

    // Unlock managing state.
    managing = false;
  };

  // Add 500ms throttle to window scroll.
  var delayedScroll = function() {
    clearTimeout(scrollDelay);
    if(!managing) {
      // Avoid managing cells for unnecessity.
      scrollDelay = setTimeout(manageCells, 500);
    }
  };

  // Add 500ms throttle to window resize.
  var delayedResize = function() {
    clearTimeout(resizeDelay);
    resizeDelay = setTimeout(reflowCells, 500);
  };

  // Initialize the layout.
  var init = function() {
    // Add other event listeners.
    addEvent(cellsContainer, 'click', updateNotice);
    addEvent(window, 'resize', delayedResize);
    addEvent(window, 'scroll', delayedScroll);

    // Initialize array of column heights and container width.
    columnCount = getColumnCount();
    resetHeights(columnCount);

    // Load cells for the first time.
    manageCells();
  };

  // Ready to go!
  addEvent(window, 'load', init);

}(window, document);

function show(obj){
  var y=document.getElementsByClassName("cell");
  for(var i=0;i<y.length;i++){
    y[i].style.transition = '8s';
    if(i%2==0){
      y[i].style.transform='translate(1000vh,0)';
    }
    else{
      y[i].style.transform='translate(-1000vh,0)';
    }
  }
  setTimeout(function(){window.location="PHP/showmsg.php";}, 1500);
  
}
function hid(){
  window.location="./SecretWall.html";
}
function ntc(){
    var x=document.getElementById("fread");
    x.style.zIndex = '999';
    x.style.top = '0';
    x.style.position ='fixed';
}
function readed(){
  var x=document.getElementById("fread");
  x.style.top = '-350vh';
  x.style.position = 'absolute';
  x.style.zIndex = '0';
  setTimeout(function(){var obj=document.getElementById('fread');obj.style.display = 'none';}, 1500);
}
function closedtd(){
  readed();
  $.ajax({
    type: "POST",
    url: "PHP/universal.php",
    // data: "user_secret="+info,
    data: {"firstcome":"false"},
    // dataType: "json",
    dataType: "text",
    success: function(msg){
      
    },
    error:function(obj){
      alert('出现未知错误，请稍后再来，或联系网站管理员');
    }
    });
}
function pub(){
  var t=document.getElementById("pub-box");
  t.style.left = '18%';
  t.style.zIndex = '999';
  var disp=document.getElementById('box');
  disp.style.zIndex = '0';
  disp.style.opacity = '0.1';
  var bck=document.body;
  bck.style.backgroundImage = 'url(images/msgbox.jpg)';
  bck.style.backgroundSize = '100% 100%';
}
function repub(){
  var t=document.getElementById("pub-box");
  t.style.left = '-500vh';
  var disp=document.getElementById('box');
  disp.style.zIndex = '999';
  disp.style.opacity = '1';
}

function sfalert(str){
  var al=document.getElementById('sal_ct');
  al.innerHTML= str;
  var appear=document.getElementById('salert');
  appear.style.display = 'block';
  setTimeout(function(){appear.style.display = 'none';}, 1500);
}

function canpub(){
  repub();
  var info=document.getElementById('txtbox').value;
  if(info==""){
    sfalert('请输入回复内容');
    return 0;
  }
  $.ajax({
  type: "POST",
  url: "PHP/upmsg.php",
  data: "user_secret="+info,
  // data: {"user_secret":"info"},
  // dataType: "json",
  dataType: "text",
  success: function(msg){
    sfalert(msg);    
  },
  error:function(obj){
    alert('未知上传错误，请稍后再试');
  }

  });

}

function msg_search(){
  var info=document.getElementById('inputinfo').value;
  if(info==""){
    sfalert("请输入关键词");
  }
  // else{
  //   $.ajax({
  //   type: "POST",
  //   url: "PHP/searchmsg.php",
  //   data: {"keywords":info},
  //   dataType: "text",
  //   success: function(msg){
  //       window.location='PHP/searchmsg.php';
  //   },
  //   error:function(obj){
  //     alert('未知上传错误，请稍后再试');
  //   }

  //   });
  // }
}