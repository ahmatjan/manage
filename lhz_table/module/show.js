/**
 * @validator 表单验证组件
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
		this.Validator = mod();
})(function() {
	"use strict";
	/**
	 * Table对象
	 *
	 * @class Table
	 * @constructor
	 * @param {json} ajax成功的返回数据
	 * @return {String} 返回HTML的字符串
	 */
	function Table(obj, opts) {
		var self = this;
		this.obj = obj;
		this.opts = opts;
		this.init = function() {
			obj.html(this.creatTb());
			this.data = this.getData()
			obj.find('thead').html(this.creatThead());
			obj.find('tbody').html(this.creatTbody());
		};
		this.refresh = function() {
			obj.find('tbody').html(this.creatTbody());
		};
		$.extend(self, {})
		self.init();
		return self;
	}
	Table.prototype = {
		creatTb: creatTb,
		creatThead: creatThead,
		creatTbody: creatTbody,
		getData: getData,
		destroy: destroy
	};
	/**
	 * 生成tb框架代码
	 *
	 * @method creatTb
	 * @return {String} 返回HTML的字符串
	 */
	function creatTb() {
			var tbDom = $('<table class="lhz_tb"></table>');
			tbDom.append('<thead><tr><td>载入中</td><td>。。。</td></tr></thead>');
			tbDom.append('<tbody><tr><td>载入中</td><td>。。。</td></tr></tbody>');
			return tbDom;
		}
		/**
		 * 根据获取的数据生成表格标题。
		 *
		 * @method creatThead
		 * @param {json} ajax成功的返回数据
		 * @return {String} 返回HTML的字符串
		 */
	function creatThead() {
			var data = this.data.thead;
			var thead = [];
			if (data) {
				thead.push("<tr>");
				$.each(data, function(key, val) {
					thead.push("<td id='" + key + "'>" + val + "</td>");
				});
				thead.push("</tr>");
			} else {
				thead.push('<tr>', '<td>暂无数据</td>', '</tr>');
			}
			return thead.join("");
		}
		/**
		 * 根据获取的数据生成表格内容,
		 *
		 * @method creatTbody
		 * @param {json} ajax成功的返回数据
		 * @return {String} 返回HTML的字符串
		 */
	function creatTbody() {
			var data = this.data.tbody;
			var tbody = [];
			if (data.length > 0) {
				$.each(data, function(index, item) {
					tbody.push('<tr data-rowId="' + item.data.id + '">');
					$.each(item.data, function(key, val) {
						if (typeof val == 'string') {
							tbody.push('<td data-field="' + key + '" data-type="text">' + val + '</td>');
						} else {
							tbody.push(showtd(key, val));
						}
					});
					tbody.push("</tr>");
				});
			} else {
				tbody.push('<tr>', '<td>暂无数据</td>', '</tr>');
			}
			return tbody.join("");
		}
		/**
		 * 处理数据格式显示
		 *
		 * @method showtd
		 * @param {String} 数据的字段名
		 * @param {json} ajax成功的返回数据
		 * @return {String} 返回HTML的字符串
		 */
	function showtd(key, obj) {
			var type = obj.type;
			var value = obj.value;
			var tdHtml = '';
			switch (type) {
				case 'link':
					tdHtml = '<td data-field="' + key + '"><a href="' + obj.url + '">' + value + '</a></td>';
					break;
				case 'select':
					tdHtml = '<td data-field="' + key + '" data-type="select">' + value + '</td>';
					break;
				case 'percent':
					tdHtml = '<td data-field="' + key + '" data-type="percent" data-value="' + value + '%"><div class="percent-box"><div class="percent-inner" style="width:' + value + '%;"></div></div></td>';
					break;
				default:
					tdHtml = '<td data-field="' + key + '">' + value + '</td>';
			}
			return tdHtml;
		}
		/**
		 * 获取数据
		 *
		 * @method getData
		 * @return {json} 数据json格式
		 */
	function getData() {
		var retData;
		var url = this.opts.getDataUrl;
		$.ajax({
			dataType: "json",
			async: false,
			//url: './test/data/table.json',
			url: url,
			success: function(data) {
				retData = data;
			}
		});
		return retData;
	}

	function destroy() {
		console.log(666);
	}
	Validator.version = "1.0.0";
	return Validator;
});