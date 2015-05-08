var Tool = (function($, window) {
	function tool() {}

	tool.prototype = {
		hintSHow: function(msg, time) {
			var that = this;
			var time = time || 3000;
			var html = ['<p class="ui-hit">' + msg, '<p>'].join('');
			var $obj = $(html).appendTo('body').hide().slideDown();
			var tmid = window.setTimeout(function() {
				$obj.slideUp()
			}, time);
		}
	};

	return tool;
})(jQuery, window);




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
					
					this.refresh
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