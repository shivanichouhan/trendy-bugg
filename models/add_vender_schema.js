const mongoose = require("mongoose")
const schema = mongoose.Schema
var Float = require('mongoose-float').loadType(mongoose);

var venderSchema = new schema({
    Name: {
        type: String
    },
    shop_name:{
        type:String
    },
    Status: { type:Number },
    email:{
        type:String,
        unique:true
    },
    phone_number:{
        type:String
    },seller_type:{
        type:String
    },
    pincode:{type:Number},
    Bank_info:{
        type:String
    }
});

const vender_data = mongoose.model("Vender_details_schema", venderSchema)
module.exports = vender_data