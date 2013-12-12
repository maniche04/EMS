

<br>
<div class ="overview">
    <h1> Unread</h1>
</div>

<?php $link_base = base_url() . "notice/go/"?>

<div class ="tabbed_view">
    <div id="tabs">
        <h4 id="<?php if(!isset($autoload)) {echo "autoload";} elseif (isset($autoload) && $autoload == 'firm') {echo "autoload";} else {echo "normal";}?>" class ="tab_link" href="<?php echo $link_base?>firm/ajax">Firm</h4>
        <h4 id="<?php if(isset($autoload) && $autoload == 'client') {echo "autoload";} else {echo "normal";}?>" class ="tab_link" href="<?php echo $link_base?>client/ajax">Client</h4>
        <h4 id="<?php if(isset($autoload) && $autoload == 'assignment') {echo "autoload";} else {echo "normal";}?>" class ="tab_link" href="<?php echo $link_base?>assignment/ajax">Assignment</h4>
    </div>
    <div id="loading">Loading... <img src ="<?php echo $this->config->item('img_url')?>bird.png" width="25px" height ="29px"><br><br></div>

    <div class ="tab_content">
    </div>
    
</div>
<br>

<style>
    #loading {
        font-weight: 700;
        clear:both;
        display:block;
        font-family: Ubuntu;
        padding-left: 10px;
    }
</style>
