<?php /* Template Name: Version picker */ 

get_header('redux');
?>

<style type="text/css">
#inner-content {
    margin-top: 0;
}

.picker h1 {
    text-align: center;
}
.row {
    display: flex;
    flex-direction: column;
}
.badge {
    width: 100%;
}
.badge .image {
    width: calc(100% - 40px);
    margin: 0 20px;
}
.badge .image > img {
    width: 100%;
    height: auto;
    border-radius: 100%;
    box-shadow: 0 2px 12px rgba(100,100,100,0.2);
    transform: translateY(-0px);
    transition: box-shadow 2s ease-out, transform 1s ease-out;
}
.badge:hover .image > img {
    box-shadow: 0 2px 36px rgba(100,100,100,0.7);
    transform: translateY(-8px);
}
.badge .subtitle {
    text-align: center;
    font-size: 2.7em;
    
    text-shadow: 1px 1px 0 rgba(80,80,80,0.0);
    transition: text-shadow 1.4s ease-out;
}
.badge:hover .subtitle {
    text-shadow: 1px 1px 6px rgba(80,80,80,0.3);
}
.badge a {
    color: gray;
    text-decoration: none;
}
.badge.triennale a .subtitle {
    color: #2db970;
}
.badge.magistrale a .subtitle {
    color: #f37230;
}

@media only screen and (min-width: 768px) {
    .row {
        flex-direction: row;
    }
    .badge {
        width: 50%;
    }
}
</style>

<div id="content">

    <div id="inner-content" class="wrap clearfix picker">

        <div id="main" class="twelve first clearfix" role="main">

            <h1>
                <b>Informatica Applicata</b><br />
                Il tuo percorso
            </h1>

        </div>

        <div class="row">
            <div class="six badge triennale">
                <a href="https://informatica.uniurb.it/">
                    <div class="image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/square-informatica-applicata-triennale.jpg" />
                    </div>
                    <div class="subtitle">
                        Triennale
                    </div>
                </a>
            </div>

            <div class="six badge magistrale">
            <a href="https://informatica.uniurb.it/magistrale/">
                    <div class="image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/square-informatica-applicata-magistrale.jpg" />
                    </div>
                    <div class="subtitle">
                        Magistrale
                    </div>
                </a>
            </div>
        </div>

    </div>

</div>

<?php get_footer('redux');
