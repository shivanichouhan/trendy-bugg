const mongoose = require("mongoose")
const schema = mongoose.Schema
var Float = require('mongoose-float').loadType(mongoose);


const admin_login_schema = new schema({
    userName: {
        type: String
    }, email: {
        type: String
    }, password: {
        type: String
    }, image: {
        data: Buffer,
        contentType: String,
        default: ""
    }, country: {
        type: String
    }, State: { type: String },
    City: { type: String },
    Postal_code: { type: Number },SLA_days:{
        type:String
    }
})

const admin_data = mongoose.model("Admin_schema", admin_login_schema)
module.exports = admin_data