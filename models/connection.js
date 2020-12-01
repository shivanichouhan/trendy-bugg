const mongoose = require("mongoose");
mongoose.connect('mongodb://localhost:27017/vender',{useNewUrlParser: true})
var conn = mongoose.connection