<br>
<div id="info_wrapper">
    <h4><?php echo strtoupper($type) . " NOTICES" ?></h4>
    <table>
        <tr>
            <th>Title</th>
            <th>Timestamp</th>
        </tr>
        <?php foreach ($notices as $notice): ?> 
            <tr>
                <td><?php echo $notice->title?></td>
                <td><?php echo $notice->timestamp?></td>
            </tr>
        <?php endforeach; ?>
    </table>


</div>
<br>
