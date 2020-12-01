var os = require('os');

var macs = () => {
    return JSON.stringify(os.networkInterfaces(), null, 2)
        .match(/"mac": ".*?"/g)
        .toString()
        .match(/\w\w:\w\w:\w\w:\w\w:\w\w:\w\w/g)
        ;
}

const crypto = require("crypto")

console.log(macs());


var fs = require('fs'),
    path = require('path');
function getMACAddresses() {
    var macs = {}
    var devs = fs.readdirSync('/sys/class/net/');
    devs.forEach(function (dev) {
        var fn = path.join('/sys/class/net', dev, 'address');
        if (dev.substr(0, 3) == 'eth' && fs.existsSync(fn)) {
            macs[dev] = fs.readFileSync(fn).toString().trim();
        }
    });
    return macs;
}

console.log(getMACAddresses());

var machineHash = crypto.createHash('md5').update(os.hostname()).digest('binary');
console.log(machineHash)



const mongoose = require("mongoose")
const schema = mongoose.Schema
var Float = require('mongoose-float').loadType(mongoose);


const cartProduct = new schema({
    count_products: {
        type: Number
    },
    cart_total_price: {
        type: Float
    }, userEmail: {
        type: String,
        required: true,
    }, cart_product: {
        type: mongoose.Schema.Types.ObjectId,
        ref: "Product"
    }
})

const carts = mongoose.model("User_Cart", cartProduct)

module.exports = carts
