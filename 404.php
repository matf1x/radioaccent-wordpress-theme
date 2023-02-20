<?php
/**
 * The front page template
 */

get_header();
?>

    <section class="errorHeader container">
        <span>OOPS</span>
        <h3>Er is iets foutgelopen</h3>
    </section>

    <section id="pageContent" class="errorMessage">
        <p>Dit is jammer. Het lijkt er op dat deze pagina niet (meer) bestaat op deze site. Kan gebeuren3</p>
        <p>Maar hey, niet getreurd. Hieronder heb je een video om je weer blij te maken. En anders, klik gerust op een andere pagina.</p>
    </section>

    <section class="video">
        <iframe src="https://www.youtube-nocookie.com/embed/lExW80sXsHs" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </section>

<?php get_footer(); ?>