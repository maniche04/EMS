<?php if (isset($notices_firm)) { ?>
    <div id="records">
        Showing <?php echo (count($notices_firm) < 10) ? count($notices_firm) : 10; ?> recent firm notice(s).
        <hr>
        <table id="records">

            <?php
            if (isset($notices_firm)) {
                foreach ($notices_firm as $notice):
                    ?> 
                    <tr id="record" href="<?php echo base_url() . "notice/view/" . $notice->id ?>">
                        <td width='25%' align='center'><?php echo $notice->timestamp; ?></td>
                        <td width='35%' align='center'><?php echo $notice->title ?></td>
                        <td widh="25%" align='center'><?php echo $this->user->namebyid($notice->owner_id) ?></td>
                        <td id="action" width="auto" align='center'><a href="notice/edit/<?php echo $notice->id ?>"><img src="<?php echo $this->config->item('button_url') . "edit.png" ?>"></a></td>

                    </tr>
                    <?php
                endforeach;
            }
            ?>

        </table>
    </div>
    
<?php } else echo "No firm notices found." ?>
<div id="commands">
    <?php if (isset($notices_firm)) {
        echo anchor('notice/type/firm', 'View all');
    } ?>
<?php echo anchor('notice/add', 'Add'); ?>
</div>
