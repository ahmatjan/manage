var express = require('express'),
  http = require('http'),
  path = require('path'),
  router = express.Router(),
  con = require('./db');

function getProjectList(req, res) {
    var result_obj = {};
    result_obj['title'] = '添加新文档';
    result_obj['projects'] = [];
    con.query('select * from project', function(error, results) {
      if (error) {
        console.log("ClientReady Error: " + error.message);
        con.end();
        return;
      }
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
            // temp_obj['category'] = result_cate;
            results[i]['category'] = result_cate;
            result_obj['projects'].push(temp_obj);
            if (i == results.length - 1) {
              res.render('add', result_obj);
            }
          });
        })(i)
      }
    });
  }
  /* GET add page. */
router.get('/', function(req, res) {
  getProjectList(req, res)
});

router.post('/', function(req, res) {
  var title = req.body['title'];
  var content = req.body['content'];
  var category_id = req.body['category_id'];

  if (title) {
    var values = ['', title, content, category_id];
    con.query('insert into doc set id=?,title=?,content=?,category_id=?', values, function(error, results) {
      if (error) {
        console.log("ClientReady Error: " + error.message);
        con.end();
        return;
      }
      console.log('Inserted: ' + results.affectedRows + ' row.');
      console.log('Id inserted: ' + results.insertId);
      res.redirect('/show?id=' + results.insertId);
    });
  }
});

//ajax 查询project对应的category
router.post('/sel_cate', function(req, res) {
  var project_id = req.body['project_id'];

  con.query('select * from category where project_id = ' + project_id, function(error, results) {
    if (error) {
      console.log("ClientReady Error: " + error.message);
      con.end();
      return;
    }
    res.json({
      category: results
    });
  });

});

module.exports = router;