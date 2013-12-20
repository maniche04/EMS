<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() . "css/login.css" ?>">
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Electrolize|Ubuntu">
        <title>EMS : Login</title>
    </head>
    <body>
        <div id="wrapper">
            <div id="login_form">
                <img src="<?php echo $this->config->item('logo_url') ?>" width="140px" height="55px">
                <br>
                <br>
                <?php echo "<b>" . strtoupper($this->config->item('site_name')) . "</b>" ?>
                <hr>
                <?php echo form_open('login/doLogin'); ?>
                <p>Please provide your login credentials!</p>

                <table align ="center" width="80%">
                    <tr>
                        <td align="left"><b></b></td>
                        <?php
                        $input_data = array(
                            'name' => 'username',
                            'placeholder' => 'Username',
                            'value' => set_value('username', ""),
                            'autofocus' => true
                        );
                        ?>

                        <td><?php echo form_input($input_data) ?></td>
                    </tr>
                    <tr>
                        <td align="left"><b></b></td>     
                        <td><input type="password" name="password" placeholder="Password"><td>   
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
