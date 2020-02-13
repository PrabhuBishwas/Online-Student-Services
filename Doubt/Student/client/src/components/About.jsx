import React, { Component, useContext, useEffect } from 'react'
import { Container, Col, Image } from 'react-bootstrap';
import './About.css';
import AuthContext from '../context/auth/authContext';

const About = () => {
  const authContext = useContext(AuthContext);

  useEffect(() => {
    authContext.loadUser();
    // eslint-disable-next-line
  }, []);

    return (
      <div>
        <Image src="assets/holiday.jpg" className="header-image" />
        <Container>

          <Col xs={12} sm={8} smOffset={2}>
            <Image src="assets/prabhu.jpg" className="about-profile-pic" rounded />

            <h3>Prabhu</h3>
            <center>
            <p>Third year Computer Science Engineering student of Vellore Institute of Technology has done the project for Internet and Web Programming
            under the guidance of Naveen Kumar N Sir</p>
            </center>
          </Col>
        </Container>
        <br/>
        <Container>
        <Col xs={12} sm={8} smOffset={2}>

        <Image src="assets/jay.jpg" className="about-profile-pic" rounded />
        <h3>Jaydeep</h3>
        <center>
        <p>Third year Computer Science Engineering student of Vellore Institute of Technology has done the project for Internet and Web Programming
        under the guidance of Naveen Kumar N Sir</p>
        </center>
        </Col>
      </Container>
      </div>
    )
  }

export default About
