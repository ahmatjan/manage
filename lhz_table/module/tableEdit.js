/**
 * @TableEdit 表格编辑对象
 * @author yangxiaoxu
 * @email lihuazhai_com@163.com
 * @website www.lihuazhai.com
 * @date 2015-03-31
 */
(function(mod) {
	if (typeof exports == "object" && typeof module == "object") // CommonJS
		module.exports = mod();
	else if (typeof define == "function" && define.amd) // AMD
		return define([], mod);
	else // Plain browser env
		this.TableEdit = mod();
})(function() {
	"use strict";
	var Tool = (function($, window) {
		function tool(parameter) {
			this.class = parameter.class || 'ui-hit';
			this.init();
		}
		tool.prototype = {
			init: function() {
				this.dom = $('<p class="' + this.class + '"></p>').appendTo('body').hide();
			},
			hintSHow: function(msg) {
				this.dom.html(msg);
				this.dom.hide().slideDown();
			},
			hintHide: function() {
				this.dom.slideUp();
			},
			hintSHowTime: function(msg, time) {
				var time = time || 3000;
				var $obj = this.dom.html(msg).slideDown();
				var tmid = window.setTimeout(function() {
					$obj.slideUp()
				}, time);
			}
		};
		return tool;
	})(jQuery, window);

	/**
	 * TableEdit对象
	 * @class Table
	 * @constructor
	 * @param {json} ajax成功的返回数据
	 * @return {String} 返回HTML的字符串
	 */
	function TableEdit(configObj) {
		this.opts = configObj.opts;
		this.table = configObj.obj;
		this.tableShow = configObj.tableShow;

		this.init();
	}
	TableEdit.prototype = {
		init: function() {
			this.bind();
			this.tool = new Tool({
				"class": "ui-hit"
			});
		},
		bind: function() {
			var t_this = this;
			this.table.on('click', 'tbody td', function() {
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
						t.html(t_this.selectDom(oldValue, field)).find('select').blur(function() {
							var value = $(this).val();
							if (oldValue != value) {
								t_this.daoUpdate(id, field, value);
							}
						});
						break;
					case 'data':
						//todo
						t.html(t_this.dateDom(oldValue, field)).find('select').blur(function() {
							var value = $(this).val();
							if (oldValue != value) {
								t_this.daoUpdate(id, field, value);
							}
						});
						break;
					default:
						t.html(t_this.textDom(oldValue)).find('input').blur(function() {
							var value = $(this).val();
							if (oldValue != value) {
								t_this.daoUpdate(id, field, value);
							}else{
								t_this.tableShow.refresh();
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
			var options = this.opts.dataOption;
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
		dateDom: function(oldValue, field) {
			//todo
			var options = this.opts.dataOption;
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
			var t_this = this;
			var url = this.opts.updateDataUrl;
			//实例工具类
			t_this.tool.hintSHow("等等中！");
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
						t_this.tool.hintSHowTime("保存成功！");
					} else {
						t_this.tool.hintSHowTime("保存失败！");
					}
					window.setTimeout(function() {
						//location.reload();
						t_this.tableShow.refresh();
					}, 4000);
				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					alert("ajax error");
				}
			});
		},
		destroy: function() {
			//TODO
		}
	};
	TableEdit.version = "1.0.0";
	return TableEdit;
});