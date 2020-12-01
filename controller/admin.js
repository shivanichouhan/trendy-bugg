// const { errorHandler } = require('../helpers/dbErrorHandler');
var url = require('url');
var path = require('path')
var registerModal = require('../models/register')
var venderModal = require('../models/addvender');
var supercategoryModal = require('../models/supercategory')


exports.findUser = (req, res) => {
    registerModal.find().exec((err, data) => {
        console.log(data)
        if (err) {
            console.log('user list not found')
        }
        res.json(data)
    })
};

exports.userStatus = (req, res) => {
    var userdata = url.parse(req.url, true).query
    console.log(userdata)

    if (userdata.status == 0) {
        registerModal.updateOne({ "_id": userdata.id }, { $set: { "status": 1 } }).exec((err, data) => {
            if (err) {
                console.log('user status is 0 , block')
            }
            res.json({ userstatus: 'user status is 1 , verify' })
        })
    }

    else if (userdata.status == 1) {
        registerModal.updateOne({ "_id": userdata.id }, { $set: { "status": 0 } }).exec((err, data) => {
            if (err) {
                console.log('user is 1, verify')
            }
            res.json({ userstatus: 'user status is 0 , block' })
        })
    }
};

exports.userDelete = (req, res) => {
    var userId = url.parse(req.url, true).query.id
    console.log(userId)
    registerModal.deleteOne({ "_id": userId }).exec((err, data) => {
        if (err) {
            console.log('user is not delete')
        }
        res.json({ userstatus: 'user data delete' })
    })
}

exports.addSeller = (req, res) => {
    var venderObj = req.body;
    var venderDetails = {};
    venderDetails.name = venderObj.name;
    venderDetails.email = venderObj.email;
    venderDetails.phone = venderObj.phone;
    venderDetails.postcode = venderObj.postcode;
    venderDetails.password = venderObj.password;
    venderDetails.seller_id = venderObj.seller_id;
    venderDetails.status = 0;

    venderModal.find({ "email": venderDetails.email }).exec((err, data) => {
        if (data.length == 0) {
            var addVender = new venderModal(venderDetails)
            console.log(addVender)
            addVender.save(function (err, data) {
                if (err) {
                    console.log('add seller failed')
                }
                res.json({ seller: 'seller add successfully' })
            })
        }
        else {
            res.json({ exist: 'this seller is already exist' })
        }
    })


};

exports.addsupercategory = (req, res) => {
    var supercatname = req.body.supercatname;
    console.log(supercatname)
    supercategoryModal.find({ "supercatname": supercatname }).exec((err, data) => {
        if (err) {
            res.send('supercategory not found')
        }
        else {
            if (data.length == 0) {
                var image = req.file.filename;
                var categoryInfo = {}
                categoryInfo.supercatname = supercatname;
                categoryInfo.image = image;
                console.log(categoryInfo)
                var supercategoryObj = new supercategoryModal(categoryInfo)

                supercategoryObj.save(function (err, data) {
                    if (err) {
                        console.log('supercategory is not add')
                    }
                    res.json({ category: 'supercategory is added' })
                })
            }
            else {
                    res.send({category:"supercategory is already exist"})
            }
        }
    })
};

exports.Deletesupercategory = (req, res) => {
    console.log(req.body)
    supercategoryModal.deleteOne({ "supercatname": req.body.supercatname }).exec((err, data) => {
        if (err) {
            console.log('supercategory is not delete')
        }
        res.json({ category: 'supercategory is delete' })
    })
}

exports.Updatesupercategory = (req, res) => {
    supercategoryModal.updateOne({ "_id": req.body.id },{$set:{"supercatname":req.body.supercatname}}).exec((err, data) => {
        if (err) {
            console.log('supercategory is not update')
        }
        res.json({ userstatus: 'supercategory is update' })
    })
}                               


