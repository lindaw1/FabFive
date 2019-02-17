    <!----------------------------------START LOGIN FORM ------------------------------------->
    <?php
    if (!isset($_SESSION['loggedIn']))  {  
        $str = <<<EOF
        <form method="post" action="#" class="reg-form" name="infoForm" id="infoForm">
            <!-- // Username --> 
            <p>
                <label class="formItemDesc" for="email" id="emailLabel">Username:</label>
                <input type="text" class="formInputCtrl" name="email" id="email">
            </p>
            <!--  Password --> 
            <p>
                <label class="formItemDesc" for="password" id="passwordLabel">Password:</label>
                <input type="password" class="formInputCtrl" name="password" id="password">
            </p>                
            <!-- Submit button -->
            <input type="submit" value="login" id="loginSubmit" name="loginSubmit">
            <p class="formError" id="formError" display="none"></p>
        </form>
EOF;
    } else {
        $str =  '<form method="post" action="#" class="reg-form" name="infoForm" id="infoForm">';            
        $str .= "<!-- Submit button -->";
        $str .= '<input type="submit" value="logout" id="logoutSubmit" name="logoutSubmit">';
        $str .= '<p class="formError" id="formError" display="none"></p>';
        $str .= '</form>';
    }
    print($str);
    ?>