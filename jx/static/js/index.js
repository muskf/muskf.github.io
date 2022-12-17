var url = new URL(window.location.href);
var wd = url.searchParams.get("q");

function index(index) {
  $("#nav").hide();
  $("#player").hide();
  $("#list").hide();
  $(".tab_content").addClass("margin-0");
  $(".wrapper_tabcontent").addClass("padding-0");
  $.ajax({
    type: "get",
    url: "./index.php?mode=list",
    data: "do=index&index=" + index,
    async: true,
    beforeSend: function(XMLHttpRequest) {
      var winNode = $("#loading");
      winNode.fadeIn("slow");
    },
    success: function(data) {
      if (null != data && "" != data) {
        var Node = $("#loading");
        Node.hide();
        $("#list").html(data);
        $("#list").slideDown();
      } else {
        layer.alert("无结果,请切换其他资源！",{icon:5});
      }
    },
    error: function(a) {
      layer.alert("失败，请检查关键字。",{icon:2});
    }
  })
}


function from(id) {
  $("#list").hide();
  $.ajax({
    type: "get",
    url: "./index.php?mode=list",
    data: "do=get&q=" + wd + "&p=" + id,
     dataType:"json",
    async: true,
    beforeSend: function(XMLHttpRequest) {
      var winNode = $("#loading");
      winNode.fadeIn("slow");
    },
    success: function(data) {
      if (null != data.a && "" != data.a) {
       var Node = $("#loading");  
                    Node.hide();
                var obj=data.a;
                var x='';
                $.each(obj, function (n, value) {
                    var trs = "";
                    trs += "<div class='box'><div class='movie_img'><a href='" + value.link + "' title='" + value.name + "'><img src='" + value.img + "' lazy='loaded' /><span class='title'>" + value.name + "</span></a></div></div>"                   
                    x += trs;
                });            
                $("#list").html(x);
                $("#list").slideDown();  
      } else {
        layer.alert('没有资源哦，请修改关键字或切换来源试试！',{icon:5});
      }
    },
    error: function(a) {
      layer.alert("失败，请检查关键字。",{icon:2});
    }
  })
}


function fromall(id) {
  $("#list").hide();
  $.ajax({
    type: "get",
    url: "./index.php?mode=list",
    data: "do=get&q=" + wd + "&p=0",
    dataType:"json",
    async: true,
    beforeSend: function(XMLHttpRequest) {
      var winNode = $("#loading");
      winNode.fadeIn("slow");
    },
    success: function(data) {
      if (null != data.a && "" != data.a) {
        var Node = $("#loading");  
            Node.hide();
        var obj=data.a;
        var x='';
        $.each(obj, function (n, value) {
            var trs = "";
            trs += "<div class='box'><div class='movie_img'><a href='" + value.link + "' title='" + value.name + "'><img src='" + value.img + "' lazy='loaded' /><span class='title'>" + value.name + "</span></a></div></div>"
            x += trs;
        }); 
        $("#list").html(x);
        $("#list").slideDown();  
      } else {
        layer.alert('没有资源哦，请修改关键字或切换来源试试！',{icon:5});
      }
    },
    error: function(a) {
      layer.alert("失败，请检查关键字。",{icon:2});
    }
  })
}

function star(lx, page) {
  $("#list").hide();
  $("#more").hide();
  $.ajax({
    type: "get",
    url: "./index.php?mode=list",
    data: "sostar=do&q=" + wd + "&lx=" + lx + "&pageno=" + page,
    dataType: "json",
    beforeSend: function(XMLHttpRequest) {
      var winNode = $("#loading");
      winNode.fadeIn("slow");
    },
    success: function(data) {
      var Node = $("#loading");
      Node.hide();
      var obj = data.a;
      var x = '';
      $.each(obj, function(n, value) {
        var trs = "";
        trs += "<div class='box'><div class='movie_img'><a href='" + value.link + "' title='" + value.name + "'><img src='" + value.img + "' lazy='loaded' /><span class='title'>" + value.name + "</span></a></div></div>"
        x += trs;
      });
      $("#list").html(x);
      $("#list").slideDown();
      $("#more").html(data.c);
      $("#more").slideDown();
    },
    error: function(a) {
      layer.alert("失败，请检查关键字。",{icon:2});
    }

  })
}

function play(id, p, io) {

  $("#list").hide();
  $.ajax({
    type: "get",
    url: "./index.php?mode=api",
    dataType: "json",
    data: "do=play&v=" + id + "&p=" + p,
    async: true,
    beforeSend: function(XMLHttpRequest) {
      var winNode = $("#loading");
      winNode.fadeIn("slow");
    },
    success: function(res) {
      if (res.status == 200) {
        res = res.res;
        var res1 = "";
        var Node = $("#loading");
        Node.hide();
        for (i in res) {
          if (io == 'out') {
            res1 = res1 + '<li class="play"><a target="_blank" href="./index.php?mode=play&url=' + res[i] + '" title="' + i + '"><span>' + i + '</span></a></li>';
          } else {
            res1 = res1 + '<li class="play"><a href="javascript:player(\'' + res[i] + '\')" title="' + i + '"><span>' + i + '</span></a></li>';
          }
        }

        $("#list").html(
        res1);
        $("#list").slideDown();
      } else {
        layer.alert(res.res);
      }
    },
    error: function(a) {
      layer.alert("失败，请检查关键字。",{icon:2});
    }
  })
}

function playall(data, io) {

  $("#list").hide();
  $.ajax({
    type: "get",
    url: "./index.php?mode=api",
    dataType: "json",
    data: "do=playall&v=" + data,
    async: true,
    beforeSend: function(XMLHttpRequest) {
      var winNode = $("#loading");
      winNode.fadeIn("slow");
    },
    success: function(res) {
      if (res.status == 200) {
        res = res.res;
        var res1 = "";
        var Node = $("#loading");
        var More = $("#more");
        Node.hide();
        More.hide();
        for (i in res) {
          if (io == 'out') {
            res1 = res1 + '<div class="play"><a target="_blank" href="./index.php?mode=play&url=' + res[i] + '" title="' + i + '"><span>' + i + '</span></a></div>';
          } else {
            res1 = res1 + '<div class="play"><a href="javascript:player(\'' + res[i] + '\')" title="' + i + '"><span>' + i + '</span></a></div>';
          }
        }

        $("#list").html(
        res1);
        $("#list").slideDown();
      } else {
        layer.alert(res.res,{icon:2});
      }
    },
    error: function(a) {
      layer.alert("失败，请检查关键字。",{icon:2});
    }
  })
}

function player(data) {
  $.ajax({
    type: "get",
    url: "./index.php?mode=api",
    data: "do=player&v=" + data,
    async: true,

    success: function(res) {
      var Node = $("#loading");
      var title = $("#title");
      var nav = $("#nav");
      var playad = $("#playad");
      Node.hide();
      title.hide();
      nav.hide();
      playad.show();
      $("#player").html(res);
      $("#player").slideDown();
    },
  })
}