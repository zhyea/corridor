<?php
/**
 * The template for displaying single posts
 *
 * @package Corridor
 */
?>
<div class="article">
    <div class="article-title">
        <h2><a href="#"><?php the_title(); ?></a></h2>
    </div>
    <div class="article-meta">
        <div class="social">
            <script type="text/javascript">
                socialButtons('http://localhost:82/corridor/', 'postTitle')
            </script>
        </div>
        <div class="keywords">
            <a href="#">keywords</a>
            <a href="#">keywords</a>
            <a href="#">keywords</a>
        </div>
        <div class="clear"></div>
    </div>
    <div class="article-content">
        <?php the_content(); ?>
    </div>
</div>