// const { errorHandler } = require('../helpers/dbErrorHandler');
var registerModal = require('../models/register')

exports.create = (req, res) => {
        // var registerObj = new registerModal(req.body)

        var userDetails = {}
        userDetails.name = req.body.name;
        userDetails.mob = req.body.mob;
        userDetails.status = 0;
        console.log(userDetails)
      
        var userDetailsObj = new registerModal(userDetails)

        userDetailsObj.save(function(err,data){
                if(err){
                    console.log('register failed')
                }
                res.json({data})
            })
};

