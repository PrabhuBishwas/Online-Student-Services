import React, { useContext , Fragment, useEffect} from 'react';
import './BookHome.css';

const BookHome = () => {
  window.onload = () => {
    var elem = document.getElementById("textinimage");
    var pos = 400;
    var id = setInterval(frame, 20);

    function frame() {
        if (pos == 450) {
            clearInterval(id);
        } else {
            pos++;
            elem.style.right = pos + "px";
        }
    }
  }

  return(
<div>
<div id="bigimage">

    <img className="imstyle" src="assets/library.jpg" />
    <div id="textinimage">
        <h1 className="hstyle">"The world is quiet here"</h1>
        <button className = "btn btn-primary btn-lg"><a href="/BookDisplay">Book</a></button>
        <button className="btn btn-primary btn-lg">Upload</button>
        <button className="btn btn-primary btn-lg">Cart</button>
    </div>
    <div id="cart2">
    <p>hello</p>
    </div>
</div>
<div className="clel"></div>
<hr />
<div id="footer">
    <center><p>Made with ❤️ by &copy; Prabhu &amp; Jaydeep 2019</p></center>
</div>
</div>
)
}
export default BookHome
