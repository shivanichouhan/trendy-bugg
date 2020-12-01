const bcrypt = require('bcryptjs');
const LocalStorage = require('node-localstorage').LocalStorage;
const jwt = require('jsonwebtoken');

const express = require('express');
const router = express.Router();
// const userController = require('./userController');
const bodyParser = require('body-parser')
const urlencodedParser = bodyParser.urlencoded({
    extended: false
});
const csv = require('fast-csv');

const subscribe = require("../models/subscriber")
const facebookStrategy = require("passport-facebook").Strategy;
const path = require('path');
var passport = require("passport")
var googleStrategy = require("passport-google-oauth20").Strategy;
const User = require("../models/user_schema")
// const uploadController = require("./upload");
// const homeController = require("./home");
const GridFsStorage = require("multer-gridfs-storage")
// var fileUpload = require('express-fileupload');
const multer = require("multer");
var session = require('express-session');
// const subscribers = require('../models/subscriber');

// const user_data = require("./user_details")
// router.use(fileUpload());

router.post("/vender_add",(req,res,next)=>{
    try{
        console.log(req.body)

    }catch(err){
        console.log(err)
        res.send(err)
    }
})



module.exports = router