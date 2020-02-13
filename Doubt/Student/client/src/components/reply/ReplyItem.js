import React, {useContext} from 'react';
import PropTypes from 'prop-types';
import ReplyContext from '../../context/reply/doubtContext';

const ReplyItem = ({doubt}) => {
  const replyContext = useContext(ReplyContext);
  const {deleteDoubt, setCurrent, clearCurrent} = replyContext;

  const {_id, title, desc, type, reply}=doubt;

  const onDelete = () => {
    deleteDoubt(_id);
    clearCurrent();
  }
  const setCurr = () => {
    setCurrent(doubt);
  }
  return (
    <div className='card bg-light'>
      <h3 className="text-primary text-left">
       {title}{' '}</h3>
      <ul>
        {type && (<li>
        <i className="fas fa-envelope-open"></i> {type.slice(0, 25)}<span>...</span>
        </li>)}
      </ul>
      <p>
       <button className="btn btn-dark btn-sm" onClick={setCurr}>Edit</button>
      
      </p>
    </div>
  );
};

ReplyItem.propTypes = {
  doubt: PropTypes.object.isRequired
};

export default ReplyItem
