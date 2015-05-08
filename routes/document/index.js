var express = require('express')
router = express.Router(),
	con = require('./db');
router.get('/', function(req, res) {
	con.query('select * from doc', function(error, results) {
		if (error) {
			console.log("ClientReady Error: " + error.message);
			con.end();
			return;
		}
		res.render('index', {
			title:'文档管理',
			docs: results
		});
		console.log(results);
	});
});
module.exports = router;