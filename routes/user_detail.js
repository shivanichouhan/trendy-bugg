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
var fs = require("fs")
const csv = require('fast-csv');
var otpGenerator = require("otp-generator")
var nodemailer=require("nodemailer")
const product_details = require("../models/products")
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
// const LocalStorage = require('node-localstorage').LocalStorage;


async function hashPassword(password) {
    return await bcrypt.hash(password, 10);
}

async function validatePassword(plainPassword, hashedPassword) {
    return await bcrypt.compare(plainPassword, hashedPassword);
}

function randomString(len, charSet) {
    charSet = charSet || 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var randomString = '';
    for (var i = 0; i < len; i++) {
        var randomPoz = Math.floor(Math.random() * charSet.length);
        randomString += charSet.substring(randomPoz, randomPoz + 1);
    }
    return randomString;
}


router.post('/varify_email',urlencodedParser,async(req,res)=>{
    console.log(req.body)
    var otp = otpGenerator.generate(6,{upperCase:false,specialChars:false,alphabets:false})
    var emails = req.body.email
    // console.log(emails)
    let localStorage = new LocalStorage('./scratch');
    localStorage.setItem("forget_email",emails)
    let u_email = JSON.parse(JSON.stringify(localStorage.getItem('forget_email')));
    console.log(u_email,"00000000000000000")
    console.log(emails)
    let mailTransporter = nodemailer.createTransport({ 
      host: 'smtp.gmail.com',
      port: 465,
      secure: true, // use SSL
      auth: { 
            user: 'shivanic18@navgurukul.org', 
            pass: 'Chouhan18@'
        } 
      });
      User.update({email:emails}, {$set: {otp:otp}})
      .then((respo)=>{
          console.log(respo.nModified)
          if(respo.nModified !== 0){
            let mailDetails = { 
                from: 'shivanic18@navgurukul.org', 
                to: emails, 
                subject: 'Your Otp', 
                html: "<h3>OTP for account verification is </h3>"  + "<h1 style='font-weight:bold;'>" + otp +"</h1>" 
              }; 
              mailTransporter.sendMail(mailDetails, function(err, data) { 
                if(err) {
                  console.log(err)
                    console.log('Error Occurs'); 
                } else { 
                    console.log('Email sent successfully');
                    res.send('sent otp in Your email please varify your otp here')
                } 
              }); 
          }else{
              res.send("Email is incorrect. server not found.")
          }
          console.log(respo)
       
      })
     
})


router.post('/verify_otp',urlencodedParser,async(req,res)=>{
    const user_otp = req.body.otps
    console.log(user_otp)
    User.findOne({otp:user_otp})
    .then((respo)=>{
        console.log(respo)
        console.log("----",req.body.otps)
        if(user_otp==respo.otp){
            res.send("otp confirm please reset Your password")
            // res.redirect("/reset_pass/"+user_otp)
        }
        else{
            console.log("error found")
            res.send('otp',{msg : 'otp is incorrect'});
        }
    })
   
});  


router.post("/reset_password", async (req, res, next) => {
    console.log(req.body)
    let localStorage = new LocalStorage('./scratch');
    let u_email = JSON.parse(JSON.stringify(localStorage.getItem('forget_email')));
    console.log(typeof (u_email))
    console.log(u_email,"******************")
    console.log(req.body)
    const pass = req.body.password
    const confirm_pass = req.body.confirm_pass
    if (pass === confirm_pass) {
      const otp_data = await User.findOne({
        email: u_email
      })
      console.log(otp_data)
      let u_emails = localStorage.setItem('user_data', otp_data);
      const hashedPassword = await hashPassword(pass);
      console.log(hashPassword)
      User.updateOne({
          email: u_email
        }, {
          $set: {
            password: hashedPassword
          }
        })
        .then((result) => {
          console.log(result)
          res.send("Your password is reset now you can login.")
        }).catch((err) => {
          res.send(err)
        })
    } else {
      res.send("Your Confirm Password Is wrong")
    }
  })
  
  

