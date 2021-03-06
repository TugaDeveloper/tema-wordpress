<footer class="site-footer">

    <div class="footer-widgets clearfix">

    <?php if (is_active_sidebar(footer1)) : ?>

        <div class="footer-widget-area">

        <?php dynamic_sidebar('footer1'); ?>

        </div>

    <?php endif; ?>

    <?php if (is_active_sidebar(footer2)) : ?>

        <div class="footer-widget-area">

        <?php dynamic_sidebar('footer2'); ?>

        </div>

    <?php endif; ?>

    <?php if (is_active_sidebar(footer3)) : ?>

        <div class="footer-widget-area">

        <?php dynamic_sidebar('footer3'); ?>

        </div>

    <?php endif; ?>

    <?php if (is_active_sidebar(footer4)) : ?>

        <div class="footer-widget-area">

        <?php dynamic_sidebar('footer4'); ?>

        </div>

    <?php endif; ?>
    
    </div><!--Footer Widgets-->

    <nav class="site-nav">
        <?php

        $args = array(
            'theme_location' => 'footer'
        )

        ?>
    
        <?php wp_nav_menu( $args); ?>
    </nav>
    <button class="button-top">↑</button>

    <p><?php bloginfo('name'); ?> - &copy; <?php echo date('Y'); ?></p>
</footer>

</div><!-- Container -->

<?php wp_footer(); ?>
</body>
</html>

