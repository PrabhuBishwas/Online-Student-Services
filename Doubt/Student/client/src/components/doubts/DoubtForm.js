import React, {useState, useContext, useEffect} from 'react'
import DoubtContext from '../../context/doubt/doubtContext';

const DoubtForm = () => {
  const doubtContext = useContext(DoubtContext);
  const {addDoubt, updateDoubt, clearCurrent, current} = doubtContext;
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
  }, [doubtContext, current]);
  const [doubt, setDoubt] = useState({
    title: '',
    desc: '',
    type: 'no'
  });

  const {title, desc, type} = doubt;
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
      type: 'no'
    });
  };
 const clearAll = () => {
   clearCurrent();
 }

  return (
    <form onSubmit={onSubmit}>
      <h2 className='text-primary'>{current ? 'Edit Doubt' : 'Add Doubt'}</h2>
      <input type="text" placeholder="Title" name="title" value={title}
      onChange={onChange} />
      <textarea placeholder="Desription" rows="10" name="desc" value={desc} onChange={onChange}/>
      <div>
       <input type="submit" value={current ? 'Update Doubt' : 'Add Doubt'}
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

export default DoubtForm;
