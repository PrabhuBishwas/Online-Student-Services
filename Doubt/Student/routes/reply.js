const express = require('express');
const router = express.Router();
const auth = require('../middleware/auth');
const { check, validationResult } = require('express-validator/check');

const User = require('../models/User');
const Doubt = require('../models/Doubt');

router.get('/', auth, async (req, res) => {
  try {
    const doubts = await Doubt.find().sort({
      date: -1
    });
    res.json(doubts);
  } catch (err) {
    console.error(err.message);
    res.status(500).send('Server Error');
  }
});

router.put('/:id', auth, async (req, res) => {
  const { title, desc, type, reply } = req.body;

  // Build contact object
  const doubtFields = {};
  if (title) doubtFields.title = title;
  if (desc) doubtFields.desc = desc;
  if (type) doubtFields.type = type;
  if (reply) doubtFields.type = reply;

  try {
    let doubt = await Doubt.findById(req.params.id);

    if (!doubt) return res.status(404).json({ msg: 'Doubt not found' });


    doubt = await Doubt.findByIdAndUpdate(
      req.params.id,
      { $set: doubtFields },
      { new: true }
    );

    res.json(doubt);
  } catch (err) {
    console.error(err.message);
    res.status(500).send('Server Error');
  }
});

module.exports = router;
