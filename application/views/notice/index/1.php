<br>
<div id ="info_wrapper">
    <h4>FIRM NOTICES</h4>
    <table>
        
        <?php
        if (isset($notices_firm)) {
            foreach ($notices_firm as $notice):
                ?> 
                <tr>
                    <td width='25%' align='center'><?php echo $notice->timestamp; ?></td>
                    <td width='35%' align='center'><?php echo anchor('notice/view/'.$notice->id,$notice->title) ?></td>
                    <td widh="25%" align='center'><?php echo $this->user->namebyid($notice->owner_id) ?></td>
                    <td width="20%" align='center'>Actions Here</td>

                </tr>
            <?php
            endforeach;
        }
        ?>

    </table>
    <div id="commands">
        <?php echo anchor('notice/type/firm', 'View all'); ?>
<?php echo anchor('notice/add', 'Add'); ?>
    </div>
    <br>
</div>
<br>
<div id ="info_wrapper">
    <h4>CLIENT NOTICES</h4>
    There will always be some text here for the client
    <div id="commands">
        <?php echo anchor('notice/go/type/client', 'View all'); ?>
<?php echo anchor('notice/add', 'Add'); ?>
    </div>
    <br>
</div>
<br>
<div id ="info_wrapper">
    <h4>ASSIGNMENT NOTICES</h4>
    There will always be some text here for the client
    <div id="commands">
        <?php echo anchor('notice/go/type/client', 'View all'); ?>
<?php echo anchor('notice/add', 'Add'); ?>
    </div>
    <br>
</div>
<br>

