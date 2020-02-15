<?php 
  session_start();
  include 'config.php';
  //echo $_SESSION["S-email"];
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://v40.pingendo.com/assets/4.0.0/default/theme.css" type="text/css"> 
  <style> form p {color:red; float:inline-end;} </style> </head>

  
 <script type="text/javascript" language="Javascript">
	function confirm(form){
		var address1 = document.getElementsByName('address1')[0].value;
		var address2 = document.getElementsByName('address2')[0].value;
		var city = document.getElementsByName('city')[0].value;		
		var postalcode = document.getElementsByName('postalcode')[0].value;	
		var CCnumber = document.getElementsByName('CCnumber')[0].value;
		var cvc = document.getElementsByName('cvc')[0].value;
		var expdate = document.getElementsByName('expdate')[0].value;
		var CCType = document.getElementsByName('CCType')[0].value;

		if(address1.length == 0) {
			document.getElementById('head1').innerHTML = "*Please enter required info*";
			head1.scrollIntoView();
			return false;
		}

		if(checkaddress(address1, "*Enter valid address*")) {
			if(checkaddress(address2, "*Enter valid address*")) {
				if(checkcity(city,"*Enter city*")) {
					if(checkpostal(postalcode,"*Enter valid postal code*")) {
						if(checkccnum(CCnumber,"*Enter valid credit card*")) {
							if(checkcvv(cvc,"*Enter valid CVC number*")) {
								if(checkdate(expdate,"*Enter valid date*")) {
									if(checktype(CCType,"*Please choose*")) {
										return true;
		}
		}
		}
		}
		}
		}
		}
		}
			return false;
		
		function checkaddress(inputText,alert) {
			var alphanum = /^[0-9a-zA-Z ]+[^-]+$/;
			if(inputText.match(alphanum)){
				document.getElementById('head1').innerHTML = "";
				document.getElementById('head2').innerHTML = "";
				return true;
			}
			else if(inputText == address1) {
				document.getElementById('head1').innerHTML = alert;
				head.scrollIntoView();
				return false;
			}
			else {
				document.getElementById('head2').innerHTML = alert;
				head2.scrollIntoView();
				return false;
			}
		}

		function checkcity(inputText,alert) {
			var alphabet = /^[a-zA-Z ]+$/;	
			if(inputText.match(alphabet)) {
				document.getElementById('head3').innerHTML = "";
				return true;
			}
			else {
				document.getElementById('head3').innerHTML = alert;
				head3.scrollIntoView();
				return false;
			}
		}
		
		function checkpostal(inputText,alert) {
			var numeric = /^[0-9]+$/;
			if(inputText.match(numeric)) {
				if(inputText.length == 5) {
					document.getElementById('head4').innerHTML = "";
					return true;
				}
				else {
					head4.scrollIntoView();
					return false;
				}
			}
			else {
				document.getElementById('head4').innerHTML = alert;
				head4.scrollIntoView();
				return false;
			}
		}
		
		function checkccnum(inputText,alert) {
			var numeric = /^[0-9]+$/;
			if(inputText.match(numeric)) {
				if(inputText.length == 12) {
					document.getElementById('head5').innerHTML = "";
					return true;
				}
				else {
					head5.scrollIntoView();
					return false;
				}
			}
			else {
				document.getElementById('head5').innerHTML = alert;
				head5.scrollIntoView();
				return false;
			}
		}
		
		function checkcvv(inputText,alert) {
			var numeric = /^[0-9]+$/;
			if(inputText.match(numeric)) {
				if(inputText.length == 3) {
					document.getElementById('head6').innerHTML = "";
					return true;
				}
				else {
					head6.scrollIntoView();
					return false;
				}
			}
			else {
				document.getElementById('head6').innerHTML = alert;
				head6.scrollIntoView();
				return false;
			}
		}
		
		function checkdate(inputText,alert) {
			var numeric = /^[0-9]+$/;

			if(inputText.length == 5) {		//	05/19

				var mm = inputText.substr(0,2);
				var yr2 = inputText.substr(3,2);
					if(mm.match(numeric) && yr2.match(numeric)) {
						document.getElementsByName('expdate')[0].value = '20'+yr2+'-'+mm+'-'+'30';
						document.getElementById('head7').innerHTML = "";
						return true;
					}
					else {
						document.getElementById('head7').innerHTML = alert;
						head7.scrollIntoView();
						return false;						
					}
			}
			else if(inputText.length == 10) {     //	2018/01/30
				var year = inputText.substr(0,4);
				var month = inputText.substr(5,2);
				var date = inputText.substr(8,2);
					if(year.match(numeric) && month.match(numeric)) {
						if(date.match(numeric)) {
							document.getElementById('head7').innerHTML = "";
							return true;
						}
					}
					else {
						document.getElementById('head7').innerHTML = alert;
						head7.scrollIntoView();
						return false;						
					}
			}
			else {
				document.getElementById('head7').innerHTML = alert;
				head7.scrollIntoView();
				return false;
			}
		
		}
		
		function checktype(selection,alert) {
			if(selection.length == 0) {
				head8.scrollIntoView();
				document.getElementById('head8').innerHTML == alert;
				return false;
			}
			else {
				document.getElementById('head8').innerHTML == "";
				return true;
			}
		}
		
	}
 </script> 
  
