//require method
const express = require('express');
const mongoose = require('mongoose');
const PORT = 4000;
var multer = require("multer");
var flashh = require('req-flash');
var bodyParser = require('body-parser')
var fs = require("fs")
var redis = require("redis");
// var nodemailer = require("nodemailer")
const jwt = require('jsonwebtoken');
const cookieParser = require('cookie-parser');
const app = express();
const path = require("path");
const user_add = require("./routes/user_detail")
const add_admin = require("./routes/admin")
var session = require('express-session');
var redisStore = require('connect-redis')(session);
var client = redis.createClient();
var passport = require("passport")
const ejs = require("ejs")
var flash = require('connect-flash');
var fast = require("fast-csv");
const csv = require('csv-parser');
app.use(express.static(path.resolve('/public')));
// app.use(express.session({ secret: "secret" }));

const User = require("./models/user_schema");
const FacebookStrategy = require("passport-facebook").Strategy
const admins = require("./models/admin_details_schema")
var googleStrategy = require("passport-google-oauth20").Strategy;
const vender = require("./models/add_vender_schema")
app.use(bodyParser.json());
app.set('views', path.join(__dirname, 'martfury'));
const country_detail = require("./models/country_schema")
// app.set('views', path.join(__dirname, 'admin'));


//locations
const country_location = require("./models/country_schema")
const state_location = require("./models/state_schema")
const Product_add = require("./models/product_shema")
const product = require("./models/products")

const superCate = require("./models/super_category")
const category = require("./models/category_shema")
const sub_categories = require("./models/subcategory_schema")



app.set('view engine', 'ejs');
app.use(express.static('martfury'));

app.use(express.static('martfury/admin'))
const client_id = "154943699166-i1j2ilpccmtksdu2b8d37occft9j2lh7.apps.googleusercontent.com"
const secret_id = "4yn6RIoHXdrtqQbjJ6rcdjpH"
app.use(passport.initialize())
app.use(passport.session())
//app use method
app.use(cookieParser())
app.use(bodyParser.urlencoded({
    extended: false
}));
// let viewPaths = glob.sync('views/**/').map(path => {
//     return path.substring(0, path.length - 1)
// })

// var Patch = require('./patch.ViewEnableMultiFolders');
// Patch.ViewEnableMultiFolders(app);
// app.set('views', ['./martfury', './admin']);
// // app.set('view engine', 'ejs');



//database connection
mongoose.set('useFindAndModify', false);
mongoose
    .connect('mongodb://localhost:27017/multi_vender', {
        useUnifiedTopology: true,
        useNewUrlParser: true
    })
    .then(() => {
        console.log('Connected to the Database successfully');
    });

app.use(session({ secret: 'keyboard cat', cookie: { maxAge: 60000 } }))
app.use(flashh());

var storage = multer.diskStorage({
    destination: (req, file, cb) => {
        cb(null, './uploads/')
    },
    filename: (req, file, cb) => {
        cb(null, file.originalname + '-' + Date.now())
    }
});
var upload = multer({ storage: storage });



// Access the session as req.session
function user_session(req, res, next) {
    if (req.session.views) {
        req.session.views++;
        console.log(req.session.views);
        return req.session.views
        // res.setHeader('Content-Type', 'text/html')
        // res.write('<p>views: ' + req.session.views + '</p>')
        // res.write('<p>expires in: ' + (req.session.cookie.maxAge / 1000) + 's</p>')
        // res.end()
    } else {
        req.session.views = 1;
        console.log("new user");
        return "new user hai"
        // res.end('welcome to the session demo. refresh!')
    }
};


//user page


app.get("/login_page", (req, res) => {
    res.render("my-account1")
});

app.get("/add_product", (req, res) => {
    res.render("admin/product")
})

//admin
app.get("/add_vender", (req, res) => {
    res.render("admin/add_seller")
});

app.get("/vender_list", (req, res, next) => {
    vender.find({ Status: 0 })
        .then((vender_resp) => {
            console.log(vender_resp);
            res.render("admin/marchent", { data: vender_resp });
        })
});

app.get("/admin_profile", (req, res) => {
    res.render("admin/profile")
})

app.get("/admin_page", (req, res, next) => {
    res.render("admin/index")
    // res.sendFile(path.join(__dirname + '/admin/index.html'));

});

//ADD COUNTRY
app.get("/country_list", (req, res) => {
    country_location.find({ Status: 0 })
        .then((result) => {
            console.log(result, "$$$$$$$$$")
            res.render("admin/country", { data: result })
        })
})
app.get("/edit_country", (req, res) => {
    res.render("admin/edit_country")
})
app.post("/update_country", (req, res) => {
    const data = req.body.data;
    app.set("country", data);
    console.log(data);
    res.redirect("/edit_country")
});

