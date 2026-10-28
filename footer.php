<footer>
    <hr class="footer-separator">
        <div class="footer-inner">
            <p>&copy; <?php echo date('Y'); ?> Mijn website. Alle rechten voorbehouden.</p>
            
            <?php
            wp_nav_menu( array(
                'theme_location' => 'footer-menu',
                'fallback_cb'    => false,
                'depth'          => 1,
            ) );
            ?>
        </div>
    </footer>

<?php wp_footer(); ?>

</body>
</html>