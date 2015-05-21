/**
 * @TableFilter 表格过滤器
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
		this.TableFilter = mod();
})(function() {
	"use strict";
	/**
	 * 取String 或者 object的长度
	 **/
	function count(o) {
		var t = typeof o;
		if (t == 'string') {
			return o.length;
		} else if (t == 'object') {
			var n = 0;
			for (var i in o) {
				n++;
			}
			return n;
		}
		return false;
	};

	/**
	 * Table-show对象
	 * @class Table
	 * @constructor
	 * @param {json} ajax成功的返回数据
	 * @return {String} 返回HTML的字符串
	 */
	function TableFilter(configObj) {
		this.filterSelector = configObj.filterSelector;
		this.tableShow = configObj.tableShow;
		this.opts = configObj.opts;
		this.table = configObj.obj;
		this.getFilterUrl = configObj.opts.getFilterUrl;
		this.filterData = this.getData();
		this.condition = {
			"all": {
				"hasOption": false,
				"name": "[所有]",
				"value": "all"
			},
			"equal": {
				"hasOption": true,
				"name": "等于",
				"value": "equal"
			},
			"notequal": {
				"hasOption": true,
				"name": "不等于",
				"value": "notequal"
			},
			"include": {
				"hasOption": true,
				"name": "包含",
				"value": "include"
			},
			"lessthan": {
				"hasOption": true,
				"name": "小于 ",
				"value": "lessthan"
			},
			"morethan": {
				"hasOption": true,
				"name": "大于",
				"value": "morethan"
			},
			"lessthan_equal": {
				"hasOption": true,
				"name": "小于或等于",
				"value": "lessthan_equal"
			},
			"morethan_equal": {
				"hasOption": true,
				"name": "大于或等于",
				"value": "morethan_equal"
			},
			"none": {
				"hasOption": false,
				"name": "[未设置]",
				"value": "none"
			}
		};

		this.init();
	}
	TableFilter.prototype = {
		init: function() {
			this.table.find('.lhz-tb').before(this.creatFilterBox());
			this.table.find('.lhz-filter').html(this.creatFilter());
			var F_this = this;
			//处理url带的参数
			require(["tools"], function(Tools) {
				var tools = new Tools();
				var parameters = tools.getRequest();
				if (parameters) {
					for (var key in parameters) {
						F_this.selectedDataSave(key, parameters[key]);
					}
				}
			});
			this.bind();
		},
		/**
		 * 生成Filter框架代码
		 *
		 * @method creatFilterBox
		 * @return {String} 返回HTML的字符串
		 */
		creatFilterBox: function() {
			var tbDom = $('<div class="' + this.filterSelector + '"></div>');
			tbDom.append('<table><tr><td>载入中</td><td>。。。</td></tr></table>');
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
			var url = this.getFilterUrl;
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
		 * 根据获取的数据生成表格内容,
		 *
		 * @method creatFilter
		 * @return {String} 返回HTML的字符串
		 */
		creatFilter: function() {
			var t_this = this;
			var data = this.filterData;
			var filter = [];
			if (count(data) > 0) {
				$.each(data, function(index, item) {
					filter.push("<dl>");
					if (typeof(item) == "object") {
						filter.push("<dt id='" + item.id + "'>" + item.name + "</dt>");
						filter.push("<dd>" + t_this.showOption(item) + "</dd>");
					}
					filter.push("</dl>");
				});
			} else {
				filter.push('<tr>', '<td>暂无数据</td>', '</tr>');
			}
			return filter.join("");
		},
		/**
		 * 处理数据格式显示
		 *
		 * @method showOption
		 * @param {String} 数据的字段名
		 * @return {String} 返回HTML的字符串
		 */
		showOption: function(item) {
			var id = item.id;
			var type = item.type;
			var option = item.option;
			var tdHtml = [];
			switch (type) {
				case 'select':
					tdHtml.push("<ul class='showOption'><li id='" + i + "' style='background: red;'><a href='#' data-key='" + id + "' data-value='all'>全部</a></li>");
					for (var i = 0, l = option.length; i < l; i++) {
						tdHtml.push("<li id='" + i + "'><a href='#' data-key='" + id + "' data-value='" + option[i].value + "'>" + option[i].name + "</a></li>");
					}
					tdHtml.push("</ul>");
					break;
				case 'text':
					tdHtml.push("<input type='text' />");
					break;
				case 'date':
					tdHtml.push("<input></input>");
					break;
				default:
					tdHtml.push("<li></li>");
			}
			return tdHtml.join("");
		},
		/*
		 *给过滤器绑定事件
		 **/
		bind: function() {
			var t_this = this;
			this.table.find('.lhz-filter .showOption li a').bind("click", function() {
				var t = $(this);
				var data_key = t.attr('data-key');
				var data_value = t.attr('data-value');
				t.parent().css("background", "red").siblings().removeAttr("style");
				var needRequest = t_this.selectedDataSave(data_key, data_value);
				if (needRequest) {
					t_this.daoSearch(data_key, data_value);
				}
			});
		},
		daoSearch: function(field, value) {
			var t_this = this;
			var url = this.opts.searchDataUrl;
			var dataBox = $('.' + this.filterSelector);
			var selectData = dataBox.data('selectedData');
			console.log(selectData);
			$.ajax({
				type: "GET",
				url: url,
				data: selectData,
				dataType: "json",
				success: function(result) {
					t_this.tableShow.tbodyDate = result;
					t_this.tableShow.refresh(true);
				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					console.log("ajax error");
				}
			});
		},
		/*存储过滤器已选择的条件*/
		selectedDataSave: function(data_key, data_value) {
			var dataBox = $('.' + this.filterSelector);
			var oldData = dataBox.data('selectedData');
			if (oldData) {
				if (oldData.indexOf(data_key) != -1) {
					var match = new RegExp(data_key + '=([^&]*)');
					if (data_value != 'all') {
						var newDataStr = oldData.replace(match, function(m, n1) {
							return m.replace(n1, data_value);
						});
					} else {
						var newDataStr = oldData.replace(match, '');
					}
				} else {
					var newDataStr = oldData + '&' + data_key + '=' + data_value;
				}
			} else {
				if (data_value == 'all') {
					return false;
				}
				var newDataStr = data_key + '=' + data_value;
			}
			dataBox.data('selectedData', newDataStr);
			return true;
		},
		destroy: function() {
			//TODO
		}
	};
	TableFilter.version = "1.0.0";
	return TableFilter;
});