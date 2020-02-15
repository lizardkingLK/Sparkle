<?php
  include 'config.php';
  session_start();


?>


<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="theme.css"> </head>

<body>
  <pingendo onclick="window.open('https://pingendo.com/', '_blank')" style="cursor:pointer;position: fixed;bottom: 10px;right:10px;padding:4px;background-color: #00b0eb;border-radius: 8px; width:250px;display:flex;flex-direction:row;align-items:center;justify-content:center;font-size:14px;color:white">Made with Pingendo Free&nbsp;&nbsp;
    <img src="https://pingendo.com/site-assets/Pingendo_logo_big.png" class="d-block" alt="Pingendo logo" height="16">
  </pingendo>
  <div class="py-5 bg-secondary">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="display-6">Sparkle Vendor Portal</h1>
          <h1 class= "display-1"><?php echo $_SESSION["VendorName"]; ?></h1>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5 bg-dark" style="background-image: url('-');">
    <div class="container">
      <div class="row">
        <div class="align-self-center col-md-6 text-white">
          <h1 class="text-center text-md-left display-3">Sell Your Item</h1>
          <p class="lead">Sell And Promote Your Jewelry Through Sparkle.lk</p>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-body p-5">
              <h3 class="pb-3">Add Item</h3>
              <form action="Vendor.php" method = "post" enctype="multipart/form-data" >
                <div class="form-group">
                  <label>Enter Item Name</label>
                  <input type="text" class="form-control" id="inlineFormInput" placeholder="Jane Doe" name = "itemName"> </div>
                <div class="form-group">

                <div class="form-group">
                  <label>Item Image</label>
                  <input type="file" name="file" id="file">
                 

                </div>
                <div class="form-group">

                  <label for="exampleInputEmail1">Item Description</label>
                  <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Maximunm 200characters" name = "itemDiscription"></textarea>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">SearchTags(separate by + )</label>
                  <textarea class="form-control" id="exampleTextarea" rows="5" placeholder="example :  simple+elegant+floral" name = "itemSearchTags"></textarea>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Available Stock</label>
                  <input type="text" class="form-control" id="inlineFormInput" placeholder="Jane Doe" name = "stock"> </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Choose Category</label>
                  <div class="custom-control custom-radio">
                    <input type="radio" id="customRadio1" name="itemCategory" class="" value="Bracelets">
                    <label class="custom-control-label" for="customRadio1">Bracelets</label>
                  </div>
                  <div class="custom-control custom-radio">
                    <input type="radio" id="customRadio1" name="itemCategory" class="" value="Pendants">
                    <label class="custom-control-label" for="customRadio1">Pendants</label>
                  </div>
                  <div class="custom-control custom-radio">
                    <input type="radio" id="customRadio1" name="itemCategory" class="" value="Rings">
                    <label class="custom-control-label" for="customRadio1">Rings</label>
                  </div>
                  <div class="custom-control custom-radio">
                    <input type="radio" id="customRadio1" name="itemCategory" class="" value="Earings">
                    <label class="custom-control-label" for="customRadio1">Earings</label>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Gemstone</label>
                  <select class="custom-control custom-select" name= "stone">
                    <option selected="" value="None">None</option>
                    <option value="ruby">Ruby</option>
                    <option value="saphire">Saphire</option>
                    <option value="diamond">Diamond</option>
                  </select>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Metal Type</label>
                  <select class="custom-control custom-select" name = "metal">
                    <option selected="" value="None">None</option>
                    <option value="gold">Gold</option>
                    <option value="Silver">Silver</option>
                    <option value="bronze">Bronze</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Price in Sri Lankan Rupees</label>
                  <input type="text" class="form-control" id="inlineFormInput" placeholder="example 12000" name = "itemPrice">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn mt-2 btn-outline-dark justify-content-center" name ="addItemSubmit">&nbsp;Add Item</button>
                    <?php

                              if(isset($_POST["addItemSubmit"]) ===  true)
                              {
                                 $Vendor_VendorName =  $_SESSION["VendorName"];
                                 $ItemName = $_POST["itemName"];
                                 $Price = $_POST["itemPrice"];
                                 $Stock = $_POST["stock"];
                                 $Category = $_POST["itemCategory"];
                                 $metal = $_POST["metal"];
                                 $stone = $_POST["stone"];
                                 $SearchTags = $_POST["itemSearchTags"];
                                 $Description = $_POST["itemDiscription"];
                                 echo  $_FILES['file']['name'];

                           
                                 $sql = "INSERT INTO item 
                                         (Vendor_VendorName,ItemName,Price,Stock,Category,metal,stone,SearchTags,Description)
                                         VALUES
                                         ('".$Vendor_VendorName."','".$ItemName."','".$Price."','".$Stock."','".$Category."','".$metal."','".$stone."','".$SearchTags."','".$Description."');
                                 
                                 ";

                                 if($conn->query($sql) === TRUE)
                                 {
                                   echo "<script>alert('Item Added Succesfully');</script>";
                                   
                                   //upload Image
                                   $file = $_FILES["file"];
                                   $fileName = $_FILES["file"]['name'];
                                   $fileTmpName = $_FILES["file"]['tmp_name'];
                                   $fileSize = $_FILES["file"]['size'];
                                   $fileError = $_FILES["file"]['error'];
                                   $fileType = $_FILES["file"]['type'];

                                   $fileExt = explode('.', $fileName);
                                   $fileActualExt = strtolower(end($fileExt));
                                   $allow = array('jpg','jpeg','png');

                                   if(in_array($fileActualExt, $allow) )
                                   {
                                        if($fileError === 0)
                                        {
                                            if($fileSize < 500000)
                                            {
                                                $fileNameNew = $_SESSION["VendorName"]."_".$ItemName.".".$fileActualExt;
                                                $fileDestination = 'images/itemImages/'.$fileNameNew;
                                                move_uploaded_file($fileTmpName, $fileDestination);
                                                echo "<script>Image Added Succesfull</script>";


                                                  $sql2 = "UPDATE item SET 
                                                          ImageURL = '".$fileDestination."' WHERE ItemName = '".$ItemName."';" ;

                                                  if ($conn->query($sql2) === TRUE) {
                                                        
                                                        
                                                    echo '<script type="text/javascript">
                                                            window.location = "http://localhost/Sparkle/Sparkle/Vendor.php"
                                                            </script>';                                                      
                                                                                                        
                                                    } 
                                                    else {
                                                      echo "Error: " . $sql . "<br>" . $conn->error;
                                                      
                                                    } 

                                                

                                            }
                                            else echo "<script>File Is too Big</script>";
                                        }
                                        else echo "<script>Upload Failed</script>";
                                   }
                                   else echo "<script>Only Upload JPEG or PNG</script>";


                                   
                                    
                                 }

                              }




                    ?>
                </div>


               
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5 text-white bg-secondary">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1>Add Banner</h1>
          <p>This Banner will display in Website and Direct you to your page</p>
          <div class="row">
            <div class="col-md-12">
              <form class="">
                <div class="form-group">
                  <label>Description&nbsp;</label>
                  <input type="text" class="form-control" placeholder="Enter Short Description">
                  
                </div>
                <div class="form-group">
                  <label>Upload Image (size 1028px * 500px)</label>
                  <input type="file" name="pic" accept="image/*">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


    <script
			  src="https://code.jquery.com/jquery-3.3.1.js"
			  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous">
    </script>
    
</body>

</html>