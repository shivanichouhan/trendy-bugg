// const { errorHandler } = require('../helpers/dbErrorHandler');
var addItemModal = require('../models/additem');
var ProductModal = require('../models/productlist');

exports.Find = (req, res) => {
    var id = req.body.id
    console.log(id,typeof id)
    ProductModal.findById(id).exec((err, data) => {
        
        var item = data;
        var additem ={}
        additem.itemid = item._id;
        additem.name = item.name;
        additem.price = item.price;
        additem.ratings = item.ratings;
        additem.discount = item.discount;
        additem.sold = item.sold;
        console.log(additem)

    var addItemObj = new addItemModal(additem)
    addItemObj.save(function(err,Data){
        if(err){
            console.log('item not add')
        }
        res.json({Data})
    })
});
}


