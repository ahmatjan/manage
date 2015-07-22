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

   /**
   *跟新显示效果
   */
  function updatePreview(iframeId,value) {
    var previewFrame = document.getElementById(iframeId);
    var preview = previewFrame.contentDocument || previewFrame.contentWindow.document;
    preview.open();
    preview.write('<link href="/manage/static/css/markdown.css" rel="stylesheet">');
    preview.write(marked(value.getValue()));
    preview.close();
  }

  var editor = CodeMirror.fromTextArea(document.getElementById("content"), {
    mode: "application/xml",
    styleActiveLine: true,
    lineNumbers: true,
    lineWrapping: true
  });

  var editor_answer = CodeMirror.fromTextArea(document.getElementById("answer"), {
    mode: "application/xml",
    styleActiveLine: true,
    lineNumbers: true,
    lineWrapping: true
  });

  var delay;
  editor.on("change", function() {
    clearTimeout(delay);
    delay = setTimeout(updatePreview("preview",editor), 30);
  });
  setTimeout(updatePreview("preview",editor), 300);

  var delay_answer;
  editor_answer.on("change", function() {
    clearTimeout(editor_answer);
    delay_answer = setTimeout(updatePreview("preview_answer",editor_answer), 30);
  });
  setTimeout(updatePreview("preview_answer",editor_answer), 300);

})