<body>
  <div class="py-5" style="background-color: grey;">
    <div class="container">
      <div class="row">
        <div class="align-self-center col-md-6 text-white">
          <h1 class="text-center text-md-left display-3">Sparkle.lk</h1>
          <p class="lead">Why waiting if you can do it online?</p>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-body p-5">
              <h3 class="pb-3">Billing Information</h3>
			  
			  
              <form action="BillInfo.php" method="post" onsubmit="return confirm(this);">
                <div class="form-group">
                  <label for="exampleInputEmail1">Address Line1</label> <p id="head1"></p>
                  <input type="text" class="form-control" id="inlineFormInput" placeholder="Address line 1" name="address1"> </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Address Line2</label> <p id="head2"></p>
                  <input type="text" class="form-control" id="inlineFormInput" placeholder="Address line 2" name="address2"> </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">City</label> <p id="head3"></p>
                  <input type="text" class="form-control" id="inlineFormInput" placeholder="City" name="city"> </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">PostalCode</label> <p id="head4"></p>
                  <input type="text" class="form-control" id="inlineFormInput" placeholder="xxxxx" name="postalcode"> </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">CreditCardNumber</label> <p id="head5"></p>
                  <input type="text" class="form-control" id="inlineFormInput" placeholder="XXXXXXXXXXXX" name="CCnumber"> </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">CVC</label> <p id="head6"></p>
                  <input type="text" class="form-control" id="inlineFormInput" placeholder="xxx" name="cvc"> </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">ExpiaryDate</label> <p id="head7"></p>
                  <input type="text" class="form-control" id="inlineFormInput" placeholder="MM/YY" name="expdate"> </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Credit Card Type</label> <p id="head8"></p>
                  <select class="custom-control custom-select" name="CCType">
                    <option selected="" value="">Open this select menu</option>
                    <option value="visa">Visa</option>
                    <option value="americanExpress">AmericanExpress</option>
                    <option value="Mastercard">MasterCard</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Country : SriLanka Only</label>
                </div>
                <button type="submit" class="btn mt-2 btn-outline-dark" name = "submit">Submit</button>
              </form>
			  
			  
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <pingendo onclick="window.open('https://pingendo.com/', '_blank')" style="cursor:pointer;position: fixed;bottom: 10px;right:10px;padding:4px;background-color: #00b0eb;border-radius: 8px; width:250px;display:flex;flex-direction:row;align-items:center;justify-content:center;font-size:14px;color:white">Made with Pingendo Free&nbsp;&nbsp;
    <img src="https://pingendo.com/site-assets/Pingendo_logo_big.png" class="d-block" alt="Pingendo logo" height="16">
  </pingendo>
</body>

</html>


<?php

  if(isset($_POST["submit"]) === true)
  {
    $Address1 = $_POST["address1"];
    $Address2 = $_POST["address2"];
    $city = $_POST["city"];
    $postalCode = $_POST["postalcode"];
    $CCnumber = $_POST["CCnumber"];
    $cvc = $_POST["cvc"];
    $expiary = $_POST["expdate"];
    $CCType = $_POST["CCType"];
    $Address =  $Address1." ".$Address2." ".$city." ".$postalCode;
    
    //$sql = "UPDATE MyGuests SET lastname='Doe' WHERE id=2";
    $sql = "UPDATE user SET 
            Address = '".$Address."' , CardNumber = '".$CCnumber."', Cvc = '".$cvc."', Expires = '".$expiary."', CCtype = '$CCType' WHERE email = '".$_SESSION["S-email"]."';" ;
    
      if ($conn->query($sql) === TRUE) {
       
       
      echo '<script type="text/javascript">
              window.location = "http://localhost/Sparkle/Sparkle/UserProfile.php"
              </script>';
        
       
        
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        
      }
    

  };
  


?>