router.post("/ragister", async (req, res) => {
    try {
        console.log(req.body, "-------")
        const {
            email,
            password,
        } = req.body

        var randomValue = randomString(8, 'PICKCHAR45SFROM789THI123SSET');
        console.log(randomValue)
        const hashedPassword = await hashPassword(password);
        console.log(hashPassword, "(((((((((((((((((((((")
        const newUser = new User({
            email: email,
            password: hashedPassword,
            // role: role,
            // mob_number: mob_number,
            // sername: sername,
            // name: name,
            user_saring_code: randomValue,
            // user_role_status: user_roles
        });
        console.log(newUser)
        // res.send(newUser)

        let localStorage = new LocalStorage('./scratch');
        localStorage.setItem('user_details', newUser._id);
        const accessToken = jwt.sign({
            userId: newUser._id
        }, 'multiVender', {
            expiresIn: "1d"
        });
        res.cookie('token', accessToken, {
            httpOnly: true
        });
        newUser.accessToken = accessToken;
        newUser.session = req.session.id
        // localStorage.setItem("token",newUser)
        await newUser.save()
            .then((data) => {
                console.log(data)
                res.redirect("/home_page");
                // if (data.role == 'teacher') {
                //     res.redirect('/teacher')
                //     console.log("teacher")
                // } else if (data.role == "student") {
                //     console.log("student/" + data._id)
                //     res.redirect('/student')
                // }
            })
    } catch (error) {
        console.log(error)
        res.send(error)
    }
});


router.post("/vender_ragister", async (req, res) => {
    try {
        console.log(req.body, "-------")
        const {
            email,
            password,
        } = req.body

        var randomValue = randomString(8, 'PICKCHAR45SFROM789THI123SSET');
        console.log(randomValue)
        const hashedPassword = await hashPassword(password);
        console.log(hashPassword, "(((((((((((((((((((((")
        const newUser = new User({
            email: email,
            password: hashedPassword,
            // role: role,
            // mob_number: mob_number,
            // sername: sername,
            // name: name,
            user_saring_code: randomValue,
            // user_role_status: user_roles
        });
        console.log(newUser)
        // res.send(newUser)

        let localStorage = new LocalStorage('./scratch');
        localStorage.setItem('user_details', newUser._id);
        const accessToken = jwt.sign({
            userId: newUser._id
        }, 'multiVender', {
            expiresIn: "1d"
        });
        res.cookie('token', accessToken, {
            httpOnly: true
        });
        newUser.accessToken = accessToken;
        newUser.session = req.session.id
        // localStorage.setItem("token",newUser)
        await newUser.save()
            .then((data) => {
                console.log(data)
                res.redirect("/vender_deshboard")
                // if (data.role == 'teacher') {
                //     res.redirect('/teacher')
                //     console.log("teacher")
                // } else if (data.role == "student") {
                //     console.log("student/" + data._id)
                //     res.redirect('/student')
                // }
            })
    } catch (error) {
        console.log(error)
        res.send(error)
    }
});

