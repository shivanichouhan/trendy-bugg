const mongoose = require("mongoose")
const schema = mongoose.Schema
var Float = require('mongoose-float').loadType(mongoose);

var UserSchema = new Schema({
    email: {
        type: String, required: true,
        trim: true, unique: true,
        match: /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
    },
    facebookProvider: {
        type: {
            id: String,
            token: String
        },
        select: false
    }
});

var detail = mongoose.model("fb_users  ", UserSchema)
module.exports = detail