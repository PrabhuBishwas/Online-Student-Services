import React, { Fragment, Component } from 'react';
import { BrowserRouter as Router, Route, Switch } from 'react-router-dom';
import Navbar from './components/layout/Navbar';
import DForm from './components/pages/DForm';
import ReplyDoubt from './components/pages/ReplyDoubt';
import Register from './components/auth/Register';
import Login from './components/auth/Login';
import Alerts from './components/layout/Alerts';
import './App.css';
import DoubtState from './context/doubt/DoubtState';
import ReplyState from './context/reply/DoubtState';
import AuthState from './context/auth/AuthState';
import AlertState from './context/alert/AlertState';
import setAuthToken from './utils/setAuthToken';
import PrivateRoute from './components/routing/PrivateRoute';
import Home from './components/Home';
import About from './components/About';
import BookHome from './components/pages/BookHome';
import BookUpload from './components/pages/BookUpload';
import DisplayBook from './components/pages/DisplayBook';

if (localStorage.token) {
  setAuthToken(localStorage.token);
}

const App=() => {
  return (
    <AuthState>
    <ReplyState>
    <DoubtState>
    <AlertState>
    <Router>
    <Fragment>
      <Navbar />
      <div className="container">
      <Alerts />
       <Switch>
       <PrivateRoute exact path="/bookupload" component={BookUpload} />
       <PrivateRoute exact path="/doubt" component={DForm} />
       <PrivateRoute exact path="/" component={Home} />
       <PrivateRoute exact path="/reply" component={ReplyDoubt} />
       <PrivateRoute exact path='/about' component={About} />
       <Route exact path='/register' component={Register} />
       <Route exact path='/login' component={Login} />
       </Switch>
      </div>
    </Fragment>
    </Router>
    </AlertState>
    </DoubtState>
    </ReplyState>
    </AuthState>
  );
}

export default App;
