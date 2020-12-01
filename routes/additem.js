var express = require('express');
var router = express.Router();
const { Find } = require('../controller/additem')

router.get('/additem',(req,res)=>{
  res.send('add item page invoked')
});
router.post('/additem', Find)

module.exports = router;
