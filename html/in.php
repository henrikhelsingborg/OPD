<div class="large-12 medium-12 columns article-column">
    <h1>Checka in</h1>

    <table class="display">
        <thead>
            <tr>
                <th><?=msg('button_check_in')?></th>
                <th><?=msg('label_file_name')?></th>
                <th><?=msg('label_description')?></th>
                <th><?=msg('label_created_date')?></th>
                <th><?=msg('owner')?></th>
                <th><?=msg('label_size')?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($result as $row) : ?>
            <tr>
                <td><a href="check-in.php?id=<?=$row['id']?>&amp;state=<?=$_REQUEST['state']+1?>"><?=msg('button_check_in');?></a></td>
                <td><?=$row['realname']?></td>
                <td><?=($row['description']) ? $row['description'] : "n/a" ?></td>
                <td><?=fix_date($row['created'])?></td>
                <td><?=$row['last_name']?> <?=$row['first_name']?></td>
                <td><?=display_filesize($GLOBALS['CONFIG']['dataDir'] . $id . '.dat')?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>