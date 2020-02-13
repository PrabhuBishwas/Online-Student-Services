import React, { useContext , Fragment, useEffect} from 'react';
import './DisplayBook.css';

const DisplayBook = () => {

   return (
     <div>
     <form>
     <select name='sort'>
          <option value='0'>Sort</option>
          <option value='1'>Price high to Low</option>
          <option value='2'>Price Low to High</option>
          <option value='3'>Latest</option>
     </select>
 </form>

 <div className="cont">

 <img className="image" alt="Book" src="" />


 <div className="overlay">
 <div className="text">


 <br/>

 <a href=""><button>Buy Now</button></a><br/><br/>

 <center>

 <form>

 <input hidden name="bid" type="text" value='abc' />

 <button type="submit" name="submit">Add to Cart</button>
 </form>

 </center>

 </div>
 </div>

 <center></center>
 <center className="abc">&#x20b9;</center>


 </div>
 </div>
   )
}

export default DisplayBook
