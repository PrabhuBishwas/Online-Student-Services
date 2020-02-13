const mongoose = require('mongoose');

var TripSchema = mongoose.Schema({
  name: {
    type: String
  },
  phone: {
    type: String
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

module.exports = mongoose.model('trip', TripSchema);
