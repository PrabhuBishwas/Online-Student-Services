const express = require("express");
const connectDB = require('./config/db');
var expressValidator = require('express-validator');

const app = express();

connectDB();


app.use(express.json({extended: false}));
app.set('view engine', 'ejs');
app.use(express.static("public"));


app.use('/api/users', require('./routes/users'));
app.use('/api/auth', require('./routes/auth'));
app.use('/api/doubts', require('./routes/doubts'));
app.use('/api/reply', require('./routes/reply'));
app.use('/api/trip', require('./routes/trip'));

app.get("/", (req, res)=>{
  res.render("Home");
});
app.listen(5000, function(){
  console.log("Server is running on port 5000");
});
