/*!
 * http://www.lihuazhai.com
 * description:页面动态载入css、js文件;动态插入css代码，支持iframe,支持联系插入
 * author：杨小旭
 * eamil：lihuazhai_com@163.com
 * Date: 2015-7-16
 */
(function(mod) {
    if (typeof exports == "object" && typeof module == "object") // CommonJS
        module.exports = mod();
    else if (typeof define == "function" && define.amd) // AMD
        return define([], mod);
    else // Plain browser env
        this.LoadElement = mod();
})(function() {
    "use strict";

    function LoadElement(doc) {
        this.doc = doc || document;
    }
    /*动态插入css文件*/
    LoadElement.prototype.loadSheetFile = function(path) {
        var fileref = this.doc.createElement("link")
        fileref.rel = "stylesheet";
        fileref.type = "text/css";
        fileref.href = path;
        var headobj = this.doc.getElementsByTagName('head')[0];
        headobj.appendChild(fileref);
    }

    /*动态载入js文件*/
    LoadElement.prototype.loadScriptFile = function(filePath, id) {
        var script = this.doc.createElement("script");
        script.setAttribute("type", "text/javascript");
        script.setAttribute("src", filePath);
        script.setAttribute("id", id);
        var heads = this.doc.getElementsByTagName("head");
        if (heads.length)
            heads[0].appendChild(script);
        else
            this.doc.documentElement.appendChild(script);
    }

    /*动态插入css代码段*/
    LoadElement.prototype.insertStyleCode = function(cssString) {
        // var doc, cssString;
        // if (arguments.length == 1) {
        //     doc = document;
        //     cssString = arguments[0]
        // } else if (arguments.length == 2) {
        //     doc = arguments[0];
        //     cssString = arguments[1];
        // } else {
        //     alert("addSheet函数最多接受两个参数!");
        // }

        var headElement = this.doc.getElementsByTagName("head")[0];
        var styleElements = headElement.getElementsByTagName("style");
        if (styleElements.length == 0) { //如果不存在style元素则创建 
            if (this.doc.createStyleSheet) { //ie 
                this.doc.createStyleSheet();
            } else {
                var tempStyleElement = this.doc.createElement('style'); //w3c 
                tempStyleElement.setAttribute("type", "text/css");
                headElement.appendChild(tempStyleElement);
            }
        }
        var styleElement = styleElements[0];

        if (styleElement.styleSheet) { //IE 
            styleElement.styleSheet.cssText = cssString;
            //追加
            //styleElement.styleSheet.cssText+=cssString;
        } else if (this.doc.getBoxObjectFor) { //火狐
            styleElement.innerHTML = cssString; //火狐支持直接innerHTML添加样式表字串 
            //追加
            //styleElement.innerHTML+=cssString;//火狐支持直接innerHTML添加样式表字串 
        } else { // w3c 
            styleElement.innerHTML = cssString;
            //var cssText = doc.createTextNode(cssString);
            //style.appendChild(cssText);
        }
    }

    // THE END
    LoadElement.version = "1.0.0";
    return LoadElement;
});