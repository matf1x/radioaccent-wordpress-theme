<?php get_template_part( 'components/sections/songHistory', 'top' ); ?>

<footer>
    <section class="moreAbout">
        <div class="container">
            <div class="logo">
                <img src="/player/assets/img/logo.png" alt="Radio Accent">
            </div>
            <div class="subMenu">
                <ul>
                    <li><a href="/hoe-luisteren">Hoe luisteren?</a></li>
                    <li><a href="/adverteren">Adverteren</a></li>
                    <li><a href="/privacybeleid">Privacybeleid</a></li>
                    <li><a href="javascript:showPrivacyBar()" class="cookie-law-info-again" data-nosnippet="true">Cookie instellingen</a></li>
                    <li><a href="/contacteer-on">Contacteer ons</a></li>
                </ul>
            </div>
            <div class="socials">
                <h4>Volg accent via</h4>
                <ul class="margin-bottom">
                    <li><a href="https://www.facebook.com/radioaccentgentwetteren/" target="_blank"><i class="fa-brands fa-facebook"></i></a></li>
                    <li><a href="https://twitter.com/radioaccentbe" target="_blank"><i class="fa-brands fa-twitter"></i></a></li>
                    <li><a href="https://www.instagram.com/radioaccent/" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
                    <li><a href="https://www.youtube.com/channel/UCgHgiCdJkz9xv1396ufy5mg" target="_blank"><i class="fa-brands fa-youtube"></i></a></li>
                </ul>

                <h4>Luister Accent onderweg</h4>
                <ul>
                    <li><a href="https://itunes.apple.com/app/id945478998?mt=8" target="_blank"><i class="fa-brands fa-app-store-ios"></i></a></li>
                    <li><a href="https://play.google.com/store/apps/details?id=com.radioline.android.radioline" target="_blank"><i class="fa-brands fa-google-play"></i></a></li>
                </ul>
            </div>
        </div>
    </section>
    <section class="legal">
        <div class="container">
            &copy; 2023 Radio Accent - VZW Radio VRS - Bookmolenstraat 7, 9230 Wetteren
        </div>
    </section>
</footer>

<!-- Send a message modal -->
<?php get_template_part( 'components/modals/message.modal', 'top' ); ?>

<!-- Javascriptin -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/fetch/2.0.3/fetch.js"></script>
<script src="<?php echo get_stylesheet_directory_uri().'/scripts/js/main.js'; ?>" type="module"></script>
<?php wp_footer(); ?>
<script type="text/javascript">
    function showPrivacyBar() {
        CLI.showagain_elm.slideUp(
            CLI.settings.animate_speed_hide,
            function () {
                CLI.bar_elm.slideDown(CLI.settings.animate_speed_show);
                if (CLI_COOKIEBAR_AS_POPUP) {
                    CLI.showPopupOverlay();
                }
            }
        );
    }
</script>
        
</body>
</html>