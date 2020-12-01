const mongoose = require("mongoose")
const schema = mongoose.Schema
var Float = require('mongoose-float').loadType(mongoose);

var UserSchema = new schema({
    state: {
        type: String
    } ,
    Status: { type: String }
});

var state_location = mongoose.model("Shiping_state", UserSchema)
module.exports = state_location