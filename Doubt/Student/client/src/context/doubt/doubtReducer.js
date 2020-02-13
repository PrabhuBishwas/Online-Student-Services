import {
  GET_DOUBTS,
  ADD_DOUBT,
  DELETE_DOUBT,
  SET_CURRENT,
  CLEAR_CURRENT,
  UPDATE_DOUBT,
  FILTER_DOUBTS,
  CLEAR_FILTER,
  DOUBT_ERROR,
  CLEAR_DOUBTS
} from '../types';

export default (state, action) => {
  switch(action.type) {
    case GET_DOUBTS:
      return {
        ...state,
        doubts: action.payload,
        loading: false
      };
    case ADD_DOUBT:
        return {
          ...state,
          doubts: [action.payload, ...state.doubts ],
          loading: false
        };
    case UPDATE_DOUBT:
      return {
        ...state,
        doubts: state.doubts.map(doubt =>
        doubt._id === action.payload._id ? action.payload : doubt,
      ),
      loading: false
    };
    case DELETE_DOUBT:
        return{
          ...state,
          doubts: state.doubts.filter(doubt => doubt._id !== action.payload),
          loading: false
        };
    case CLEAR_DOUBTS:
          return {
            ...state,
            doubts: null,
            filtered: null,
            error: null,
            current: null
          };
    case SET_CURRENT:
    return {
      ...state,
      current: action.payload
    };
    case CLEAR_CURRENT:
    return {
      ...state,
      current: null
    };
    case FILTER_DOUBTS:
     return {
       ...state,
       filtered: state.doubts.filter(doubt => {
         const regex = new RegExp(`${action.payload}`, 'gi');
          return doubt.title.match(regex) || doubt.desc.match(regex);
       })
     };
     case CLEAR_FILTER:
     return {
       ...state,
       filtered: null
     };
     case DOUBT_ERROR:
      return {
        ...state,
        error: action.payload
      };
    default:
       return state;
  }
}
