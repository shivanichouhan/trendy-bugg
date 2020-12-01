var express = require('express');
var router = express.Router();
const { create } = require('../controller/productlist')

router.get('/productlist',(req,res)=>{
  res.send('product page invoked')
});

router.post('/productlist', create)

module.exports = router;
