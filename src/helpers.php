<?php

/**
 * Update how often a post is opened
 *
 * @param int|string $ID the post ID
 *
 * @return void
 */
function setPostViews($ID)
{
    $count_key = 'post_views_count';
    $count = get_post_meta($ID, $count_key, true);
    if ($count === '' || $count === $count_key) {
        delete_post_meta($ID, $count_key);
        add_post_meta($ID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($ID, $count_key, $count);
    }
}
