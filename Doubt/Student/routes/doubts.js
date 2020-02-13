const express = require('express');
const router = express.Router();
const auth = require('../middleware/auth');
const { check, validationResult } = require('express-validator/check');

const User = require('../models/User');
const Doubt = require('../models/Doubt');

// @route     GET api/contacts
// @desc      Get all users contacts
// @access    Private
router.get("/display", (req, res) => {
  Doubt.find({}, function(err, doubts){
    res.render("doubt", {
      doubts: doubts
      });
  });
});

router.get("/display/:doubtId", function(req, res){

const requestedPostId = req.params.doubtId;

  Doubt.findOne({_id: requestedPostId}, function(err, doubt){
    res.render("post", {
      title: doubt.title,
      desc: doubt.desc,
      type: doubt.type
    });
  });

});

router.get('/', auth, async (req, res) => {
  try {
    const doubts = await Doubt.find({ user: req.user.id }).sort({
      date: -1
    });
    res.json(doubts);
  } catch (err) {
    console.error(err.message);
    res.status(500).send('Server Error');
  }
});

// @route     POST api/contacts
// @desc      Add new contact
// @access    Private
router.post(
  '/',
  [
    auth,
    [
      check('title', 'Title is required')
        .not()
        .isEmpty()
    ]
  ],
  async (req, res) => {
    const errors = validationResult(req);
    if (!errors.isEmpty()) {
      return res.status(400).json({ errors: errors.array() });
    }

    const { title, desc, type } = req.body;

    try {
      const newDoubt = new Doubt({
        title,
        desc,
        type,
        user: req.user.id
      });

      const doubt = await newDoubt.save();

      res.json(doubt);
    } catch (err) {
      console.error(err.message);
      res.status(500).send('Server Error');
    }
  }
);

// @route     PUT api/contacts/:id
// @desc      Update contact
// @access    Private
router.put('/:id', auth, async (req, res) => {
  const { title, desc, type } = req.body;

  // Build contact object
  const doubtFields = {};
  if (title) doubtFields.title = title;
  if (desc) doubtFields.desc = desc;
  if (type) doubtFields.type = type;

  try {
    let doubt = await Doubt.findById(req.params.id);

    if (!doubt) return res.status(404).json({ msg: 'Doubt not found' });

    // Make sure user owns contact
    if (doubt.user.toString() !== req.user.id) {
      return res.status(401).json({ msg: 'Not authorized' });
    }

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

// @route     DELETE api/contacts/:id
// @desc      Delete contact
// @access    Private
router.delete('/:id', auth, async (req, res) => {
  try {
    let doubt = await Doubt.findById(req.params.id);

    if (!doubt) return res.status(404).json({ msg: 'Doubt not found' });

    // Make sure user owns contact
    if (doubt.user.toString() !== req.user.id) {
      return res.status(401).json({ msg: 'Not authorized' });
    }

    await Doubt.findByIdAndRemove(req.params.id);

    res.json({ msg: 'Doubt removed' });
  } catch (err) {
    console.error(err.message);
    res.status(500).send('Server Error');
  }
});

module.exports = router;
