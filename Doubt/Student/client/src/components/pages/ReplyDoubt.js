import React, {useContext, useEffect} from 'react';
import Reply from '../reply/Reply';
import ReplyForm from '../reply/ReplyForm';
import ReplyFilter from '../reply/ReplyFilter';
import AuthContext from '../../context/auth/authContext';

const ReplyDoubt = () => {
  const authContext = useContext(AuthContext);

  useEffect(() => {
    authContext.loadUser();
    // eslint-disable-next-line
  }, []);

  return (
    <div className="grid-2">
     <div>
      <ReplyForm />
     </div>
     <div>
      <ReplyFilter />
      <Reply />
     </div>
    </div>
  )
}

export default ReplyDoubt
