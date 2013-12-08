<br>
<div id ="info_wrapper">
    <h4>FIRM NOTICES</h4>
    <table>
        <tr>
            <th>Title</th>
            <th>Timestamp</th>
        </tr>
        <?php
        if (isset($notices_firm)) {
            foreach ($notices_firm as $notice):
                ?> 
                <tr>
                    <td><?php echo $notice->title ?></td>
                    <td><?php echo $notice->timestamp ?></td>
                </tr>
    <?php endforeach;
} ?>

    </table>
    <div id="commands">
<?php echo anchor('notice/type/firm', 'View all'); ?>

    </div>
    <br>
</div>
<br>
<div id ="info_wrapper">
    <h4>CLIENT NOTICES</h4>
    There will always be some text here for the client
    <div id="commands">
<?php echo anchor('notice/go/type/client', 'View all'); ?>

    </div>
    <br>
</div>
<br>
<div id ="info_wrapper">
    <h4>ASSIGNMENT NOTICES</h4>
    There will always be some text here for the client
    <div id="commands">
<?php echo anchor('notice/go/type/client', 'View all'); ?>

    </div>
    <br>
</div>
<br>



