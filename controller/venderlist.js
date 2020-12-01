var venderModal = require('../models/addvender')
var url = require('url')

exports.sellerlist = (req, res) => {
    venderModal.find().exec((err, data) => {
        if (err) {
            console.log('seller list not found')
        }
        if (data.length == 0) {
            res.send('seller list empty')
        }
        else {
            res.json(data)
        }
    })
};

exports.sellerDelete = (req, res) => {
    var email = url.parse(req.url, true).query.email;
    console.log(email)
    venderModal.deleteOne({ "email": email }).exec((err, data) => {
        if (err) {
            console.log('seller is not delete')
        }
        res.json({ userstatus: 'seller is delete' })
    })
}


exports.sellerStatus = (req, res) => {
    var sellerdata = url.parse(req.url, true).query
    console.log(sellerdata)

    if (sellerdata.status == 0) {
        venderModal.updateOne({ "_id": sellerdata.id }, { $set: { "status": 1 } }).exec((err, data) => {
            if (err) {
                console.log('seller status is 0 , block')
            }
            res.json({ userstatus: 'seller status is 1 , verify' })
        })
    }

    else if (sellerdata.status == 1) {
        venderModal.updateOne({ "_id": sellerdata.id }, { $set: { "status": 0 } }).exec((err, data) => {
            if (err) {
                console.log('seller is 1, verify')
            }
            res.json({ userstatus: 'seller status is 0 , block' })
        })
    }
}

exports.getsellerUpdate = (req, res) => {
    venderModal.find().exec((err, data) => {
        if (err) {
            res.send('seller list not found')
        }
        if (data.length == 0) {
            res.send('seller list empty')
        }
        else {
            res.json(data)
        }
    })
}

exports.sellerUpdate = (req, res) => {
    var sellerDetails = req.body;
    console.log(sellerDetails)
    venderModal.updateMany({ "email": sellerDetails.email }, { $set: { "name": sellerDetails.name, "phone": sellerDetails.phone } }).exec((err, data) => {
        if (err) {
            res.send('seller is not update')
        }
        else {
            res.send('seller details is update')
        }
    })
}