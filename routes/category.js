var express = require('express');
const { supercategorylist,getaddcategory,addcategory } = require('../controller/category');
var router = express.Router();
var multer = require('multer')

// var store = multer.diskStorage({
//   destination: function(req, file, cb){
//       cb(null,'uploads/category/')
//   },
//   filename: function(req, file, cb){
//       cb(null, Date.now() + file.originalname)
//   }
// });

// var upload = multer({storage : store});


router.use(supercategorylist)

router.get('/addcategory', (req,res)=>{
    console.log('get category invoked')
})

router.post('/addcategory',addcategory)

module.exports = router;