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
<!--
            <div class="threecol first clearfix">
                <p><img src="<?php echo home_url('assets/ISO9001_2.png') ?>" alt="ISO 9001" style="margin-top: -5px"></p>
            </div>
-->
            <?php if (false) : ?>
                <div class="threecol clearfix">
                    <h3><?php pll_e('Link vari') ?></h3>
                    <ul>
                        <li><a href="#">Un link asdde</a></li>
                        <li><a href="#">Un link gswerg f23</a></li>
                        <li><a href="#">Contattaci</a></li>
                        <li><a href="#">Un altro link</a></li>
                    </ul>
                </div>
            <?php endif; ?>

            <?php if (is_active_sidebar('footer_bar')) : ?>

                <div class="threecol clearfix">
                    <?php dynamic_sidebar('footer_bar'); ?>
                </div>

            <?php endif; ?>


            <div class="threecol clearfix">

                <h3><?php pll_e('Annunci recenti') ?></h3>
                <?php include '_bb-last.php'; ?>

            </div>

            <div class="threecol last clearfix"><!-- commento login piattaforma -->
                <h3><?php pll_e('Accesso percorso on-line') ?></h3>
                <form id="accesso_form" action="https://elearning.uniurb.it/lolinformatica/LoginServlet" method="post">
                    <p>
                        <label for="nome">Username</label>
                        <input type="text" name="txtUsername" id="user" class="input_text">
                    </p>
                    <p>
                        <label for="contatto">Password</label>
                        <input type="password" name="txtPassword" id="pass" class="input_text">
                    </p>
                    <p>
                        <input type="submit" class="button" value="<?php _e('Entra', 'stitheme'); ?>">
                    </p>
                    <input type="hidden" id="hdnCommand" name="hdnCommand" value="login">
                    <?php //<input type=hidden id="hdnClientInfo" name="hdnClientInfo" value=""> ?>
                </form>
            </div> <!-- commento login piattaforma -->

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
                <p class="attribution">&copy; <?php echo date('Y'); ?> <?php bloginfo('description'); ?>.</p>
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
