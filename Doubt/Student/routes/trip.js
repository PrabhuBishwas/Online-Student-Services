//jshint esversion: 6
/*const express = require('express');
const bodyParser = require('body-parser');
const ejs = require('ejs');
const _ = require('lodash');
const mongoose = require('mongoose');

const app = express();
app.use(bodyParser.urlencoded({extended: true}));
app.set('view engine', 'ejs');
app.use(express.static("public"));

let posts = [];

app.get("/trips", function(req, res){
  res.render('submitTrip');
});

app.get("/information", function(req, res){
  res.render('shareDB');
});

app.post("/information", function(req, res){
  const comp = {
    Name: req.body.Name,
    phone: req.body.phone,
    date: req.body.date,
    time: req.body.time,
    from: req.body.from,
    to: req.body.to
  };
  posts.push(comp);
  res.redirect("/trips");
});
*/
const express = require('express');
const router = express.Router();
const mongoose = require('mongoose');

//var User = require('../models/tripModel');
//mongoose.connect("mongodb://localhost:27017/tripDB", {useNewUrlParser: true});

//var db = mongoose.connection;

const Trip = require('../models/tripModel');

router.get("/triplist", function(req, res){
  Trip.find({}, function(err, trips){
    res.render("submitTrip", {
      trips: trips
      });
  });
});

router.get("/shareTrip", function(req, res){
  res.render('shareDB');
});

router.post('/triplist',  function(req, res){
  const { name, phone, date, time, from, to } = req.body;

  try {
    const newTrip = new Trip({
      name,
      phone,
      date,
      time,
      from,
      to
    });

    const trip =  newTrip.save();

    res.json(doubt);
  } catch (err) {
    console.error(err.message);
    res.status(500).send('Server Error');
  }
      res.redirect('/api/trip/triplist');

});

module.exports = router;