app.post("/updates_country", (req, res) => {
    const old_contry = app.get("country");
    console.log(req.body)
    country_location.updateOne({ country: old_contry }, { $set: { country: req.body.data } })
        .then((resp) => {
            console.log(resp)
            console.log(req.body)
            res.send("country updated");
        });
});

// END

//ADD STATE 

app.get("/state_list", (req, res) => {
    const a = {}
    country_location.find({ Status: 0 }).populate("State")
        .then((result) => {
            console.log(result, "$$$$$$$$$")
            // a.country = result
            res.render("admin/state", { data: result });
        })
});



//add product 

// app.get('/test', function() {
//     req.flashh('successMessage', 'You are successfully using req-flash');
//     req.flashh('errorMessage', 'No errors, you\'re doing fine');

//     res.redirect('/add_product');
// });

// app.get("/home_pageS", (req, res) => {
//     product.find()
//         .then((response) => {
//             console.log(response);
//             res.render("index_final", { data: response })
//         })

// })


app.post("/product_uploads", (req, res, next) => {
    var csvfile = __dirname + "/public/product.csv";
    console.log(csvfile)
    var stream = fs.createReadStream(csvfile);
    var products = []
    var csvStream = csv()
        .on("data", function (data) {
            const itm = {

                productName: data.productName,
                price: data.price,
                discount: data.discount,
                shop_name: data.shop_name,
                productImage: "https://i.pinimg.com/originals/91/03/3a/91033a47ab8e2f7b4d801658cca47a3c.jpg"
            }
            console.log(itm)

            var item = new product(itm);

            item.save(function (error) {

                console.log(item);

                if (error) {
                    throw error;
                }
            });
        }).on("end", function () {
            console.log(" End of file import");
        });
    stream.pipe(csvStream);
    // res.send(req.flashh());
    // req.flashh('deletePostSuccessMsg', 'Post deleted successfully!');
    res.redirect("/add_product")
    // res.json({ success: "Data imported successfully.", status: 200 });
});

app.get("/deshboard", (req, res, next) => {
    res.render("admin/home")
    // res.sendFile(path.join(__dirname+'/admin/home.html'))
})

app.post("/add_admin", (req, res) => {
    const a = new admins({ email: "admin123@gmail.com", password: "123456" });
    a.save()
        .then((resp) => {
            res.send(resp)
        })
});
app.get("/super_category", (req, res) => {
    superCate.find()
        .then((response) => {
            console.log(response)
            res.render("admin/category", { data: response });

        })
});
app.post("/add_superCategory", upload.single('image'), (req, res) => {
    try {
        const superCategory = {}
        console.log(req.file)
        console.log(req.body)
        if (req.file == undefined) {
            superCategory.supercatname = req.body.superCategory,
                superCategory.image = {
                    data: fs.readFileSync(path.join(__dirname + '/uploads/empty_image.png')),
                    contentType: 'image/png'

                }
        } else {
            superCategory.supercatname = req.body.superCategory,
                superCategory.image = {
                    data: fs.readFileSync(path.join(__dirname + '/uploads/' + req.file.filename)),
                    contentType: 'image/png'
                }

        };
        const a = new superCate(superCategory);
        a.save()
            .then((resp) => {
                console.log(resp)
                res.redirect("/super_category")
            }).catch((err) => {
                res.send(err)
            })
    } catch (err) {
        res.send(err)
        console.log(err)
    }
});

app.get("/edit_super_category", (req, res) => {
    res.render("admin/edit_category")
});

app.post("/update_super_category", (req, res) => {
    const data = req.body.data;
    app.set("category", data);
    console.log(data);
    res.redirect("/edit_country")
});


app.post("/updates_category", upload.single('image'), (req, res) => {
    const old_contry = app.get("category");
    console.log(req.body)
    superCate.updateOne({ supercatname: old_contry }, { $set: { supercatname: req.body.name } })
        .then((resp) => {
            console.log(resp)
            console.log(req.body)
            res.redirect("/super_category");
        });
});

