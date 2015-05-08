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
		res.render('show', {
			title: '文档显示',
			doc: results[0]
		});
	});
});

module.exports = router;