router.post("/login", async (req, res, next) => {
    try {
        console.log(req.body)
        const {
            email,
            password,
        } = req.body;
        const user = await User.findOne({
            email
        });
        req.session.email = req.body.email;
        if (!user) return next(new Error('Email does not exist'));
        const validPassword = await validatePassword(password, user.password);
        if (!validPassword) return next(new Error('Password is not correct'))
        const accessToken = jwt.sign({
            userId: user._id
        }, 'multiVender', {
            expiresIn: "1d"
        });
        await User.findByIdAndUpdate(user._id, {
            accessToken
        })
        const sessionId = req.session.id
        console.log(sessionId, user._id)
        await User.findByIdAndUpdate(user._id, {
            session: sessionId
        })
        // const userRole = await User.findOne({
        //     role
        // });
        let localStorage = new LocalStorage('./scratch');
        localStorage.setItem('user_login_id', user._id);
        console.log(user, "*************")
        localStorage.setItem('user_login_email', user.email);
        res.redirect("/home_page")
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


router.post("/vender_login", async (req, res, next) => {
    try {
        console.log(req.body)
        const {
            email,
            password,
        } = req.body;
        const user = await User.findOne({
            email
        });
        req.session.email = req.body.email;
        if (!user) return next(new Error('Email does not exist'));
        const validPassword = await validatePassword(password, user.password);
        if (!validPassword) return next(new Error('Password is not correct'))
        const accessToken = jwt.sign({
            userId: user._id
        }, 'multiVender', {
            expiresIn: "1d"
        });
        await User.findByIdAndUpdate(user._id, {
            accessToken
        })
        const sessionId = req.session.id
        console.log(sessionId, user._id)
        await User.findByIdAndUpdate(user._id, {
            session: sessionId
        })
        // const userRole = await User.findOne({
        //     role
        // });
        let localStorage = new LocalStorage('./scratch');
        localStorage.setItem('user_login_id', user._id);
        console.log(user, "*************")
        localStorage.setItem('user_login_email', user.email);
        res.redirect("/vender_deshboard")
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




router.post('/sent_otp', urlencodedParser, (req, res) => {
    var otp = otpGenerator.generate(6, { upperCase: false, specialChars: false, alphabets: false })
    var emails = req.body.email
    console.log(emails)
    const LocalStorage = require('node-localstorage').LocalStorage;
    let localStorage = new LocalStorage('./scratch');
    localStorage.setItem("forget_email", emails)
    let u_email = JSON.parse(JSON.stringify(localStorage.getItem('forget_email')));
    console.log(u_email, "00000000000000000")
    console.log(emails)
    let mailTransporter = nodemailer.createTransport({
        service: 'gmail',
        port: 8000,
        secure: false, // use SSL
        auth: {
            user: 'shivanic18@navgurukul.org',
            pass: 'Chouhan18@'
        }
    });
    user.update({ email: emails }, { $set: { otp: otp } })
        .then((respo) => {
            let mailDetails = {
                from: 'shivanic18@navgurukul.org',
                to: emails,
                subject: 'Your Otp',
                html: "<h3>OTP for account verification is </h3>" + "<h1 style='font-weight:bold;'>" + otp + "</h1>"
            };
            mailTransporter.sendMail(mailDetails, function (err, data) {
                if (err) {

                    console.log(err)
                    console.log('Error Occurs');
                } else {
                    console.log('Email sent successfully');
                    res.redirect('/confirm_otp')
                }
            });
        })

});

router.post('/verify', urlencodedParser, function (req, res) {
    const user_otp = req.body.otp
    console.log(user_otp)
    user.findOne({ otp: user_otp })
        .then((respo) => {
            console.log(respo)
            console.log("----", req.body.otp)
            if (user_otp == respo.otp) {
                res.redirect("/reset_pass/" + user_otp)
            }
            else {
                console.log("error found")
                res.send('otp', { msg: 'otp is incorrect' });
            }
        })
});



router.post("/reset_password", urlencodedParser, async (req, res, next) => {
    let localStorage = new LocalStorage('./scratch');
    let u_email = JSON.parse(JSON.stringify(localStorage.getItem('forget_email')));
    console.log(typeof (u_email))
    console.log(u_email, "******************")
    console.log(req.body)
    const pass = req.body.password
    const confirm_pass = req.body.confirm_pass
    if (pass === confirm_pass) {
        const otp_data = await user.findOne({
            email: u_email
        })
        console.log(otp_data)
        let u_emails = localStorage.setItem('user_data', otp_data);
        const hashedPassword = await hashPassword(pass);
        console.log(hashPassword)
        user.updateOne({
            email: u_email
        }, {
            $set: {
                password: hashedPassword
            }
        })
            .then((result) => {
                console.log(result)
                res.send("Your password is reset now you can login.")
            }).catch((err) => {
                res.send(err)
            })
    } else {
        res.send("Your Confirm Password Is wrong")
    }
})

router.post("/subscribe_by_user", urlencodedParser, async (req, res, next) => {
    const body = req.body;
    console.log(body)
    subscribe.find({ subscribe_email: body.subs_email })
        .then((resp) => {
            if (resp.length == 0) {
                console.log(resp)
                const sub_user = new subscribe({
                    subscribe_email: body.subs_email
                })
                sub_user.save()
                    .then((subs_resp) => {
                        console.log(subs_resp);
                        console.log(body)
                        res.send(body)
                    })
            }else{
                console.log(resp)
                res.send("already subscribe this email try anathor one")
            }
        })
});



router.get("/insert_in_cart", urlencodedParser, async (req, res, next) => {
    if (req.session.email) {
        const course = req.body
        console.log(req.body)
        categorySchema.sb_details.findById("5f9f95bf519a320f9e6629b5").populate({
            path: 'course_chepters',
            populate: {
                path: 'chepter_lession',
                model: 'Lessions'
            }
        })
            .then((resp) => {
                console.log(resp, "))))))))))))")
                cart.find({
                    'cart.course_name': course.courseName
                }).populate({
                    path: 'cart',
                    populate: {
                        path: 'course_chepters',
                        model: 'Chepter_detail'
                    }
                })
                    .then((data) => {
                        console.log(data, "Cartttttttttttttttt")
                        if (data.length == 0) {
                            cart.find({
                                userEmail: req.session.email
                            }).populate({
                                path: 'cart',
                                populate: {
                                    path: 'course_chepters',
                                    model: 'Chepters'
                                }
                            })
                                .then((reslt) => {
                                    if (reslt.length != 0) {
                                        console.log("pehle se hi data hai", reslt)
                                        var a = reslt[0]
                                        console.log(reslt, "))))))))))))))))))))))))))))")
                                        var count = reslt[0].cart
                                        var cart_len = count.length + 1
                                        console.log(a, cart_len, "iddddddddddddddddddddddd")
                                        var cart_course_price = total_price(reslt, 230)
                                        console.log(resp, "KKKKKKKKKKKKKKKKKKKKK")
                                        cart.findByIdAndUpdate(a._id, {
                                            $set: {
                                                cart_total_price: cart_course_price,
                                                count_course: cart_len,
                                            }
                                        }, {
                                            new: true,
                                            useFindAndModify: false
                                        })
                                            .then((updated) => {
                                                cart.findByIdAndUpdate(a._id, {
                                                    $push: {
                                                        cart: resp._id
                                                    }
                                                })
                                                    .then((cart_update) => {
                                                        console.log(cart_update, "&&&&&&&&&&&&&&&&&&&&&&")
                                                        res.send("finaly update")
                                                    }).catch((err) => {
                                                        console.log(err)
                                                        next(err)
                                                    })

                                            }).catch((err) => {
                                                next(err)
                                            })
                                    } else if (reslt == 0) {
                                        var count_courses = 1
                                        // console.log(resp.course_price )
                                        var cart_course_price = 340
                                        console.log("cart khali hai")

                                        var new_cart_course = new cart({
                                            count_course: count_courses,
                                            cart_total_price: cart_course_price,
                                            userEmail: req.session.email
                                        })
                                        console.log(new_cart_course, ")))))))))))))")
                                        console.log(resp, "#####################")
                                        new_cart_course.cart.push(resp._id)
                                        return new_cart_course.save()
                                            .then((reressss) => {
                                                console.log(reressss)
                                                res.send(reressss)
                                            }).catch((err) => {
                                                console.log(err)
                                                res.send("error aai hai")
                                            })
                                    }
                                })
                        } else {
                            res.send("you already add this course in cart")
                        }
                    });
            });
    } else {
        console.log("error hai beta")
        res.redirect('/home')
    }
});






module.exports = router