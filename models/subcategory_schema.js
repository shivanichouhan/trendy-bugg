var mongoose = require("mongoose")
const Schema = mongoose.Schema

const subcategorySchema = new mongoose.Schema(
  {
    superCategory:String,
    categoryName:String,
    subcatname:String,
    Status:{type:Number,default:0}
  }
);
module.exports = mongoose.model("subCategory", subcategorySchema);


