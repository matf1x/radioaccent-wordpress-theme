        <div class="shareToSocials">
            <ul>
                <li>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank" class="share-facebook">
                        <i class="fab fa-facebook-square"></i> Deel op facebook <i class="fas fa-arrow-right"></i>
                    </a>
                </li>
                <li>
                    <a href="https://twitter.com/intent/tweet?text=<?php echo urlencode(get_the_title() . ' - ' . get_permalink() . ' @radioaccentbe'); ?>&source=webclient" target="_blank" class="share-twitter">
                    <i class="fab fa-twitter"></i> Deel op Twitter <i class="fas fa-arrow-right"></i>
                    </a>
                </li>
            </ul>
        </div>