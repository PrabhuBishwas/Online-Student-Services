import React, { useContext, useEffect } from 'react';
import Doubts from '../doubts/Doubts';
import DoubtForm from '../doubts/DoubtForm';
import DoubtFilter from '../doubts/DoubtFilter';
import AuthContext from '../../context/auth/authContext';

const DForm = () => {
  const authContext = useContext(AuthContext);

  useEffect(() => {
    authContext.loadUser();
    // eslint-disable-next-line
  }, []);

  return (
    <div className="grid-2">
     <div> 
      <DoubtForm />
     </div>
     <div>
      <DoubtFilter />
      <Doubts />
     </div>
    </div>
  )
}

export default DForm
