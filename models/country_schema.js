const mongoose = require("mongoose")
const schema = mongoose.Schema
// var Float = require('mongoose-float').loadType(mongoose);

var UserSchema = new schema({
    country: {
        type: String
    }, State: [{
        type: schema.Types.ObjectId,
        ref: "Shiping_state"
    }]
    ,
    Status: { type: String }
});

var country_location = mongoose.model("Shiping_country", UserSchema)
module.exports = country_location