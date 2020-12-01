var mongoose = require("mongoose")

const productSchema = new mongoose.Schema(
    {
      name:String,
      price:Number,
      ratings:Number,
      discount:Number,
      sold:Boolean,
    }
);

module.exports = mongoose.model("product", productSchema);


