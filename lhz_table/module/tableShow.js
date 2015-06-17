/**
 * @TableShow 表单验证组件
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
		this.TableShow = mod();
})(function() {
	"use strict";
	/**
	 * Table-show对象
	 * @class Table
	 * @constructor
	 * @param {json} ajax成功的返回数据
	 * @return {String} 返回HTML的字符串
	 */
	function TableShow(configObj) {
		this.tbSelector = configObj.tbSelector;
		this.opts = configObj.opts;
		this.table = configObj.obj;
		this.getDataUrl = configObj.opts.getDataUrl;
		this.theadDate = configObj.opts.getTheadDate;
		this.tbodyDate = this.getData();

		this.init();
	}
	TableShow.prototype = {
		init: function() {
			this.table.html(this.creatTb());
			this.table.find('thead').html(this.creatThead());
			this.table.find('tbody').html(this.creatTbody());
		},
		/**
		 * 生成tb框架代码
		 *
		 * @method creatTb
		 * @return {String} 返回HTML的字符串
		 */
		creatTb: function() {
			var tbDom = $('<table class="' + this.tbSelector + '"></table>');
			tbDom.append('<thead><tr><td>载入中</td><td>。。。</td></tr></thead>');
			tbDom.append('<tbody><tr><td>载入中</td><td>。。。</td></tr></tbody>');
			return tbDom;
		},
		/**
		 * 获取数据
		 *
		 * @method getData
		 * @return {json} 数据json格式
		 */
		getData: function() {
			var retData;
			var url = this.getDataUrl;
			$.ajax({
				dataType: "json",
				async: false,
				url: url,
				success: function(data) {
					retData = data;
				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					console.log(XMLHttpRequest);
					console.log(textStatus);
					console.log(errorThrown);
				}
			});
			return retData;
		},
		/**
		 * 根据获取的数据生成表头,
		 *
		 * @method creatThead
		 * @param {json} ajax成功的返回数据
		 * @return {String} 返回HTML的字符串
		 */
		creatThead: function() {
			var data = this.theadDate;
			var thead = [];
			if (data.length > 0) {
				thead.push("<tr>");
				$.each(data, function(index, item) {
					thead.push("<td id='" + item.field + "' ifCanEdit='" + item.ifCanEdit + "'>" + item.name + "</td>");
				});

				//回调加操作列表头
				if(typeof this.opts.callbackOperation == 'function'){
					thead.push(this.opts.callbackOperation('thead'));
				}
				thead.push("</tr>");
			} else {
				thead.push('<tr>', '<td>暂无数据</td>', '</tr>');
			}
			return thead.join("");
		},
		/**
		 * 根据获取的数据生成表格内容,
		 *
		 * @method creatTbody
		 * @param {json} ajax成功的返回数据
		 * @return {String} 返回HTML的字符串
		 * @description 跟进theadDate顺序，循环出tbodydata
		 */
		creatTbody: function() {
			var theadData = this.theadDate;
			var tbodyObj = this.tbodyDate;
			var t_this = this;
			var tbody = [];
			if (tbodyObj.length > 0) {
				$.each(tbodyObj, function(index, item) {
					var id = item.data.id;
					tbody.push('<tr data-rowId="' + item.data.id + '">');
					var tbodyData = item.data;
					$.each(theadData, function(index, item) {
						var key = item.field;
						var ifCanEdit = item.ifCanEdit;
						var tdObj = tbodyData[key];
						if (tdObj != null) {
							if (typeof tdObj == 'string') {
								tbody.push('<td data-field="' + key + '" data-type="text"  ifCanEdit="' + ifCanEdit + '">' + tdObj + '</td>');
							} else {
								tbody.push(t_this.showtd(key, tdObj, ifCanEdit));
							}﻿
						} else {
							tbody.push('<td data-field="' + key + '" data-type="text" ifCanEdit="' + ifCanEdit + '">null</td>');
						}
					});

					//回调加操作列	
					if(typeof t_this.opts.callbackOperation == 'function'){
						tbody.push(t_this.opts.callbackOperation('tbody',id));
					}
					tbody.push("</tr>");
				});
			} else {
				tbody.push('<tr>', '<td>暂无数据</td>', '</tr>');
			}
			return tbody.join("");
		},
		/**
		 * 处理不同数据格式显示
		 *
		 * @method showtd
		 * @param {String} 数据的字段名
		 * @param {json} ajax成功的返回数据
		 * @return {String} 返回HTML的字符串
		 */
		showtd: function(key, obj,ifCanEdit) {
			var type = obj.type;
			var value = obj.value;
			var tdHtml = '';
			switch (type) {
				case 'link':
					tdHtml = '<td data-field="' + key + '" data-type="link" ifCanEdit="' + ifCanEdit + '"><a href="' + obj.url + '">' + value + '</a></td>';
					break;
				case 'select':
					tdHtml = '<td data-field="' + key + '" data-type="select" ifCanEdit="' + ifCanEdit + '">' + obj.name + '</td>';
					break;
				case 'percent':
					tdHtml = '<td data-field="' + key + '" data-type="percent" ifCanEdit="' + ifCanEdit + '" data-value="' + value + '%"><div class="percent-box"><div class="percent-inner" style="width:' + value + '%;"></div></div></td>';
					break;
				default:
					tdHtml = '<td data-field="' + key + '" ifCanEdit="' + ifCanEdit + '">' + obj.name + '</td>';
			}
			return tdHtml;
		},
		refresh: function(ifSearch) {
			var ifSearch = arguments[0] ? arguments[0] : false;
			if (!ifSearch) {
				/*获取最新数据*/
				this.tbodyDate = this.getData();
			}
			this.table.find('tbody').html(this.creatTbody());
		},
		destroy: function() {
			//TODO
		}
	};
	TableShow.version = "1.0.0";
	return TableShow;
});