<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() . "css/" . $css . ".css" ?>">
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Electrolize|Ubuntu">
        <title><?php echo $title ?></title>

        <?php if (!($show_header == false)) { ?>

        <div id="site_title">
            <img id="logo" src="<?php echo $logo_url ?>">
            <div id="title_text"> <?php echo " | " . $site_name; ?> </div> 
        </div>
        <div class="menubar">
            <div id="links">
                <?php
                $links = array(
                    'Home' => 'home',
                    'Assignments' => 'assignment',
                    'Clients' => 'client',
                    'Staffs' => 'staff',
                    'Logs' => 'logs',
                    'About' => 'about'
                    
                );
                ?>

                <?php foreach ($links as $label => $link) : ?>
                    <?php
                    if ($this->uri->segment(1) == $link) {
                        echo anchor($link, $label, 'id="current_link"');
                    } else {
                        echo anchor($link, $label);
                    }
                    ?>

                <?php endforeach; ?>


            </div>

            <div id="logout">
    <?php echo anchor('login/doLogout', 'Logout (' . $username . ")"); ?>
            </div>
        </div>
<?php } ?>


</head>
