

<?php

require_once 'header.php';

if(!$loggedin){
    die();
}



if(isset($_POST['firstname']) && isset($_POST['lastname']) &&  isset($_POST['city'])){
    $firstname = sanitizeString($_POST['firstname']);
    $lastname = sanitizeString($_POST['lastname']);
    $city = sanitizeString($_POST['city']);
    $email = sanitizeString($_POST['email']);
    //$event_day = sanitizeString($_POST['event_day']);
    
            if($city == "" || $firstname == "" || $email == "" || $lastname == ""){
                echo "Please fill event form correctly<br><br>";
            }else{
            queryMysql("INSERT INTO events VALUES(NULL,'$email','$lastname','$firstname',NULL,'$city',NULL,NULL,NULL)");
            die("<h2>Event Created</h2>");
            }
}
?> 
               
              
                <body>
                <form id="userForm" method="POST" action="form-process.php"> 
                    <div>
                        <fieldset>
                        <legend>User Information</legend>
                        <div id="errorDiv">
                            <?php 
                                if (isset($_SESSION['error']) && isset($_SESSION['formAttempt'])){
                                    unset($_SESSION['formAttempt']);
                                    print 'Errors encountered<br />';

                                    foreach ($_SESSION['error'] as $error) {
                                        print $error . '<br />';
                                    }
                                }
                             ?>   
                        </div>
                        <label for="name">Name:* </label>
                        <input type="text" id="name" name="name">
                        <span class="errorFeedback errorSpan" id="nameError">Name is required</span>
                        <br />
                        <label for="city">City: </label>
                        <input type="text" id="city" name="city">
                        <br />
                        <label for="state">State: </label>
                        <select name="state" id="state">
                        <option></option>
                        <option>Alabama</option>
                        <option>California</option>
                        <option>Colorado</option>
                        <option>Florida</option>
                        <option>Illinois</option>
                        <option>New Jersey</option>
                        <option>New York</option>
                        <option>Wisconsin</option>
                        </select>
                        <br />
                        <label for="zip">ZIP: </label>
                        <input type="text" id="zip" name="zip">
                         <br />
                         <label for="email">E-mail Address:* </label>
                         <input type="text" id="email" name="email">
                         <span class="errorFeedback errorSpan" id="emailError">E-mail is required</span>
                         <br />
                         <label for="phone">Telephone Number: </label>
                         <input type="text" id="phone" name="phone">
                         <span class="errorFeedback errorSpan" id="phoneError">Format: xxx-xxx-xxxx</span>
                         <br />
                         <label for="work">Number Type:</label>
                         <input class="radioButton" type="radio" name="phonetype" id="work" value="work">
                         <label class="radioButton" for="work">Work</label>
                         <input class="radioButton" type="radio" name="phonetype" id="home" value="home">
                         <label class="radioButton" for="home">Home</label>
                         <span class="errorFeedback errorSpan phoneTypeError" id="phonetypeError">Please choose an option</span>
                         <br />
                         <label for="password1">Password:* </label>
                         <input type="password" id="password1" name="password1">
                         <span class="errorFeedback errorSpan"id="password1Error">Password required</span>
                         <br />
                         <label for="password2">Verify Password:* </label>
                         <input type="password" id="password2" name="password2">
                         <span class="errorFeedback errorSpan"id="password2Error">Passwords don't match</span>
                         <br />
                         <input type="submit" id="submit" name="submit">
                         </fieldset>
                 </div>
                 </form>
                 </body>
                 </html>