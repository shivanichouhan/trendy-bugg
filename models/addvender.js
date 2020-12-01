var mongoose = require("mongoose")

const addVenderSchema = new mongoose.Schema(

    {
        name:String,
        email:String,
        phone:String,
        postcode:String,
        password:String,
        seller_id:String,
        status:Number,
    }
);

module.exports = mongoose.model("Vender", addVenderSchema);


