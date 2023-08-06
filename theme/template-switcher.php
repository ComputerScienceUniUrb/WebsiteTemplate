<?php /* Template Name: Version picker */

get_header('clean');
?>

<style type="text/css">
    body {
        background: #ffffff;
    }

    #content,
    #inner-content {
        margin-top: 0 !important;
        margin-bottom: 0 !important;
    }

    #content {
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }

    #footer-cover {
        background: #dadada;
        flex-grow: 1;

        font-size: .75rem;
        line-height: 1.6;

        padding: 3rem 2rem 1rem 2rem;
        text-align: center;
        color: #333;
    }
    #footer-cover > div {
        margin-bottom: .8rem;
    }
    #footer-cover a {
        color: #444;
        text-decoration: none;
        transition: color .2s;
    }
    #footer-cover a:hover {
        color: #666;
        text-decoration: underline;
    }

    .row {
        display: flex;
        flex-direction: column;
    }

    .six {
        width: 100%;
    }
    .six .image {
        font-size: 0;
    }
    .six .image img {
        width: 100%;
        height: auto;
    }

    @media only screen and (min-width: 768px) {
        .row {
            flex-direction: row;
        }
        .six {
            width: 50%;
        }
        #footer-cover {
            font-size: .9rem;
        }
    }
</style>

<div id="content">

    <div>

        <div class="row">
            <div class="six triennale">
                <a href="https://informatica.uniurb.it/triennale/">
                    <div class="image"><img src="<?php echo get_template_directory_uri(); ?>/images/cdl-switcher-triennale-informatica-scienza-e-tecnologia.jpg" alt="Corso Triennale in Informatica Applicata" /></div>
                </a>
            </div>

            <div class="six magistrale">
                <a href="https://informatica.uniurb.it/magistrale/">
                    <div class="image"><img src="<?php echo get_template_directory_uri(); ?>/images/cdl-switcher-magistrale-informatica-e-innovazione-digitale.jpg" alt="Corso Magistrale in Informatica Applicata" /></div>
                </a>
            </div>
        </div>

    </div>

    <div id="footer-cover">
        <div>Corsi di laurea presso l’<a href="https://www.uniurb.it/">Università degli Studi di Urbino</a>.</div>
        <div>
            Scegli il tuo percorso:<br />
            <a href="https://informatica.uniurb.it/triennale/">Laurea triennale in Informatica&nbsp;—&nbsp;Scienza e Tecnologia</a><br />
            <a href="https://informatica.uniurb.it/magistrale/">Laurea magistrale in Informatica e Innovazione&nbsp;Digitale</a>
        </div>
    </div>

</div>

<footer class="footer" role="contentinfo"></footer>

<?php get_footer('redux');
