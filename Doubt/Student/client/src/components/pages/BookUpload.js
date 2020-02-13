import React, { useContext , Fragment, useEffect} from 'react';
import './BookUpload.css';

const BookUpload = () => {

  return (
    <div>
    <div className="container-fluid bg_im">

    <center>
        <h2>Enter book info:</h2>
    </center>
    <center>

            <form>
                <p>&emsp;Title : <input type="text" name="title" required  /></p>
                <p>Details : <input type="text" name="details" required /></p>
                <p>&emsp;Price : <input type="number" name="price" required /></p>
                <p>Quantity : <input type="number" name="qty" value={1} required /></p>
                <p>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;Photo : <input type="file" name="photo" required /></p>
                <p><button type="submit" name="submit" value="submit" class="button_design">Upload</button></p>
            </form>

    </center>
</div>
    </div>
  )
}

export default BookUpload
