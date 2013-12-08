<?php $this->load->view('templates/header', $title) ?>

<div class="wrapper">
    <div id ="content">
        <?php $this->load->view($page_content) ?>


    </div>
    <?php if ($nav_links = $this->accesscontrol->navbar_links()) { ?>
        <div class = 'nav_bar'>
            <div id='nav_links'>

                <?php foreach ($nav_links as $link => $label) : ?>
                    <?php
                    $controller = $this->uri->segment(1);
                    if (!($function = $this->uri->segment(2))) {
                        $function = "index";
                    }
                    $this_link = $controller . "/" . $function;
                    if ($this_link == $link) {
                        echo anchor($link, $label, 'id="current_link"');
                    } else {
                        echo anchor($link, $label);
                    }
                    ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php } ?>

<?php $this->load->view('templates/footer') ?>
