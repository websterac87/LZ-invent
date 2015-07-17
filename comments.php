<?php
/**
 * Comments Template
 *
 * Lists comments and calls the comment form.  Individual comments have their own templates.  The
 * hierarchy for these templates is $comment_type.php, comment.php.
 *
 * @package Invent
 * @subpackage Template
 */
/* Kill the page if trying to access this template directly. */

if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die(__('This page is not supposed to be loaded directly. Thanks!', 'mo_theme'));

/* If a post password is required or no comments are given and comments/pings are closed, return. */
if (post_password_required() || (!have_comments() && !comments_open() && !pings_open()))
    return;
?>

<div id="comments-template">

    <div class="comments-wrap">

        <?php if (have_comments()) : ?>

        <div id="comments">

            <h3 id="comments-number"
                class="comments-header"><?php comments_number(__('No&nbsp;Comments', 'mo_theme'), __('<span class="number">1</span>&nbsp;Comment', 'mo_theme'), __(htmlspecialchars_decode('<span class="number">%</span>&nbsp;Comments'), 'mo_theme')); ?></h3>

            <ol class="comment-list">
                <?php wp_list_comments(mo_list_comments_args()); ?>
            </ol>
            <!-- .comment-list -->

            <?php if (get_option('page_comments')) : ?>
            <div class="comment-navigation comment-pagination">
                <?php paginate_comments_links(); ?>
            </div><!-- .comment-navigation -->
            <?php endif; ?>

        </div><!-- #comments -->

        <?php else : ?>

        <?php if (pings_open() && !comments_open()) : ?>

            <p class="comments-closed pings-open">
                <?php printf(__('Comments are closed, but <a href="%1$s" title="Trackback URL for this post">trackbacks</a> and pingbacks are open.', 'mo_theme'), get_trackback_url()); ?>
            </p><!-- .comments-closed .pings-open -->

            <?php elseif (!comments_open()) : ?>

            <p class="comments-closed">
                <?php _e('Comments are closed.', 'mo_theme'); ?>
            </p><!-- .comments-closed -->

            <?php endif; ?>

        <?php endif; ?>

        <?php comment_form(array('title_reply' => __('Leave a Comment', 'mo_theme'), 'title_reply_to' => __('Leave a Comment to %s', 'mo_theme'), 'cancel_reply_link' => __('Cancel comment', 'mo_theme'))); // Loads the comment form.  ?>

    </div>
    <!-- .comments-wrap -->

</div><!-- #comments-template -->

<?php 