app.get("/category", (req, res) => {
    superCate.find().populate("subcatlist")
        .then((result) => {
            console.log(JSON.stringify(result))
            res.render("admin/sub_category", { data: result })
        })
});
app.post("/add_category", (req, res) => {
    console.log(req.body);
    const super_categ = req.body.category
    const cate = req.body.sub_category
    superCate.findOne({ supercatname: super_categ })
        .then((reslt) => {
            const category_match = reslt.subcatlist;
            // if()
            console.log(reslt)
            const data = {
                subcatname: cate
            }
            const sub = new category(data)
            sub.save()
                .then((reslts) => {
                    const a = "n-log-n"
                    superCate.findOne({ supercatname: super_categ }).populate("subcatlist")
                        .then((resp) => {
                            resp.subcatlist.forEach((items) => {
                                if (items.subcatname === cate) {
                                    res.send("this sub category already in super category")
                                }

                            })
                            superCate.findByIdAndUpdate(reslt._id, { $push: { subcatlist: reslts._id } })
                                .then((super_cat_update) => {
                                    console.log(super_cat_update);
                                    res.redirect("/category");
                                });
                        })


                });
        });
    // sub_category
});

app.get("/edit_category", (req, res) => {
    res.render("admin/edit_sub_category")
});
app.post("/sub_category_data", (req, res) => {
    const data = req.body.data;
    app.set("sub_category", data);
    console.log(data);
    res.redirect("/edit_category")
})
app.post("/edit_category", (req, res) => {
    const old_contry = app.get("sub_category");
    console.log(req.body)
    category.updateOne({ subcatname: old_contry }, { $set: { subcatname: req.body.name } })
        .then((resp) => {
            console.log(resp)
            console.log(req.body)
            res.redirect("/category");
        });
});

app.get("/sub_category", (req, res, next) => {
    sub_categories.find()
        .then((resp) => {
            superCate.find().populate("subcatlist")
                .then((result) => {
                    console.log(resp)
                    console.log(JSON.stringify(result, "%%%%%%%%%%%%%%%%%%%"))
                    resp.categories = result
                    console.log(resp)

                    res.render("admin/sub_topic", { data: resp })

                })
        })
});

app.get("/dd", (req, res) => {
    superCate.find().populate("subcatlist")
        .exec((err, bookList) => {
            console.log(JSON.stringify(bookList))
            res.send(JSON.stringify(bookList));
        });
});

app.post("/sub_categories", (req, res) => {
    try {
        // sub_categories
        const super_categ = req.body.category
        const cate = req.body.sub_category
        category.findOne({ supercatname: super_categ })
            .then((reslt) => {
                const category_match = reslt.subcatlist;
                // if()
                console.log(reslt)
                const data = {
                    subcatname: cate
                }
                const sub = new category(data)
                sub.save()
                    .then((reslts) => {
                        const a = "n-log-n"
                        category.findOne({ supercatname: super_categ }).populate("subcatlist")
                            .then((resp) => {
                                resp.subcatlist.forEach((items) => {
                                    if (items.subcatname === cate) {
                                        res.send("this sub category already in super category")
                                    }

                                })
                                category.findByIdAndUpdate(reslt._id, { $push: { subcatlist: reslts._id } })
                                    .then((super_cat_update) => {
                                        console.log(super_cat_update);
                                        res.redirect("/category");
                                    });
                            })
                    });
            });
    } catch (err) {
        console.log(err)
        res.send(err)
    }
    console.log(req.body);
    res.send(req.body)
});

app.get("/inventry",(req,res) =>{
    res.render("admin/inventory")
});

app.get("/manage_products",(req,res)=>{
    res.render("admin/manage_product")
})

app.get("/combo_offer",(req,res)=>{
    res.render("admin/promotions")
});

app.get("/grid_product",(req,res)=>{
    res.render("admin/add_grid_product")
})

//admin order Reports
app.get("/order_delivery",(req,res)=>{
    res.render("admin/order")
})
app.get("/pending_order",(req,res)=>{
    res.render("admin/pend_order")
});
app.get("/cancle_order",(req,res)=>{
    res.render("admin/can_order")
});

app.get("/return_orders",(req,res)=>{
    res.render("admin/return_order")
});
app.get("/exchange_order",(req,res)=>{
    res.render("admin/exchange_order")
});

//newsletter

app.get("/newsLetter",(req,res)=>{
    res.render("admin/subscriber")
});

app.get("/coupons",(req,res)=>{
    res.render("admin/coupon")
})

app.post("/giving_ratings", (req, res) => {
    const rating = req.body.rating;
});


//google login

passport.use(
    new googleStrategy({
        clientID: client_id,
        clientSecret: secret_id,
        callbackURL: "/home_page"
    },
        function (accessToken, refreshToken, profile, done) {
            console.log("access token", accessToken);
            console.log("refress token", refreshToken);
            console.log("profile", profile);
            console.log("done", done)
        })

);
const a = require("./public/shivi.csv")
console.log(a)


