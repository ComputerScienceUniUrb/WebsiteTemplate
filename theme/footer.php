<footer class="footer" role="contentinfo">

    <div id="footer-container">
        <div id="inner-footer" class="wrap clearfix">

            <?php if (false) : ?>
                <nav role="navigation">
                    <?php bones_footer_links(); // Adjust using Menus in Wordpress Admin ?>
                </nav>
            <?php endif; ?>
            <?php if (false) : ?>
                <div class="threecol first clearfix">
                    <p><img src="<?php echo home_url('assets/logo_uniurb.png') ?>" alt="uni"></p>
                </div>
                <div class="threecol clearfix">
                    <p><img src="<?php echo home_url('assets/iso9001.gif') ?>" style="margin-left: 15px;" alt="uni"></p>
                </div>
            <?php endif; ?>


            <div class="clearfix">

                <h3><?php pll_e('Annunci recenti') ?></h3>
                <?php include '_bb-last.php'; ?>

            </div>

        </div> <!-- end #inner-footer -->
    </div>
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
