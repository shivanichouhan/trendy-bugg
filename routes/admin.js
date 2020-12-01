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
var fs = require("fs")

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
const Admin_detail = require("../models/admin_details_schema");
const admin_data = require('../models/admin_details_schema');
// const user_data = require("./user_details")
// router.use(fileUpload());


//admin
const country_location = require("../models/country_schema")
const state_location = require("../models/state_schema")
const superCate = require("../models/super_category");

async function hashPassword(password) {
    return await bcrypt.hash(password, 10);
}

async function validatePassword(plainPassword, hashedPassword) {
    return await bcrypt.compare(plainPassword, hashedPassword);
}

var storage = multer.diskStorage({
    destination: (req, file, cb) => {
        cb(null, './uploads/')
    },
    filename: (req, file, cb) => {
        cb(null, file.originalname + '-' + Date.now())
    }
});
var upload = multer({ storage: storage });


function randomString(len, charSet) {
    charSet = charSet || 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var randomString = '';
    for (var i = 0; i < len; i++) {
        var randomPoz = Math.floor(Math.random() * charSet.length);
        randomString += charSet.substring(randomPoz, randomPoz + 1);
    }
    return randomString;
}

router.post("/add_shiping_country", (req, res) => {
    try {
        console.log(req.body)
        const country = {
            country: req.body.country,
            Status: 0
        }
        const a = new country_location(country);
        a.save()
            .then((resp) => {
                res.redirect("/country_list")
            }).catch((err) => {
                res.send(err)
            })
    } catch (err) {
        res.send(err)
        console.log(err)
    }
});


router.post("/admin_login", (req, res) => {
    try {
        console.log(req.body)
        const {
            email,
            password,
        } = req.body;
        console.log(req.body)
        if (email == "admin123@gmail.com" && password == "123456") {
            res.redirect("/deshboard")
        } else {
            res.redirect("/admin_page")

        }
        // const user = await User.findOne({
        //     email
        // });
        // req.session.email = req.body.email;
        // if (!user) return next(new Error('Email does not exist'));
        // const validPassword = await validatePassword(password, user.password);
        // if (!validPassword) return next(new Error('Password is not correct'))
        // const accessToken = jwt.sign({
        //     userId: user._id
        // }, 'multiVender', {
        //     expiresIn: "1d"
        // });
        // await User.findByIdAndUpdate(user._id, {
        //     accessToken
        // })
        // const sessionId = req.session.id
        // console.log(sessionId, user._id)
        // await User.findByIdAndUpdate(user._id, {
        //     session: sessionId
        // })
        // const userRole = await User.findOne({
        //     role
        // });
        // let localStorage = new LocalStorage('./scratch');
        // localStorage.setItem('user_login_id', user._id);
        // console.log(user, "*************")
        // localStorage.setItem('user_login_email', user.email);
        // if (user.role == 'teacher') {
        //     res.redirect('/teacher')
        //     console.log("teacher")
        // } else if (user.role == "student") {
        //     console.log("student/" + user._id)
        //     res.redirect('/student')
        // }
    } catch (error) {
        next(error);
    }
});

router.post("/create_category", (req, res, next) => {

})

module.exports = router



// <script>
//   window.fbAsyncInit = function() {
//     FB.init({
//       appId      : '{your-app-id}',
//       cookie     : true,
//       xfbml      : true,
//       version    : '{api-version}'
//     });

//     FB.AppEvents.logPageView();   

//   };

//   (function(d, s, id){
//      var js, fjs = d.getElementsByTagName(s)[0];
//      if (d.getElementById(id)) {return;}
//      js = d.createElement(s); js.id = id;
//      js.src = "https://connect.facebook.net/en_US/sdk.js";
//      fjs.parentNode.insertBefore(js, fjs);
//    }(document, 'script', 'facebook-jssdk'));
// </script>


// FB.getLoginStatus(function(response) {
//     statusChangeCallback(response);
// });


// {
//     status: 'connected',
//     authResponse: {
//         accessToken: '...',
//         expiresIn:'...',
//         signedRequest:'...',
//         userID:'...'
//     }
// }

// <fb:login-button 
//   scope="public_profile,email"
//   onlogin="checkLoginState();">
// </fb:login-button>Copy Code


// function checkLoginState() {
//     FB.getLoginStatus(function(response) {
//       statusChangeCallback(response);
//     });
//   }

//   app_id ="201482464881474"