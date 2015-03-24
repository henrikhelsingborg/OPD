<form name="data">
    <input type="hidden" name="to" value="{$file_detail.to_value}" />
    <input type="hidden" name="subject" value="{$file_detail.subject_value}" />
    <input type="hidden" name="comments" value="{$file_detail.comments_value}" />
</form>

<div class="large-12 medium-12 columns article-column">
    <h1><?php echo $real_name; ?></h1>
    <table class="large-6">
        <tbody>
            <tr>
                <td><?php echo msg('historypage_category');?></td>
                <td><?php echo $category; ?></td>
            </tr>
            <tr>
                <td><?php echo msg('historypage_file_size');?></td>
                <td><?php echo display_filesize($filename); ?></td>
            </tr>
            <tr>
                <td><?php echo msg('historypage_creation_date');?></td>
                <td><?php echo fix_date($created); ?></td>
            </tr>
            <tr>
                <td><?php echo msg('historypage_owner');?></td>
                <td><?php echo $owner; ?></td>
            </tr>
            <tr>
                <td><?php echo msg('historypage_description');?></td>
                <td><?php echo $description; ?></td>
            </tr>
            <tr>
                <td><?php echo msg('historypage_comment');?></td>
                <td><?php echo $comments; ?></td>
            </tr>
            <tr>
                <td><?php echo msg('historypage_revision');?></td>
                <td>
                    <?php
                        if(isset($revision_id))
                        {
                            if( $revision_id == 0)
                            {
                                echo msg('historypage_original_revision');
                            }
                            else
                            {
                                echo $revision_id;
                            }
                        }
                        else
                        {
                            echo msg('historypage_latest');
                        }
                    ?>
                </td>
            </tr>
        </tbody>
    </table>

    <table class="large-6">
        <thead>
            <tr>
                <th><?php echo msg('historypage_version');?></th>
                <th><?php echo msg('historypage_modification');?></th>
                <th><?php echo msg('historypage_by');?></th>
                <th><?php echo msg('historypage_note');?></th>
            </tr>
        </thead>
        <tbody>
            <?php
                // query to obtain a list of modifications
                if( isset($revision_id) )
                {
                    $query = "
                      SELECT
                        u.last_name,
                        uuser.first_name,
                        l.modified_on,
                        l.note,
                        l.revision
                      FROM
                        {$GLOBALS['CONFIG']['db_prefix']}log l,
                        {$GLOBALS['CONFIG']['db_prefix']}user u
                      WHERE
                        l.id = :id
                      AND
                        u.username = l.modified_by
                      AND
                        l.revision <= :revision_id
                      ORDER BY
                        l.modified_on DESC
                    ";
                    $stmt = $pdo->prepare($query);
                    $stmt->execute(array(
                        ':id' => $_REQUEST['id'],
                        ':revision_id'=> $revision_id
                    ));
                    $result = $stmt->fetchAll();
                }
                else
                {
                    $query = "
                      SELECT
                        u.last_name,
                        u.first_name,
                        l.modified_on,
                        l.note,
                        l.revision
                      FROM
                        {$GLOBALS['CONFIG']['db_prefix']}log l,
                        {$GLOBALS['CONFIG']['db_prefix']}user u
                      WHERE
                        l.id = :id
                      AND
                        u.username = l.modified_by
                      ORDER BY
                        l.modified_on DESC
                    ";
                    $stmt = $pdo->prepare($query);
                    $stmt->execute(array(
                        ':id' => $_REQUEST['id']
                    ));
                    $result = $stmt->fetchAll();
                }


                $current_revision = $stmt->rowCount();
                // iterate through resultset
                foreach($result as $row) {
                    $last_name = $row['last_name'];
                    $first_name = $row['first_name'];
                    $modified_on = $row['modified_on'];
                    $note = $row['note'];
                    $revision = $row['revision'];

                        echo '<tr>';

                        $extra_message = '';
                        if (is_file($GLOBALS['CONFIG']['revisionDir'] . $_REQUEST['id'] . '/' . $_REQUEST['id'] . "_$revision.dat")) {
                            echo '<td><a href="details.php?id=' . $_REQUEST['id'] . "_$revision" . '&state=' . ($_REQUEST['state'] - 1) . '">' . ($revision + 1) . '</a>' . $extra_message;
                        } else {
                            echo '<td>' . $revision . $extra_message;
                        }
                        ?>
                                </td>
                                <td><?php echo fix_date($modified_on); ?></td>
                                <td><?php echo $last_name . ', ' . $first_name; ?></td>
                                <td><?php echo $note; ?></td>
                        </tr>
            <?php
                }
                // clean up
            ?>
        </tbody>
    </table>
</div>