<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Dev Associates EMS : Login</title>
    </head>
    <body>
        <div id="wrapper">
            <div id="login_form">
                <img src="<?php echo $logo_url ?>" width="140px" height="55px">
                <br>
                <br>
                <?php echo "<b>" . strtoupper($site_name) . "</b>" ?>
                <hr>
                <?php echo form_open('login/doLogin'); ?>
                <p>Please provide your login credentials!</p>

                <table align ="center" width="80%">
                    <tr>
                        <td align="left"><b>Username: </b></td>
                        <td><input type="text" name="username" value="<?php echo $username; ?>"></td>
                    </tr>
                    <tr>
                        <td align="left"><b>Password: </b></td>     
                        <td><input type="password" name="password"><td>   
                    </tr>
                </table>

                <input type='submit' id='submit' name='submit' value='login'>
                <br>
                <br>
                <?php
                if (isset($errors)) {
                    echo "<div id=\"error\">";
                    echo "<b><u> ERROR </b></u>" . "<br>";
                    echo $errors;
                    echo "</div>";
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
