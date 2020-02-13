//jshint esversion: 6
const express = require('express');
const bodyParser = require('body-parser');
const ejs = require('ejs');
const mongoose = require('mongoose');

const app = express();

app.use(bodyParser.urlencoded({extended: true}));
app.set('view engine', 'ejs');
app.use(express.static("public"));

mongoose.connect("mongodb://localhost:27017/blogDB", {useNewUrlParser: true});

var tripSchema = mongoose.Schema({
  name: {
    type: String
  },
  phone: {
    type: Number
  },
  date: {
    type: Date
  },
  time: {
    type: String
  },
  from: {
    type: String
  },
  to: {
    type: String
  }
});
const Trip = mongoose.model("Trip", tripSchema);

app.get("/triplist", function(req, res){
  Trip.find({}, function(err, trips){
    res.render("submitTrip", {
      trips: trips
      });
  });
});

app.get("/shareTrip", function(req, res){
  res.render('shareDB');
});

app.post('/triplist',  function(req, res){
  const { name, phone, date, time, from, to } = req.body;


    const newTrip = new Trip({
      name,
      phone,
      date,
      time,
      from,
      to
    });

    newTrip.save(function(err){
   if (!err){
   res.redirect("/triplist");
   }
   });

});

app.listen(5001, function(){
  console.log("Server is running on port 5001");
});
