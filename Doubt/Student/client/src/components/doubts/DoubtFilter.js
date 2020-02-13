import React, {useContext, useRef, useEffect} from 'react'
import DoubtContext from '../../context/doubt/doubtContext';

const DoubtFilter = () => {
  const doubtContext = useContext(DoubtContext);
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
    <input ref = {text} type="text" placeholder="Filter doubt..."
    onChange={onChange}/>
    </form>
  )
}

export default DoubtFilter
