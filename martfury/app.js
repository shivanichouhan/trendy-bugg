// // server/server.js
// const LocalStorage = require('node-localstorage').LocalStorage;
// const upload_image = require("./routes/update_profile")
const express = require('express');
// const mongoose = require('mongoose');
// const exphbs = require('express-handlebars');
const PORT = 4000
// var bodyParser = require('body-parser')
// var fs = require("fs")
// var redis = require("redis");
// var nodemailer = require("nodemailer")
// const jwt = require('jsonwebtoken');
// const cors = require('cors')
// const TodoTask = require("./models/todo_schema");
// const subscribe_details = require("./models/subscribe_schema")
// const techer_q = require("./models/teacher_questions");
// const Razorpay = require('razorpay');
const app = express();
const path = require("path")

// const rzp = new Razorpay({
//   key_id: "rzp_test_UjkEV1n3Tdee1h",
//   key_secret: "q5f19jNn48GPccfc1qVkYLWJ"
// });
// app.use(express.static(`${__dirname}/public`));

app.get("/home_page",(req,res,next)=>{
    res.sendFile(path.join(__dirname + '/index.html'));
    // res.render("/public/index.html")
})


app.listen(PORT, () => {
    console.log('Server is listening on Port:', PORT)
  })