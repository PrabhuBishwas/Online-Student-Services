import React, { Fragment, useContext } from 'react';
import PropTypes from 'prop-types';
import { Link } from 'react-router-dom';
import AuthContext from '../../context/auth/authContext';
import DoubtContext from '../../context/doubt/doubtContext';

const Navbar = ({title, icon}) => {
  const authContext = useContext(AuthContext);
  const doubtContext = useContext(DoubtContext);

  const { isAuthenticated, logout, user } = authContext;
  const { clearDoubts } = doubtContext;

  const onLogout = () => {
    logout();
    clearDoubts();
  };

  const authLinks = (
     <Fragment>
     <li>
       <a href="http://localhost/BOOKSTRAP/home.php">Book</a>
     </li>
     <li>
       <a href="http://localhost:5001/triplist">Trip</a>
     </li>
     <li>
       <a href="http://localhost:5000/api/doubts/display">Doubt</a>
     </li>
     <li>
       <Link to='/'>Home</Link>
     </li>
     <li>
       <Link to='/about'>About</Link>
     </li>
       <li>Hello {user && user.name}</li>
       <li>
         <a onClick={onLogout} href='#!'>
           <i className='fas fa-sign-out-alt' />{' '}
           <span className='hide-sm'>Logout</span>
         </a>
       </li>
     </Fragment>
   );

   const guestLinks = (
     <Fragment>
       <li>
         <Link to='/register'>Register</Link>
       </li>
       <li>
         <Link to='/login'>Login</Link>
       </li>
     </Fragment>
   );

   return (
     <div className='navbar bg-primary'>
       <h1>
         <i className={icon} /> {title}
       </h1>
       <ul>{isAuthenticated ? authLinks : guestLinks}</ul>
     </div>
   );
 };


Navbar.propTypes = {
  title: PropTypes.string.isRequired,
  icon: PropTypes.string,
}
Navbar.defaultProps= {
  title: 'Student Service',
  icon: 'fa fa-graduation-cap'
}
export default Navbar
