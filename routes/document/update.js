var express = require('express'),
	router = express.Router(),
	con = require('./db');
router.get('/', function(req, res) {
	var id = req.query.id; //获取get传输的参数
	con.query('select * from doc where id =' + id, function(error, results) {
		if (error) {
			console.log("ClientReady Error: " + error.message);
			con.end();
			return;
		}
		res.render('update', {
			title: '文档修改',
			doc: results[0]
		});
	});
});
router.post('/', function(req, res) {
	var id = req.body['id'];
	var title = req.body['title'];
	var content = req.body['content'];
	if (title) {
		var values = [title, content, id];
		con.query("update doc set title = ?, content = ? where id = ?", values, function(error, results) {
			if (error) {
				console.log("ClientReady Error: " + error.message);
				con.end();
				return;
			}
			console.log('updateed: ' + results.affectedRows + ' row.');
			console.log('Id updateed: ' + results.insertId);
		});
	}
	res.redirect('/show?id='+id);
});
module.exports = router;