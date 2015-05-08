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