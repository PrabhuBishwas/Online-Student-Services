import React, {useContext, useRef, useEffect} from 'react'
import ReplyContext from '../../context/reply/doubtContext';

const ReplyFilter = () => {
  const doubtContext = useContext(ReplyContext);
  const text = useRef('');

  const {filterDoubts, clearFilter, filtered} = doubtContext;
  useEffect(() => {
    if(filtered === null){
      text.current.value = '';
    }
  });

  const onChange = e => {
    if(text.current.value !== ''){
      filterDoubts(e.target.value);
    }else{
      clearFilter();
    }
  }
  return (
    <form>
    <input ref = {text} type="text" placeholder="Filter reply..."
    onChange={onChange}/>
    </form>
  )
}

export default ReplyFilter
