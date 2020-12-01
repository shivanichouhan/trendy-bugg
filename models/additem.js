var mongoose = require("mongoose")

const additemSchema = new mongoose.Schema(
    
    {
        itemid:Object,
        name:String,
        price:Number,
        ratings:Number,
        discount:Number,
        sold:Boolean,
    }
);

module.exports = mongoose.model("additem", additemSchema);


