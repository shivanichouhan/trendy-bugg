var mongoose = require("mongoose")
const Schema = mongoose.Schema

const categorySchema = new mongoose.Schema(
  {
    subcatlist: [{
      type: Schema.Types.ObjectId,
      ref: "subCategory"
    }],
    supercatname:{ type: String },
    image: {
      data: Buffer,
      contentType: String
    },
    Status: { type: String ,default:0}

  }
);

module.exports = mongoose.model("superCategory", categorySchema);
