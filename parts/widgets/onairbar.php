<?php
    if(is_front_page()):
        print('<div id="playingBar" class="playingBar">');
    else:
        print('<div id="playingBar" class="playingBar playingBar--open">');
    endif;
?>
    <div class="container songContainer">
        <div class="songContainer--info">
            <i class="fas fa-headphones-alt"></i>
            <span id="currentSongInfo">
                <span data-player-elements="artist"></span> - <span data-player-elements="title"></span>
            </span>
        </div>
        <a id="openBarMessage" class="songContainer--button" data-action="send-message">
            <span>Stuur bericht</span> <i class="fa-solid fa-comment-dots"></i>
        </a>
        <a class="songContainer--button playButton" data-action="open-player">
            <span>Luister Live</span> <i class="fas fa-play"></i>
        </a>
    </div>
</div>