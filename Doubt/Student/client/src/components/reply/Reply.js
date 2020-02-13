import React, { Fragment, useState, useContext, useEffect } from 'react';
import ReplyItem from './ReplyItem';
import Spinner from '../layout/Spinner';
import ReplyContext from '../../context/reply/doubtContext';
import { CSSTransition, TransitionGroup } from 'react-transition-group';

const Reply = () => {
  const replyContext = useContext(ReplyContext);

  const { doubts, filtered, getDoubts, loading } = replyContext;

  useEffect(() => {
    getDoubts();
    // eslint-disable-next-line
  }, []);

  if (doubts !== null && doubts.length === 0 && !loading) {
    return <h4>Please add a reply</h4>;
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
                  classNames='reply'
                >
                  <ReplyItem doubt={doubt} />
                </CSSTransition>
              ))
            : doubts.map(doubt => (
                <CSSTransition
                  key={doubt._id}
                  timeout={500}
                  classNames='item'
                >
                  <ReplyItem doubt={doubt} />
                </CSSTransition>
              ))}
        </TransitionGroup>
      ) : (
        <Spinner />
      )}
    </Fragment>
  );
};

export default Reply;
