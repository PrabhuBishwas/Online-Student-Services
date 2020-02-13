import React, {useState, useContext, useEffect} from 'react'
import ReplyContext from '../../context/reply/doubtContext';

const ReplyForm = () => {
  const replyContext = useContext(ReplyContext);
  const {addDoubt, updateDoubt, clearCurrent, current} = replyContext;
  useEffect(() => {
    if(current!=null) {
      setDoubt(current);
    }else{
      setDoubt({
        title: '',
        desc: '',
        type: 'no',
        reply: ''
      });
    }
  }, [replyContext, current]);
  const [doubt, setDoubt] = useState({
    title: '',
    desc: '',
    type: 'no',
    reply: ''
  });

  const {title, desc, type, reply} = doubt;
  const onChange= e =>
  setDoubt({...doubt, [e.target.name]: e.target.value});

  const onSubmit = e => {
    e.preventDefault();
    if(current === null){
      addDoubt(doubt);
    }else{
      updateDoubt(doubt);
    }

    setDoubt({
      title: '',
      desc: '',
      type: 'no',
      reply: ''
    });
  };
 const clearAll = () => {
   clearCurrent();
 }

  return (
    <form onSubmit={onSubmit}>
      <h2 className='text-primary'>{current ? 'Edit Reply' : 'Add Reply'}</h2>
      <textarea placeholder="Reply" rows="10" name="reply" value={reply}
      onChange={onChange} />
      <div>
       <input type="submit" value={current ? 'Update Reply' : 'Add Reply'}
       className="btn btn-primary btn-block"/>
      </div>
      {current && <div>
      <button className = "btn btn-light btn-block" onClick={clearAll}>Clear</button>
      </div>}
      <br/>
      <div>
      <button className = "btn btn-success btn-block">
      <a href="http://localhost:5000/api/doubts/display">Display Doubts</a></button>
      </div>
    </form>
  );
};

export default ReplyForm;
