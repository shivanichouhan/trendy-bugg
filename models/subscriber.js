const mongoose = require("mongoose")
const schema = mongoose.Schema
var Float = require('mongoose-float').loadType(mongoose);


const subs = new schema({
    subscribe_email: { type: String }
});

const subscribers =  mongoose.model("Subscriber",subs);
module.exports = subscribers