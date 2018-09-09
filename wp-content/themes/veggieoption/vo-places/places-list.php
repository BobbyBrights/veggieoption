<?php

function vo_places_list() {
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/vo-places/style-admin.css" rel="stylesheet" />
    <link type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />
    <div class="wrap">
        <h2>places</h2>
        <div class="tablenav top">
            <div class="alignleft actions">
                <a href="<?php echo admin_url('admin.php?page=vo_places_create'); ?>">Add New</a>
            </div>
            <br class="clear">
        </div>
        <?php
        global $wpdb;
        $table_name = "vo_place";

        $rows = $wpdb->get_results("SELECT id,title,date_created FROM $table_name ORDER BY date_created DESC");

        ?>
        <table id="data-table" class='wp-list-table widefat striped posts' style='width:100%;'>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($rows as $row) { ?>
                <tr>
                    <td><?php echo $row->title; ?></td>
                    <!-- echo date_format($date, 'Y-m-d H:i:s'); -->
                    <td><?php 
                    $date = new DateTime($row->date_created);

                    echo  date_format($date,'Y-m-d H:i:s'); ?></td>
                    <td><a href="<?php echo admin_url('admin.php?page=vo_places_update&id=' . $row->id); ?>">Edit</a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script>
        jQuery(document).ready( function () {
            jQuery('#data-table').DataTable({
                "order": [[ 1, "desc" ]]
            });
        } );
    </script>
    <?php
}