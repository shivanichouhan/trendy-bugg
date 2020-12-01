const mongoose = require("mongoose")
const schema = mongoose.Schema
require('mongoose-type-url')
var Float = require('mongoose-float').loadType(mongoose);

const product = new schema({
    productName: { type: String },
    productImage: {
        type:String
        // data: Buffer,
        // contentType: String,
        // default: ''
    },
    price: {type:String},
    discount: { type: String },
    ratings: { type: String },
    sold: { type: String },
    shop_name:{type:String},
    Category:{type:String},
    Sub_Category:{type:String},
    product_number :{type:String},
    discount_price:{type:String}
});

var productSchema = mongoose.model("Product", product)
module.exports = productSchema