app.get("/add_data", (req, res) => {
    var csvfile = __dirname + "/public/shivi.csv";
    var stream = fs.createReadStream(csvfile);
    var products = []
    var csvStream = csv()
        .on("data", function (data) {
            console.log(data.Code, "%%%%%%%%%%%%%")
            var item = new Product_add({

                name: data.Code,

                price: data.Fuel_types_used_to_heat_dwellings,

                category: data.Occupied_private_dwellings

            });

            item.save(function (error) {

                console.log(item);

                if (error) {

                    throw error;

                }

            });

        }).on("end", function () {
            console.log(" End of file import");
        });

    stream.pipe(csvStream);

    res.json({ success: "Data imported successfully.", status: 200 });

})

passport.serializeUser(function (user, done) {
    done(null, user)
})
passport.deserializeUser(function (user, done) {
    done(null, user)
})

passport.use(
    new FacebookStrategy(
        {
            clientID: "310038456714340",
            clientSecret: "543400507e8a3bf8df25c27895c513c6",
            callbackURL: "http://localhost:4000/auth/facebook/callback",
        },
        function (accessToken, refreshToken, profile, cb) {
            return cb(null, profile)
        }
    )
)

app.get("/auth/facebook", passport.authenticate("facebook"))

app.get(
    "/auth/facebook/callback",
    passport.authenticate("facebook", { failureRedirect: "/" }),
    function (req, res) {
        console.log("req", req.user)
        res.redirect("/home_page")
        // res.render("wishlist.html", {
        //     user: req.user,
        // })
    }
)

app.get("/auth_with_google/google", passport.authenticate("google", {
    scope: ["profile", "email"]
}));

//vender
app.get("/vender_deshboard", (req, res) => {
    res.sendFile(path.join(__dirname + '/martfury/vendor-dashboard-free.html'));

})


//user
app.get("/users",(req,res)=>{
    res.render("admin/users")
})

//routeing
app.get("/home_page", (req, res, next) => {
    const visitor = user_session(req, res, next)
    console.log(visitor)
    product.find()
        .then((response) => {
            console.log(response);
            res.render("index_final", { data: response })
        });
});

//strip payment gateway
app.post(
    '/stripe-webhook',
    bodyParser.raw({ type: 'application/json' }),
    async (req, res) => {
        // Retrieve the event by verifying the signature using the raw body and secret.
        let event;
        try {
            event = stripe.webhooks.constructEvent(
                req.body,
                req.headers['stripe-signature'],
                "sk_test_51HtAh8EDs9i2NaF2rtkjg1tKYPpxv0m4HjLhDkqu9ZR8tuuypcFmVYvFtGP3jdpn2cGUyJqEoinLxJo89T5oHp0c00GvzqcoP0"
            );
        } catch (err) {
            console.log(err);
            console.log(`⚠️  Webhook signature verification failed.`);
            console.log(
                `⚠️  Check the env file and enter the correct webhook secret.`
            );
            return res.sendStatus(400);
        }
        // Extract the object from the event.
        const dataObject = event.data.object;

        // Handle the event
        // Review important events for Billing webhooks
        // https://stripe.com/docs/billing/webhooks
        // Remove comment to see the various objects sent for this sample
        switch (event.type) {
            case 'invoice.paid':
                // Used to provision services after the trial has ended.
                // The status of the invoice will show up as paid. Store the status in your
                // database to reference when a user accesses your service to avoid hitting rate limits.
                break;
            case 'invoice.payment_failed':
                // If the payment fails or the customer does not have a valid payment method,
                //  an invoice.payment_failed event is sent, the subscription becomes past_due.
                // Use this webhook to notify your user that their payment has
                // failed and to retrieve new card details.
                break;
            case 'customer.subscription.deleted':
                if (event.request != null) {
                    // handle a subscription cancelled by your request
                    // from above.
                } else {
                    // handle subscription cancelled automatically based
                    // upon your subscription settings.
                }
                break;
            default:
            // Unexpected event type
        }
        res.sendStatus(200);
    }
);



const stripe = require('stripe')('sk_test_51HtAh8EDs9i2NaF2rtkjg1tKYPpxv0m4HjLhDkqu9ZR8tuuypcFmVYvFtGP3jdpn2cGUyJqEoinLxJo89T5oHp0c00GvzqcoP0');

const productsz = stripe.products.create({
    name: 'Limited Edition T-Shirt',
    type: 'good',
    attributes: ['size', 'gender', 'color'],
    description: 'Super awesome, one-of-a-kind t-shirt',
});
app.get("/data", (req, res) => {
    res.send("shivani")
})

app.use("/", add_admin)
app.use("/", user_add)



/// tekeshwer apis 

app.listen(PORT, () => {
    console.log('Server is listening on Port:', PORT)
});