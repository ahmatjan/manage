/**
 * @Tools 工具组件
 * @author yangxiaoxu
 * @email lihuazhai_com@163.com
 * @website www.lihuazhai.com
 * @date 2015-02-03
 */
(function(mod) {
	if (typeof exports == "object" && typeof module == "object") // CommonJS
		module.exports = mod();
	else if (typeof define == "function" && define.amd) // AMD
		return define([], mod);
	else // Plain browser env
		this.Tools = mod();
})(function() {
	"use strict";
	/**
	 * Table-show对象
	 * @class Table
	 * @constructor
	 * @param {json} ajax成功的返回数据
	 * @return {String} 返回HTML的字符串
	 */
	function Tools() {
		this.init();
	}
	Tools.prototype = {
		init: function() {

		},
		/**
		 * 获取Url参数
		 *
		 * @method creatTb
		 * @return {String} 参数对象
		 */
		getRequest: function() {
			var url = location.search; //获取url中"?"符后的字串
			var theRequest = new Object();
			if (url.indexOf("?") != -1) {
				var str = url.substr(1);
				var strs = str.split("&");
				for (var i = 0; i < strs.length; i++) {
					theRequest[strs[i].split("=")[0]] = unescape(strs[i].split("=")[1]);
				}
			}
			return theRequest;
		},
		destroy: function() {
			//TODO
		}
	};
	Tools.version = "1.0.0";
	return Tools;
});