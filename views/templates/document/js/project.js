$(function() {
	$("#project_add").click(function() {
		var project_name = $("input[name='projectName']").val();
		$.ajax({
			url: "/project/project_add",
			type: "POST",
			data: {
				name: project_name
			}
		}).done(function(msg) {
			console.log("success");
			location.reload();
		}).fail(function(jqXHR, textStatus) {
			console.log("Request failed: " + textStatus);
		}).always(function() {
			console.log("complete");
		});
	});

	$(".addCate a").click(function() {
		var objThis = $(this);
		var project_id = objThis.attr('data-project-id');
		objThis.after($('<input type="text" name="cateName"><input type="button" class="cate_add" data-project-id="' + project_id + '" value="提交">'));
	});

	$(".project-list").on('click', '.cate_add', function() {
		var obj_t = $(this);
		var project_id = obj_t.attr('data-project-id');
		var cate_name = obj_t.prev().val();
		$.ajax({
			url: "/project/category_add",
			type: "POST",
			data: {
				project_id: project_id,
				cate_name: cate_name
			}
		}).done(function(msg) {
			console.log("success");
			location.reload();
		}).fail(function(jqXHR, textStatus) {
			console.error("Request failed: " + textStatus);
		}).always(function() {
			console.log("complete");
		});

	});

})