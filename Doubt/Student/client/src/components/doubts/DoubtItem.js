import React, {useContext} from 'react';
import PropTypes from 'prop-types';
import DoubtContext from '../../context/doubt/doubtContext';

const DoubtItem = ({doubt}) => {
  const doubtContext = useContext(DoubtContext);
  const {deleteDoubt, setCurrent, clearCurrent} = doubtContext;

  const {_id, title, desc, type}=doubt;

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
       {title}{' '}
      </h3>
      <ul>
        {desc && (<li>
        <i className="fas fa-envelope-open"></i> {desc.slice(0, 25)}<span>...</span>
        </li>)}
      </ul>
      <p>
       <button className="btn btn-dark btn-sm" onClick={setCurr}>Edit</button>
       <button className="btn btn-danger btn-sm" onClick={onDelete}>Delete</button>
      </p>
    </div>
  );
};

DoubtItem.propTypes = {
  doubt: PropTypes.object.isRequired
};

export default DoubtItem
