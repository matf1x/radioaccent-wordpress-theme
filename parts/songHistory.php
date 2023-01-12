<?php
// Setup MySQL connection
$DB_HOST = "localhost"; 			        // Host (mostly localhost)
$DB_USER = ""; 		                        // The username of the database
$DB_PASS = ""; 		                        // The password of the database
$DB_BASE = ""; 		                        // The name of the database

// Connect to the database
$db = new PDO('mysql:host='.$DB_HOST.';dbname='.$DB_BASE.'', $DB_USER, $DB_PASS);

// Get the latest update
$sth = $db->prepare("SELECT l.artist as artist, l.title as title, l.cover as cover, h.start as time FROM songHistory h INNER JOIN songLibrary l ON h.trackGuid = l.trackGuid WHERE h.start < NOW() ORDER BY h.start DESC LIMIT 5");
$sth->execute();
$dbSong = $sth->fetchAll(PDO::FETCH_ASSOC);

// Create a counter
$i = 1;

?>
<section class="lastSongs">
    <div class="lastSongs--container container">
        <h2>Laatst gespeeld op Radio Accent</h2>
        <?php
        foreach($dbSong as $item) {
            // Set the text for the timestamp
            $text = ($i == 1) ? 'Nu speelt' : date('H:i', strtotime($item['time']));
            $class = ($i == 1) ? 'songInfo--timestamp noa' : 'songInfo--timestamp';
            ?>
            <div class="songItem">
                <img class="songItem--image" src="data:image/png;charset=utf-8;base64,<?= $item['cover'] ?>">
                <div class="songInfo">
                    <div>
                        <div class="<?= $class ?>"><?= $text ?></div>
                        <div class="songInfo--info">
                            <h4><?php echo $item['artist']; ?></h4>
                            <h5><?php echo $item['title']; ?></h5>
                        </div>
                    </div>
                </div>
            </div>
            <?php

            // Add 1 to counter
            $i++;
            
        }
        ?>
     </div>

     <div class="lastSongs--getMore container">
        <a href="/gedraaid">Bekijk meer platen <i class="fas fa-arrow-right"></i></a>
     </div>
</section>
