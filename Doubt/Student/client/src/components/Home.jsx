import React, { Component, useContext, useEffect } from 'react'
import { Link } from 'react-router-dom';
import { Jumbotron, Container, Row, Col, Image, Button } from 'react-bootstrap';
import './Home.css';
import AuthContext from '../context/auth/authContext';

const Home = () => {
  const authContext = useContext(AuthContext);

  useEffect(() => {
    authContext.loadUser();
    // eslint-disable-next-line
  }, []);

    return (
      <Container>
        <Jumbotron>
          <h2>Welcome</h2>
          <p>If you are waiting to buy or sell old books or you are planning a trip and you are alone and want the company of the people
          who are planning for same or you have a doubt and want to share with others then you are at right place. Here you will get
          these amenities.</p>
          <Link to="/about">
            <Button bsStyle="primary">Learn More</Button>
          </Link>
        </Jumbotron>
        <Row className="show-grid text-center row">
          <Col xs={12} sm={4} className="person-wrapper col">
            <Image src="assets/Book.jpg" circle className="profile-pic"/>
            <h3>Books</h3>
            <p>Sell or buy some old books of yours</p>
          </Col>
          <Col xs={12} sm={4} className="person-wrapper col">
            <Image src="assets/Trip.jpg" circle className="profile-pic"/>
            <h3>Plan Your Trip</h3>
            <p>Submit your trip details</p>
          </Col>
          </Row>
          <Row className="show-grid text-center row">
          <Col xs={12} sm={4} className="person-wrapper col">
            <Image src="assets/back.jpg" circle className="profile-pic"/>
            <h3>Doubt</h3>
            <p>Ask doubts and get resolved</p>
          </Col>
        </Row>
      </Container>
    )
  }

export default Home
