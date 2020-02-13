import React, { useReducer } from 'react';
import axios from 'axios';

import DoubtContext from './doubtContext';
import doubtReducer from './doubtReducer';
import {
  GET_DOUBTS,
  ADD_DOUBT,
  DELETE_DOUBT,
  SET_CURRENT,
  CLEAR_CURRENT,
  UPDATE_DOUBT,
  FILTER_DOUBTS,
  CLEAR_DOUBTS,
  CLEAR_FILTER,
  DOUBT_ERROR
} from '../types';

const DoubtState = props => {
  const initialState = {
    doubts: null,
    current: null,
    filtered: null,
    error: null
  };

  const [state, dispatch] = useReducer(doubtReducer, initialState);

  // Get Contacts
  const getDoubts = async () => {
    try {
      const res = await axios.get('/api/doubts');

      dispatch({
        type: GET_DOUBTS,
        payload: res.data
      });
    } catch (err) {
      dispatch({
        type: DOUBT_ERROR,
        payload: err.response.msg
      });
    }
  };

  // Add Contact
  const addDoubt = async doubt => {
    const config = {
      headers: {
        'Content-Type': 'application/json'
      }
    };

    try {
      const res = await axios.post('/api/doubts', doubt, config);

      dispatch({
        type: ADD_DOUBT,
        payload: res.data
      });
    } catch (err) {
      dispatch({
        type: DOUBT_ERROR,
        payload: err.response.msg
      });
    }
  };

  // Delete Contact
  const deleteDoubt = async id => {
    try {
      await axios.delete(`/api/doubts/${id}`);

      dispatch({
        type: DELETE_DOUBT,
        payload: id
      });
    } catch (err) {
      dispatch({
        type: DOUBT_ERROR,
        payload: err.response.msg
      });
    }
  };

  // Update Contact
  const updateDoubt = async doubt => {
    const config = {
      headers: {
        'Content-Type': 'application/json'
      }
    };

    try {
      const res = await axios.put(
        `/api/doubts/${doubt._id}`,
        doubt,
        config
      );

      dispatch({
        type: UPDATE_DOUBT,
        payload: res.data
      });
    } catch (err) {
      dispatch({
        type: DOUBT_ERROR,
        payload: err.response.msg
      });
    }
  };

  // Clear Contacts
  const clearDoubts = () => {
    dispatch({ type: CLEAR_DOUBTS });
  };

  // Set Current Contact
  const setCurrent = doubt => {
    dispatch({ type: SET_CURRENT, payload: doubt });
  };

  // Clear Current Contact
  const clearCurrent = () => {
    dispatch({ type: CLEAR_CURRENT });
  };

  // Filter Contacts
  const filterDoubts = text => {
    dispatch({ type: FILTER_DOUBTS, payload: text });
  };

  // Clear Filter
  const clearFilter = () => {
    dispatch({ type: CLEAR_FILTER });
  };

  return (
    <DoubtContext.Provider
      value={{
        doubts: state.doubts,
        current: state.current,
        filtered: state.filtered,
        error: state.error,
        addDoubt,
        deleteDoubt,
        setCurrent,
        clearCurrent,
        updateDoubt,
        filterDoubts,
        clearFilter,
        getDoubts,
        clearDoubts
      }}
    >
      {props.children}
    </DoubtContext.Provider>
  );
};

export default DoubtState;
