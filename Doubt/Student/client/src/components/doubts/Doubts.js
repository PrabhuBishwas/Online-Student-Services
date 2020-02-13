import React, { Fragment, useContext, useEffect } from 'react';
import { CSSTransition, TransitionGroup } from 'react-transition-group';
import DoubtItem from './DoubtItem';
import Spinner from '../layout/Spinner';
import DoubtContext from '../../context/doubt/doubtContext';

const Doubts = () => {
  const doubtContext = useContext(DoubtContext);

  const { doubts, filtered, getDoubts, loading } = doubtContext;

  useEffect(() => {
    getDoubts();
    // eslint-disable-next-line
  }, []);

  if (doubts !== null && doubts.length === 0 && !loading) {
    return <h4>Please add a doubt</h4>;
  }

  return (
    <Fragment>
      {doubts !== null && !loading ? (
        <TransitionGroup>
          {filtered !== null
            ? filtered.map(doubt => (
                <CSSTransition
                  key={doubt._id}
                  timeout={500}
                  classNames='item'
                >
                  <DoubtItem doubt={doubt} />
                </CSSTransition>
              ))
            : doubts.map(doubt => (
                <CSSTransition
                  key={doubt._id}
                  timeout={500}
                  classNames='item'
                >
                  <DoubtItem doubt={doubt} />
                </CSSTransition>
              ))}
        </TransitionGroup>
      ) : (
        <Spinner />
      )}
    </Fragment>
  );
};

export default Doubts;
