// const { errorHandler } = require('../helpers/dbErrorHandler');
var ProductModal = require('../models/productlist');

exports.create = (req, res) => {
var ProductObj = new ProductModal(req.body)
console.log(req.body)
console.log(ProductObj)

ProductObj.save(function(err,data){
            if(err){
                console.log('product is not add')
            }
            res.json({data})
        })
};

