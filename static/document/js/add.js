$(function() {
  var bodyHeight = $(window).height() - 20;
  $(".side-right").height(bodyHeight);
  $(".side-left").height(bodyHeight);
  //浏览器改变重新设置高度
  window.onresize = function() {
    var height = $(window).height() - 20;
    $(".side-right").height($(window).height() - 20);
    $(".side-left").height(height);
  };
  var editor = CodeMirror.fromTextArea(document.getElementById("code"), {
    mode: "application/xml",
    styleActiveLine: true,
    lineNumbers: true,
    lineWrapping: true
  });
  var delay;
  editor.on("change", function() {
    clearTimeout(delay);
    delay = setTimeout(updatePreview, 30);
  });
  function updatePreview() {
    var previewFrame = document.getElementById('preview');
    var preview = previewFrame.contentDocument || previewFrame.contentWindow.document;
    preview.open();
    preview.write('<link href="/stylesheets/style.css" rel="stylesheet"><link href="/stylesheets/markdown.css" rel="stylesheet">');   
    preview.write(marked(editor.getValue()));
    preview.close();
  }
  setTimeout(updatePreview, 300);
  $("#project_id").change(function() {
    var t_sel = $(this);
    $.ajax({
      url: "/add/sel_cate",
      type: "POST",
      dataType: "json",
      data: {
        project_id: $(this).val()
      }
    }).done(function(data) {
      var sel = document.createElement("select");
      sel.setAttribute("name", "category_id");
      for (var i = 0; i < data.category.length; i++) {
        var op = document.createElement("option"); // 新建OPTION (op) 
        op.setAttribute("value", data.category[i].id); // 设置OPTION的 VALUE 
        op.appendChild(document.createTextNode(data.category[i].name)); // 设置OPTION的 TEXT
        sel.appendChild(op);
      };
      $("#cate_box").html(sel);
    }).fail(function(jqXHR, textStatus) {
      console.error("Request failed: " + textStatus);
    }).always(function() {
      console.log("complete");
    });
  });
})