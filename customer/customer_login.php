<!DOCTYPE html>
<?php
include 'includes/db.php';

?>

  
    
   
    <h1><b>LOGIN</b></h1>
                <form action="checkout.php" name="lform" method="post">
                    <span style="color:red;">Enrollment No:</span> <input  style="border-color:red;" class="input-sm" type="text" name="c_email" placeholder="Customer Email">
                   <span style="color:red;"> Password:</span> <input  style="border-color:red;" class="input-sm" type="password" name="c_pass" placeholder="Password">
                   <input class="btn btn-primary" style="background:red;color:white;height:28px;padding: 3px 8px;"  type="submit" name="c_login" value="Login">
</form>
            
            <div class="container">
                <div class="row"><div class="col-sm-7 text-right"><a href="checkout.php?forget_password" style="padding: 16px;color:red;margin-right:6px; " >Forgotten Password</a></div></div>
            </div>
        
        <?php
       if(isset($_GET['forget_password'])){
         echo "
           <div style='color:red;' align='center'>
           <b>Enter your email below,we will send your password to your email.</b><br><br>
           <form method='post' action=''>
           <input type='text' name='email'placeholder='Enter Your Email' class='input-sm' style='border-color:red;'>
           <input type='submit' class='btn btn-primary' name='send' value='Send' style='background:red;color:white' required>
           </form>
</div>";
       }
       ?>
        <?php
        if(isset($_POST['send'])){
            $email=$_POST['email'];
            $check="select * from customers where customer_email='$email'";
            $run_check=mysqli_query($con,$check);
           $row=mysqli_fetch_array($run_check);
           $pass=$row['customer_pass'];
            $count=mysqli_num_rows($run_check);
            if($count==0){
                echo "<script>alert('This email does not exist in our database!')</script>";
            }
            else{
                $from='mtstraders786@yahoo.com';
                $subject='Your Password';
                $headers  = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
                  // Create email headers
                 $headers .= 'From: '.$from."\r\n".
                 'Reply-To: '.$from."\r\n" .
                'X-Mailer: PHP/' . phpversion();
                $msg='<html><head></head><body><h2>Your Password is <span style="color:red">echo $pass</span></h2></body></html>';
                mail($email,$subject,$msg,$headers);
                echo "<script>alert('Password has been sent to your email')</script>";
                echo "<script>window.open('checkout.php','_self')</script>";
            }
        }
        ?>
            
        
            
                    <h1 style="color:red;"><b>Create a new account</b></h1>
                    
                    <form name="myform" action="checkout.php" method="post">
                <input class="input-sm" type="text" name="customer_name" placeholder="Your Name" style="margin-bottom:10px;border-color:red;"><br>
                <input class="input-sm" type="text" name="customer_email" placeholder="Your Email" style="margin-bottom:10px;border-color:red;"><br>
                <input class="input-sm" type="password"  name="customer_pass" placeholder="Your Password" style="margin-bottom:10px;border-color:red;"><br>
                <select class="input-sm" name="customer_country" style="width:170px;margin-bottom:10px;border-color:red;">
                    <option  value="" selected>Select your Country</option>
    <option value="Afghanistan">Afghanistan</option>
    <option value="Albania">Albania</option>
    <option value="Algeria">Algeria</option>
    <option value="American Samoa">American Samoa</option>
    <option value="Andorra">Andorra</option>
    <option value="Angola">Angola</option>
    <option value="Anguilla">Anguilla</option>
    <option value="Antartica">Antarctica</option>
    <option value="Antigua and Barbuda">Antigua and Barbuda</option>
    <option value="Argentina">Argentina</option>
    <option value="Armenia">Armenia</option>
    <option value="Aruba">Aruba</option>
    <option value="Australia">Australia</option>
    <option value="Austria">Austria</option>
    <option value="Azerbaijan">Azerbaijan</option>
    <option value="Bahamas">Bahamas</option>
    <option value="Bahrain">Bahrain</option>
    <option value="Bangladesh">Bangladesh</option>
    <option value="Barbados">Barbados</option>
    <option value="Belarus">Belarus</option>
    <option value="Belgium">Belgium</option>
    <option value="Belize">Belize</option>
    <option value="Benin">Benin</option>
    <option value="Bermuda">Bermuda</option>
    <option value="Bhutan">Bhutan</option>
    <option value="Bolivia">Bolivia</option>
    <option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
    <option value="Botswana">Botswana</option>
    <option value="Bouvet Island">Bouvet Island</option>
    <option value="Brazil">Brazil</option>
    <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
    <option value="Brunei Darussalam">Brunei Darussalam</option>
    <option value="Bulgaria">Bulgaria</option>
    <option value="Burkina Faso">Burkina Faso</option>
    <option value="Burundi">Burundi</option>
    <option value="Cambodia">Cambodia</option>
    <option value="Cameroon">Cameroon</option>
    <option value="Canada">Canada</option>
    <option value="Cape Verde">Cape Verde</option>
    <option value="Cayman Islands">Cayman Islands</option>
    <option value="Central African Republic">Central African Republic</option>
    <option value="Chad">Chad</option>
    <option value="Chile">Chile</option>
    <option value="China">China</option>
    <option value="Christmas Island">Christmas Island</option>
    <option value="Cocos Islands">Cocos (Keeling) Islands</option>
    <option value="Colombia">Colombia</option>
    <option value="Comoros">Comoros</option>
    <option value="Congo">Congo</option>
    <option value="Congo">Congo, the Democratic Republic of the</option>
    <option value="Cook Islands">Cook Islands</option>
    <option value="Costa Rica">Costa Rica</option>
    <option value="Cota D'Ivoire">Cote d'Ivoire</option>
    <option value="Croatia">Croatia (Hrvatska)</option>
    <option value="Cuba">Cuba</option>
    <option value="Cyprus">Cyprus</option>
    <option value="Czech Republic">Czech Republic</option>
    <option value="Denmark">Denmark</option>
    <option value="Djibouti">Djibouti</option>
    <option value="Dominica">Dominica</option>
    <option value="Dominican Republic">Dominican Republic</option>
    <option value="East Timor">East Timor</option>
    <option value="Ecuador">Ecuador</option>
    <option value="Egypt">Egypt</option>
    <option value="El Salvador">El Salvador</option>
    <option value="Equatorial Guinea">Equatorial Guinea</option>
    <option value="Eritrea">Eritrea</option>
    <option value="Estonia">Estonia</option>
    <option value="Ethiopia">Ethiopia</option>
    <option value="Falkland Islands">Falkland Islands (Malvinas)</option>
    <option value="Faroe Islands">Faroe Islands</option>
    <option value="Fiji">Fiji</option>
    <option value="Finland">Finland</option>
    <option value="France">France</option>
    <option value="France Metropolitan">France, Metropolitan</option>
    <option value="French Guiana">French Guiana</option>
    <option value="French Polynesia">French Polynesia</option>
    <option value="French Southern Territories">French Southern Territories</option>
    <option value="Gabon">Gabon</option>
    <option value="Gambia">Gambia</option>
    <option value="Georgia">Georgia</option>
    <option value="Germany">Germany</option>
    <option value="Ghana">Ghana</option>
    <option value="Gibraltar">Gibraltar</option>
    <option value="Greece">Greece</option>
    <option value="Greenland">Greenland</option>
    <option value="Grenada">Grenada</option>
    <option value="Guadeloupe">Guadeloupe</option>
    <option value="Guam">Guam</option>
    <option value="Guatemala">Guatemala</option>
    <option value="Guinea">Guinea</option>
    <option value="Guinea-Bissau">Guinea-Bissau</option>
    <option value="Guyana">Guyana</option>
    <option value="Haiti">Haiti</option>
    <option value="Heard and McDonald Islands">Heard and Mc Donald Islands</option>
    <option value="Holy See">Holy See (Vatican City State)</option>
    <option value="Honduras">Honduras</option>
    <option value="Hong Kong">Hong Kong</option>
    <option value="Hungary">Hungary</option>
    <option value="Iceland">Iceland</option>
    <option value="India">India</option>
    <option value="Indonesia">Indonesia</option>
    <option value="Iran">Iran (Islamic Republic of)</option>
    <option value="Iraq">Iraq</option>
    <option value="Ireland">Ireland</option>
    <option value="Israel">Israel</option>
    <option value="Italy">Italy</option>
    <option value="Jamaica">Jamaica</option>
    <option value="Japan">Japan</option>
    <option value="Jordan">Jordan</option>
    <option value="Kazakhstan">Kazakhstan</option>
    <option value="Kenya">Kenya</option>
    <option value="Kiribati">Kiribati</option>
    <option value="Democratic People's Republic of Korea">Korea, Democratic People's Republic of</option>
    <option value="Korea">Korea, Republic of</option>
    <option value="Kuwait">Kuwait</option>
    <option value="Kyrgyzstan">Kyrgyzstan</option>
    <option value="Lao">Lao People's Democratic Republic</option>
    <option value="Latvia">Latvia</option>
    <option value="Lebanon">Lebanon</option>
    <option value="Lesotho">Lesotho</option>
    <option value="Liberia">Liberia</option>
    <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
    <option value="Liechtenstein">Liechtenstein</option>
    <option value="Lithuania">Lithuania</option>
    <option value="Luxembourg">Luxembourg</option>
    <option value="Macau">Macau</option>
    <option value="Macedonia">Macedonia, The Former Yugoslav Republic of</option>
    <option value="Madagascar">Madagascar</option>
    <option value="Malawi">Malawi</option>
    <option value="Malaysia">Malaysia</option>
    <option value="Maldives">Maldives</option>
    <option value="Mali">Mali</option>
    <option value="Malta">Malta</option>
    <option value="Marshall Islands">Marshall Islands</option>
    <option value="Martinique">Martinique</option>
    <option value="Mauritania">Mauritania</option>
    <option value="Mauritius">Mauritius</option>
    <option value="Mayotte">Mayotte</option>
    <option value="Mexico">Mexico</option>
    <option value="Micronesia">Micronesia, Federated States of</option>
    <option value="Moldova">Moldova, Republic of</option>
    <option value="Monaco">Monaco</option>
    <option value="Mongolia">Mongolia</option>
    <option value="Montserrat">Montserrat</option>
    <option value="Morocco">Morocco</option>
    <option value="Mozambique">Mozambique</option>
    <option value="Myanmar">Myanmar</option>
    <option value="Namibia">Namibia</option>
    <option value="Nauru">Nauru</option>
    <option value="Nepal">Nepal</option>
    <option value="Netherlands">Netherlands</option>
    <option value="Netherlands Antilles">Netherlands Antilles</option>
    <option value="New Caledonia">New Caledonia</option>
    <option value="New Zealand">New Zealand</option>
    <option value="Nicaragua">Nicaragua</option>
    <option value="Niger">Niger</option>
    <option value="Nigeria">Nigeria</option>
    <option value="Niue">Niue</option>
    <option value="Norfolk Island">Norfolk Island</option>
    <option value="Northern Mariana Islands">Northern Mariana Islands</option>
    <option value="Norway">Norway</option>
    <option value="Oman">Oman</option>
    <option value="Pakistan">Pakistan</option>
    <option value="Palau">Palau</option>
    <option value="Panama">Panama</option>
    <option value="Papua New Guinea">Papua New Guinea</option>
    <option value="Paraguay">Paraguay</option>
    <option value="Peru">Peru</option>
    <option value="Philippines">Philippines</option>
    <option value="Pitcairn">Pitcairn</option>
    <option value="Poland">Poland</option>
    <option value="Portugal">Portugal</option>
    <option value="Puerto Rico">Puerto Rico</option>
    <option value="Qatar">Qatar</option>
    <option value="Reunion">Reunion</option>
    <option value="Romania">Romania</option>
    <option value="Russia">Russian Federation</option>
    <option value="Rwanda">Rwanda</option>
    <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option> 
    <option value="Saint LUCIA">Saint LUCIA</option>
    <option value="Saint Vincent">Saint Vincent and the Grenadines</option>
    <option value="Samoa">Samoa</option>
    <option value="San Marino">San Marino</option>
    <option value="Sao Tome and Principe">Sao Tome and Principe</option> 
    <option value="Saudi Arabia">Saudi Arabia</option>
    <option value="Senegal">Senegal</option>
    <option value="Seychelles">Seychelles</option>
    <option value="Sierra">Sierra Leone</option>
    <option value="Singapore">Singapore</option>
    <option value="Slovakia">Slovakia (Slovak Republic)</option>
    <option value="Slovenia">Slovenia</option>
    <option value="Solomon Islands">Solomon Islands</option>
    <option value="Somalia">Somalia</option>
    <option value="South Africa">South Africa</option>
    <option value="South Georgia">South Georgia and the South Sandwich Islands</option>
    <option value="Span">Spain</option>
    <option value="SriLanka">Sri Lanka</option>
    <option value="St. Helena">St. Helena</option>
    <option value="St. Pierre and Miguelon">St. Pierre and Miquelon</option>
    <option value="Sudan">Sudan</option>
    <option value="Suriname">Suriname</option>
    <option value="Svalbard">Svalbard and Jan Mayen Islands</option>
    <option value="Swaziland">Swaziland</option>
    <option value="Sweden">Sweden</option>
    <option value="Switzerland">Switzerland</option>
    <option value="Syria">Syrian Arab Republic</option>
    <option value="Taiwan">Taiwan, Province of China</option>
    <option value="Tajikistan">Tajikistan</option>
    <option value="Tanzania">Tanzania, United Republic of</option>
    <option value="Thailand">Thailand</option>
    <option value="Togo">Togo</option>
    <option value="Tokelau">Tokelau</option>
    <option value="Tonga">Tonga</option>
    <option value="Trinidad and Tobago">Trinidad and Tobago</option>
    <option value="Tunisia">Tunisia</option>
    <option value="Turkey">Turkey</option>
    <option value="Turkmenistan">Turkmenistan</option>
    <option value="Turks and Caicos">Turks and Caicos Islands</option>
    <option value="Tuvalu">Tuvalu</option>
    <option value="Uganda">Uganda</option>
    <option value="Ukraine">Ukraine</option>
    <option value="United Arab Emirates">United Arab Emirates</option>
    <option value="United Kingdom">United Kingdom</option>
    <option value="United States">United States</option>
    <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
    <option value="Uruguay">Uruguay</option>
    <option value="Uzbekistan">Uzbekistan</option>
    <option value="Vanuatu">Vanuatu</option>
    <option value="Venezuela">Venezuela</option>
    <option value="Vietnam">Viet Nam</option>
    <option value="Virgin Islands (British)">Virgin Islands (British)</option>
    <option value="Virgin Islands (U.S)">Virgin Islands (U.S.)</option>
    <option value="Wallis and Futana Islands">Wallis and Futuna Islands</option>
    <option value="Western Sahara">Western Sahara</option>
    <option value="Yemen">Yemen</option>
    <option value="Yugoslavia">Yugoslavia</option>
    <option value="Zambia">Zambia</option>
    <option value="Zimbabwe">Zimbabwe</option>
                </select><br>

                <input  class="input-sm" type="text" name="customer_city" placeholder="Your City" style="margin-bottom:10px;border-color:red;"><br>
                <input  class="input-sm" type="text" name="customer_mobile" placeholder="Your Contact" style="margin-bottom:10px;border-color:red;"><br>
                <input  class="input-sm" type="text" name="customer_address" placeholder="Your Address" style="margin-bottom:10px;border-color:red;"><br>
                 <input class="btn btn-primary"  name="register" style="width:100px;font-weight: bold;background:red;margin-bottom: 20px; " value="Sign Up" type="submit" onclick=" return validateform();">
            </form>
                
                        
       
       
