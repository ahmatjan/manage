$(document).ready(function() {
  $('.show-code-form').click(function() {
    var type = $(this).attr('data-type');
    $(".coding-box").append($('#tpl-code-form').html());
    $('.add-code-form input[name="code_type"]').val(type);
  });

  $(document).on("click", ".add-code-form .submit", function() {
    var title = $('.add-code-form input[name="code_title"]').val();
    var content = $('.add-code-form textarea[name="code_content"]').val();
    var type = $('.add-code-form input[name="code_type"]').val();
    if (!title || !content || !type)
      return;

    $.ajax({
      type: "POST",
      url: "./add.php",
      data: {
        title: title,
        content: content,
        type: type,
        category: 'code'
      },
      success: function() {
        console.log('提交成功');
      }
    });
  });

  $(document).on("click", ".add-code-form .cancel", function() {
    $('.add-code-form').remove();
  });



  $('#show-module-form').click(function() {
    $('.add-module-form').show();
  });

  $(document).on("click", ".add-module-form .cancel", function() {
    $('.add-module-form').remove();
  });

  /**
   *代码高亮实例化
   */
  var editorHtml, editorCss, editorJs;
  void
  function mirrorInstantiate() {
    editorHtml = CodeMirror.fromTextArea(document.getElementById("module-html"), {
      mode: "application/xml",
      styleActiveLine: true,
      lineNumbers: true,
      lineWrapping: true
    });

    editorHtml.setSize('300px', '200px');
    var delayHtml;
    editorHtml.on("change", function() {
      clearTimeout(delayHtml);
      delayHtml = setTimeout(updatePreview(editorHtml.getValue(), 'html'), 30);
    });

    editorCss = CodeMirror.fromTextArea(document.getElementById("module-css"), {
      mode: "application/xml",
      styleActiveLine: true,
      lineNumbers: true,
      lineWrapping: true
    });
    editorCss.setSize('300px', '200px');
    var delayCss;
    editorCss.on("change", function() {
      clearTimeout(delayCss);
      delayCss = setTimeout(updatePreview(editorCss.getValue(), 'css'), 30);
    });

    editorJs = CodeMirror.fromTextArea(document.getElementById("module-js"), {
      mode: "application/xml",
      styleActiveLine: true,
      lineNumbers: true,
      lineWrapping: true
    });
    editorJs.setSize('600px', '200px');
    var delayJs;
    editorJs.on("blur", function() {
      clearTimeout(delayJs);
      delayJs = setTimeout(updatePreview(editorJs.getValue(), 'js'), 30);
    });
  }();


  var Load = new LoadElement(getIframe());

  /*载入jquery文件*/
  Load.loadScriptFile('../../static/js/jquery.min.js', 'code-js');

  function updatePreview(content, style) {
    var preview = getIframe();
    if (style == 'css') {
      Load.insertStyleCode(content);
    } else if (style == 'js') {
      //先保存文件，再引入
      $.ajax({
        type: "POST",
        url: "./add.php",
        data: {
          action: "tempSaveFile",
          content: content
        },
        success: function(data) {
          //已经存在则先删除
          if (preview.getElementById('code-js')) {
            $(preview).find('#code-js').remove();
          }
          Load.loadScriptFile(data, 'code-js');
        }
      });
    } else { //html
      preview.getElementsByTagName("body")[0].innerHTML = content;
    }
  }

  function getIframe() {
    var previewFrame = document.getElementById('preview');
    return preview = previewFrame.contentDocument || previewFrame.contentWindow.document;
  }


  /*
   *code生产文件存在，保存module
   */
  $('.to-code-save').click(function() {
    var title = $('.add-module-form input[name="module_title"]').val();
    var content = $('.add-module-form textarea[name="module_content"]').val();
    $.ajax({
      type: "POST",
      url: "./add.php",
      data: {
        title: title,
        content: content,
        htmlCode: editorHtml.getValue(),
        cssCode: editorCss.getValue(),
        jsCode: editorJs.getValue(),
        action: 'toModuleSave'
      },
      success: function() {
        console.log('提交成功');
      }
    });

  });


})