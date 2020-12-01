var express = require('express');
var router = express.Router();
var { create } = require('../controller/register')

router.get('/register', (req, res) => {
  res.send('register page invoked')
});

router.post('/register', create);

module.exports = router;
