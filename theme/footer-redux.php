<footer class="footer" role="contentinfo">

    <div id="copyright-container">
        <div id="inner-copyright" class="wrap clearfix">

            <?php if (false) : ?>
                <nav role="navigation">
                    <?php bones_footer_links(); // Adjust using Menus in Wordpress Admin ?>
                </nav>
            <?php endif; ?>

            <div class="eightcol first">
                <p class="attribution">&copy; <?php echo date('Y'); ?></p>
            </div>
            <div class="fourcol last mf-right">
                <p id="developer">Theme by <a href="http://www.fedosev.com" title="web developer">Andriy Fedosyeyev</a></p>
            </div>

        </div> <!-- end #inner-footer -->
    </div>


</footer>

</div> <!-- end #container -->

<?php wp_footer(); // js scripts are inserted using this function ?>

</body>

</html>
