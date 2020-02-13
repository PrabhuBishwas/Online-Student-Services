<?php

if(isset($_POST['submit']))
{

    require_once("connection.php");

    $cardno = $_POST['cardno'];
    $cvvno = $_POST['cvvno'];
    $name = $_POST['name'];
    $amount = $_POST['amt'];
    $sql5 = "select * from card where cardno = '$cardno'";
    $row5 = $conn->query($sql5);
    $result5 = mysqli_fetch_array($row5);
    
    
    
        echo mysqli_error($conn);

    
    
   // echo $result5['cvvno'];
    
    if($result5['cvvno']==$cvvno && $result5['cardno']==$cardno && $result5['name']==$name)
    {
        /////////////////////g///////////////////
        
        
        
            
function generateNumericOTP($n) { 
      

    $generator = "1357902468"; 
  
    $result = ""; 
  
    for ($i = 1; $i <= $n; $i++) { 
        $result .= substr($generator, (rand()%(strlen($generator))), 1); 
    } 
  
 
    return $result; 
} 

$n = 6;
//echo generateNumericOTP($n);

$otp = generateNumericOTP($n);

//echo $otp;

//sleep(10);


	// Authorisation details.
	$username = "koushalkishorkapri@gmail.com";
	$hash = "265cbe2e20b033190c4878301d0f534e40463dae6f32a97e6eea01752e058b28";

	
	$test = "0";


	$sender = "TXTLCL"; 
	$numbers = ''.$result5['mobile'].''; 
	$message = ''.$otp.'';
	
	$message = urlencode($message);
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('http://api.textlocal.in/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); // This is the result from the API
	curl_close($ch);
        
        
        
    session_start();       
            
            $_SESSION['otp'] = $otp;
        header("Refresh:0,url=otp_check.php");
        
        
        
        
        
        
        //////////////////g/////////////////////
    }
    
    
    
    else
    {
        echo "details not correct";
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    

}
else
{
    echo "not submitted";
}

?>