<?php
if(isset($_POST['c_login'])){
    $customer_email=$_POST['c_email'];
    $customer_pass=$_POST['c_pass'];
    $q="select * from customers where customer_email='$customer_email' AND customer_pass='$customer_pass'";
    $result=mysqli_query($con,$q);
    $check_customer=mysqli_num_rows($result);
    $get_ip=getUserIP();
    $q1="select * from cart where ip_add='1'";             //$get_ip instead of 1
    $result1=mysqli_query($con,$q1);
    $check_cart=mysqli_num_rows($result1);
    if($check_customer==0){
        echo "<script>alert('Email and Password are wrong,please try again!')</script>";
        exit();
    }
    if($check_customer==1 AND $check_cart==0){
        $_SESSION['customer_email']=$customer_email;
         echo "<script>window.open('customer/my_account.php','_self')</script>";   
    }
    else{
        
        $_SESSION['customer_email']=$customer_email;
        echo "<script>alert('You are now logged in,click on login and order!')</script>";
    include ("payment_options.php");
    }
}



?>

        
        
        <?php
        if(isset($_POST['register'])){
       $customer_name=$_POST['customer_name'];
       $customer_email=$_POST['customer_email'];
       $customer_password=$_POST['customer_pass'];
       $customer_country=$_POST['customer_country'];
       $customer_city=$_POST['customer_city'];
        $customer_contact=$_POST['customer_mobile'];
       $customer_address=$_POST['customer_address'];
       $customer_email=$_POST['customer_email'];
        
       $check="select * from customers";
       $check_res=mysqli_query($con,$check);
       while($check_array=mysqli_fetch_array($check_res)){
        $email=$check_array['customer_email'];
           
      if($email==$customer_email){
          echo"<script>alert('Already Registered!');</script>";
          exit();
      }
       
       }
       
      echo  $customer_register="INSERT INTO `customers`(`customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`,`customer_ip`) VALUES ('$customer_name','$customer_email','$customer_password','$customer_country','$customer_city','$customer_contact','$customer_address','1')"; // $get_ip instead of 1
        
        $registered= mysqli_query($con,$customer_register);
      
        if($registered){
            echo"<script>alert('Data Inserted Successfully!');</script>";
        }
      }
       
             
        
        ?>

       