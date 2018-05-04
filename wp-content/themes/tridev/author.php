<?php get_header(); ?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="page_title">
                    <h1>Posts by <?php echo $curauth->nickname; ?>:</h1>
                </div>

                <?php
                $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
                ?>               

                <ul class="tag_inner">
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                            <li>
                                <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>">
                                    <?php the_title(); ?></a>
                                <p><?php the_time('d M Y'); ?> in <?php the_category('&'); ?></p>
                            </li>
                            <?php
                        endwhile;
                    else:
                        ?>
                        <p><?php _e('No posts by this author.'); ?></p>

                    <?php endif; ?>

            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>