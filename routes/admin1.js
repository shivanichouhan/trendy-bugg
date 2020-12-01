var express = require('express');
var router = express.Router();
var { findUser,userStatus,userDelete,addSeller,addsupercategory,Deletesupercategory,Updatesupercategory} = require('../controller/admin')
var { sellerlist,sellerDelete,sellerStatus,getsellerUpdate,sellerUpdate } = require('../controller/venderlist')
var multer = require('multer')

var store = multer.diskStorage({
  destination: function(req, file, cb){
      cb(null,'uploads/supercategory/')
  },
  filename: function(req, file, cb){
      cb(null, Date.now() + file.originalname)
  }
});

var upload = multer({storage : store});

router.get('/',(req,res)=>{
  res.send('admin page invoked')
});

router.get('/userlist', findUser);

router.delete('/userlist/deleteuser', userDelete)

router.get('/userlist/manageuserstatus', userStatus);
  
router.get('/addseller',(req,res)=>{
  res.send('add seller invoked')
})

router.post('/addseller', addSeller)

router.get('/sellerlist/sellerstatus', sellerStatus)

router.get('/sellerlist', sellerlist);

router.get('/getsellerupdate', getsellerUpdate);

router.post('/sellerupdate', sellerUpdate);

router.delete('/sellerlist/deleteSeller', sellerDelete)

router.get('/addsupercategory',(req,res)=>{
  res.render('supercategory')
})


router.post('/deletesupercategory', Deletesupercategory)

router.post('/updatesupercategory', Updatesupercategory)

router.post('/addsupercategory', upload.single('image'),addsupercategory)

module.exports = router;
