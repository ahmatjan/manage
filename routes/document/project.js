var express = require('express'),
	http = require('http'),
	async = require('async'),
	path = require('path'),
	router = express.Router(),
	con = require('./db');

function getProjectList(req, res) {
	var result_obj = {};
	result_obj['title'] = '添加新项目';
	result_obj['projects'] = [];

	async.waterfall([
		function(cb) {
			//查询项目表
			con.query('select * from project', function(error, results) {
				if (error) {
					console.log("ClientReady Error: " + error.message);
					con.end();
					return;
				}
				cb(null, results);
			});
		},
		function(results, cb) {
			//查询分类表
			for (var i = 0; i < results.length; i++) {
				(function(i) {
					var project_id = results[i].id;
					var temp_obj = results[i];
					con.query('select * from category where project_id = ' + project_id, function(error, result_cate) {
						if (error) {
							console.log("ClientReady Error: " + error.message);
							con.end();
							return;
						}
						cb(null, i, results.length, temp_obj, result_cate);
					});

				})(i);
			};
		},
		function(i, j, temp_obj, result_cate, cb) {
			temp_obj['category'] = result_cate;
			result_obj['projects'].push(temp_obj);
			if (i == j - 1) {
				cb(null, result_obj);
			}
		}
	], function(err, results) {
		res.render('project', results);
	})

}



/* GET add page. */
router.get('/', function(req, res) {
	getProjectList(req, res)
});
router.post('/project_add', function(req, res) {
	var name = req.body['name'];
	var values = ['', name];
	con.query('insert into project set id=?,name=?', values, function(error, results) {
		if (error) {
			console.log("ClientReady Error: " + error.message);
			con.end();
			return;
		}
		console.log('Inserted: ' + results.affectedRows + ' row.');
		console.log('Id inserted: ' + results.insertId);
	});
	getProjectList(req, res)
});
router.post('/category_add', function(req, res) {
	var cate_name = req.body['cate_name'];
	var project_id = req.body['project_id'];
	var values = ['', cate_name, project_id];
	con.query('insert into category set id=?,name=?,project_id=?', values, function(error, results) {
		if (error) {
			console.log("ClientReady Error: " + error.message);
			con.end();
			return;
		}
		console.log('Inserted: ' + results.affectedRows + ' row.');
		console.log('Id inserted: ' + results.insertId);
	});
	getProjectList(req, res)
});
module.exports = router;