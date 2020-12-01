var mongoose = require("mongoose")
const Schema = mongoose.Schema

const supercategorySchema = new mongoose.Schema(
  {
    subcatname:String,
    categList:[{
      type: Schema.Types.ObjectId,
      ref: "subCategory"
    }],
    Status:{type:Number,default:0}
  }
);
module.exports = mongoose.model("Category", supercategorySchema);


