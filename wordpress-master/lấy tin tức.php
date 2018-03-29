   <section>
                        <div class="flr-news-top1 float-left">

                        <h2 class="block-title"><span>LATEST FORM BLOG</span></h2>
                        <?php $getposts = new WP_query();
                        $getposts->query('post_status=publish&showposts=3&cat=2'); ?>
                        <?php global $wp_query;
                        $wp_query->in_the_loop = true; ?>
                        <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>

                        <div>
                            <div class="col-md-4 items-form-blog">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                <div class="items-img-form-blog">
                                        <?php the_post_thumbnail(array()); ?>
                                </div>
                            </a>

                                <div class="comment-blog">
                                    <div class="items-tile-form-blog">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </div>
                                        <br>

                                <div class="items-info-form-blog">
                                    <span class="author">
                                        <?php _e('By ', 'html5blank'); ?><?php the_author_posts_link(); ?></span>
                                    <span class="flr-new-date"><?php echo get_the_date('d/m/Y') ?></span>
                                </div>
                                </div>
                                <!-- goi ra trich dan -->
                                <p>
                                    <span><?php echo teaser(30); ?></span>
                                </p>
                            </div>

                        <?php endwhile;
                        wp_reset_postdata(); ?>
                    </div>
                        </div>

                   </section>
