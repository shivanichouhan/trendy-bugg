const mongoose = require("mongoose")
const schema = mongoose.Schema
var Float = require('mongoose-float').loadType(mongoose);




const user_login_schema = new schema({
    email: {
        type: String,
        trim: true,
        lowercase: true,
        // unique: true,
        match: [/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/, 'Please fill a valid email address']
    },
    password: {
        type: String,
        default: ''
    },
    state: {
        type: String
    },
    city: {
        type: String
    },
    district: {
        type: String
    }, subject: {
        type: String
    },
    otp: {
        type: String,
        default: ''
    }, accessToken: {
        type: String
    },
    image: {
        data: Buffer,
        contentType: String,
        default: ""
    },
    country: {
        type: String
    }, is_allow: {
        type: Number,
        enum: [0, 1],
        default: 0
    }, user_status: {
        type: Number,
        enum: [0, 1],
        default: 0
    },
    wallet: {
        type: Float,
        default: 0
    },
    user_saring_code: {
        type: String
    },
    user_role_status: {
        type: Number
    }, subscriber: [{
        type: schema.Types.ObjectId,
        ref: 'subscriber'
    }]
}, { strict: false });
var detail = mongoose.model("users  ", user_login_schema)
module.exports = detail
// console.log(typeof)



// <% les_data.forEach(function(lession){%>
//     <% if(lession.url){%>
// <%}else if(lession.content){%>
// <%}%>
/*									<%=error.course_name%>
    				<h1><%=error.teacher_name%></h1>
                    <% chep.forEach(function(chepter){%>
                        <% var les_data = chepter.chepter_lession %>
                                <% var le_count = 1%>
                                <%=le_count%>
                                <%=le_count%>
                                <%=lession.url%> */
