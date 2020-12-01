const category = require('../models/category');
var categoryModel = require('../models/category')
var supercategoryModal = require('../models/supercategory')

exports.supercategorylist = (req, res, next) => {
        supercategoryModal.find().exec((err, data) => {
                res.json(data);
                next();
        })
}
exports.addcategory = (req, res) => {
        var supercatname = req.body.supercatname;
        var catname = req.body.catname;
        console.log(supercatname, catname)
        categoryModel.find({ "catlist": catname }).exec((err, data) => {
               if (err) {
                        res.send('category not found')
                }
                else {
                        if (data.length == 0) {
                                var catlist = [];
                                catlist.push(catname)
                                catdetails = {};
                                catdetails.supercatname = supercatname;
                                catdetails.catlist = catlist

                                categoryObj = new categoryModel(catdetails)
                                categoryModel.find({"supercatname":supercatname}).exec((err,data)=>{
                                       if(data.length == 0){
                                        categoryObj.save(function(err,data){
                                        if(err){
                                            console.log('category not add')
                                        }
                                        else{
                                              res.json({category:'category is added'})
                                        }
                                    })
                                 }
                                 else{
                                         for(row of data){
                                                row.catlist.push(catname)
                                         }
                                         categoryObj = new categoryModel(row)
                                         categoryObj.save(function(err,data){
                                                if(err){
                                                    console.log('category not add')
                                                }
                                                else{
                                                     res.json({category:'category is added'})
                                                }
                                       })
                                 }
                                 
                                })
                        }
                        else{
                                res.json({exist:'category is already exist'})
                        }
                }
        })
}