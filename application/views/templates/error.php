<?php $this->load->view('templates/header', $title) ?>

<div class="wrapper">
    <div id='error_mid'>
        <p>Sorry <?php echo $first_name ?>,</p>
        <p> <?php echo $error_message ?> </p>
        <?php ?>
    </div>
</div>

<?php $this->load->view('templates/footer') ?>
