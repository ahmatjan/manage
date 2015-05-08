/**
 * jquery plugin
 * v1.1
 * @createDate -- 2015/2/25
 * @author yangxiaoxu
 * @email lihuazhai_com@163.com
 * @requires jQuery v1.7.0 or later
 * Copyright (c) 2015 
 * http://www.lihuazhai.com
 */
require.config({
    baseUrl: '../../lhz_table/module'
});


require(["search"], function (search) {
  console.log(search);
});



var tableEdit = (function($, window) {
	function Edit(obj, opts, table) {
		this.obj = obj;
		this.opts = opts;
		this.table = table;
	}

	Edit.prototype = {
		bind: function() {
			var that = this;
			this.obj.on('click', 'tbody td', function() {
				var t = $(this);
				var id = t.parents('tr').attr('data-rowid');
				var type = t.attr("data-type");
				var field = t.attr("data-field");
				var oldValue = t.text();
				//禁止重复点击
				if (t.attr("data-isEdit")) {
					return false;
				}
				switch (type) {
					case 'percent':
						//百发比现实，取值需要特殊处理
						oldValue = t.attr("data-value");
					case 'select':
						t.html(that.selectDom(oldValue, field)).find('select').blur(function() {
							var value = $(this).val();
							if (oldValue != value) {
								that.daoUpdate(id, field, value);
							}
						});
						break;
					default:
						t.html(that.textDom(oldValue)).find('input').blur(function() {
							var value = $(this).val();
							if (oldValue != value) {
								that.daoUpdate(id, field, value);
							}
						});
				}

				t.attr("data-isEdit", "1");
			});
		},
		textDom: function(oldValue) {
			var html = '<input type="text" value="' + oldValue + '" />';
			return html;
		},
		selectDom: function(oldValue, field) {
			var options = this.table.data.option;
			var html = '<select>';
			$.each(options[field], function(i, item) {
				if (item.name == oldValue) {
					html += '<option value="' + item.value + '" selected>' + oldValue + '</option>';
				} else {
					html += '<option value="' + item.value + '">' + item.name + '</option>';
				}
			});
			html += '<select>';
			return html;
		},
		daoUpdate: function(id, field, value) {
			var url = this.opts.updateDataUrl;
			//实例工具类
			var tool = new Tool();
			$.ajax({
				type: "POST",
				url: url,
				data: {
					"id": id,
					"field": field,
					"value": value
				},
				dataType: "html",
				success: function(msg) {
					if (msg == 0) {
						tool.hintSHow("保存成功！");
					} else {
						tool.hintSHow("保存失败！");
					}
					window.setTimeout(function() {
						location.reload();
					}, 4000);
				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					alert("ajax error");
				}
			});
		}
	};

	return Edit;
})(jQuery, window);

;
(function($, window, document, TableEdit, undefined) {
	// undefined作为形参的目的是因为在es3中undefined是可以被修改的
	//比如我们可以声明var undefined = 123,这样就影响到了undefined值的判断，幸运的是在es5中,undefined不能被修改了。
	// window和document本身是全局变量，在这个地方作为形参的目的是因为js执行是从里到外查找变量的（作用域），把它们作为局部变量传进来，就避免了去外层查找，提高了效率。
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


	$.fn.lhz_table = function(options) {
		var opts = $.extend({}, $.fn.lhz_table.defaults, options);
		var el = $(this).data("Layershow"),
			ret, api;

		this.each(function() {
			var o = $.meta ? $.extend({}, opts, $this.data()) : opts;
			var $this = $(this);

			var table = new Table($this, opts);
			if (o.editOpen) {
				var tdEditobj = new TableEdit($this, opts, table);
				tdEditobj.bind();
			}

			//var markup = $this.html();      
			//markup = $.fn.lhz_table.skin(markup);      
		});
		return table ? table : this;
	};

	$.fn.lhz_table.defaults = {
		"editOpen": true,
		"getDataUrl": './routes/getData.php',
		"updateDataUrl": './routes/tableUPdate.php'
	};

	$.fn.lhz_table.skin = function(txt) {
		return '<table><tr><td>' + txt + '</td></tr></table>';
	};

})(jQuery, window, document, tableEdit);