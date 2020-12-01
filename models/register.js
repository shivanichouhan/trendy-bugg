var mongoose = require("mongoose")

const registerSchema = new mongoose.Schema(
  {
    name: String,
    mob: String,
    status:Number,
  }
);

module.exports = mongoose.model("register", registerSchema);


