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

(function($, window, document, undefined) {
	// undefined作为形参的目的是因为在es3中undefined是可以被修改的
	//比如我们可以声明var undefined = 123,这样就影响到了undefined值的判断，幸运的是在es5中,undefined不能被修改了。
	// window和document本身是全局变量，在这个地方作为形参的目的是因为js执行是从里到外查找变量的（作用域），把它们作为局部变量传进来，就避免了去外层查找，提高了效率。
	"use strict";
	$.fn.lhz_table = function(options) {
		var opts = $.extend({}, $.fn.lhz_table.defaults, options);
		var el = $(this).data("Layershow"),
			ret, api;

		this.each(function() {
			var o = $.meta ? $.extend({}, opts, $this.data()) : opts;
			var $this = $(this);
			require(["tableShow"], function(tableShow) {
				var tableShow = new tableShow({
					tbSelector: "lhz-tb",
					obj: $this,
					opts: o
				});
				if (o.editOpen) {
					require(["tableEdit"], function(tableEdit) {
						var tableEdit = new tableEdit({
							obj: $this,
							opts: o,
							tableShow: tableShow
						});
					});
				}
				if (o.filterOpen) {
					require(["tableFilter"], function(TableFilter) {
						var tableEdit = new TableFilter({
							filterSelector: "lhz-filter",
							obj: $this,
							opts: o,
							tableShow: tableShow
						});
					});
				}
			});

			//var markup = $this.html();      
			//markup = $.fn.lhz_table.skin(markup);      
		});
		//return table ? table : this;?
		return this;
	};

	$.fn.lhz_table.defaults = {
		"editOpen": true,
		"editBatch": false,
		"checkboxOpen": true,
		"filterOpen": true,
		"getDataUrl": './data/data.json',
		"getFilterUrl": '../../lhz_table/test/data/tableFilter.json',
		"updateDataUrl": './lhz_table/data/tableUPdate.php',
		"searchDataUrl": './lhz_table/data/tableSearch.php',
		"getTheadDate": [{
			"id": "id"
		}, {
			"title": "标题"
		}, {
			"type": "类型"
		}, {
			"priority": "等级"
		}, {
			"owner": "负责人"
		}, {
			"status": "状态"
		}, {
			"add_time": "添加时间"
		}, {
			"plan_start_time": "计划开始时间"
		}, {
			"plan_end_time": "计划结束时间"
		}, {
			"start_time": "开始时间"
		}, {
			"end_time": "结束时间"
		}],
		"dataOption": {
			"priority": [{
				"value": "p0",
				"name": "P0"
			}, {
				"value": "p1",
				"name": "P1"
			}, {
				"value": "p2",
				"name": "P2"
			}, {
				"value": "p3",
				"name": "P3"
			}, {
				"value": "p4",
				"name": "P4"
			}],
			"percent": [{
				"value": "0",
				"name": "0%"
			}, {
				"value": "10",
				"name": "10%"
			}, {
				"value": "20",
				"name": "20%"
			}, {
				"value": "30",
				"name": "30%"
			}, {
				"value": "40",
				"name": "40%"
			}, {
				"value": "50",
				"name": "50%"
			}]

		}
	};

	$.fn.lhz_table.skin = function(txt) {
		return '<table><tr><td>' + txt + '</td></tr></table>';
	};

})(jQuery, window, document);