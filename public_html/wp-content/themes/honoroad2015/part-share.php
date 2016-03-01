<div class="sns">
    <ul class="sns clearfix">
        <li>
            <a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&amp;t=<?php the_title(); ?>"onClick="window.open(encodeURI(decodeURI(this.href)), 'sharewindow', 'width=0, height=0, personalbar=0, toolbar=0, scrollbars=1, resizable=!'); return false;">
                <img src="<?php echo get_template_directory_uri() ?>/images/i-facebook-square.png" alt="share" >
            </a>
        </li>
        <li>
            <iframe src="http://www.facebook.com/plugins/like.php?href=<?php the_permalink(); ?>&amp;layout=box_count&amp;show_faces=false&amp;width=50&amp;action=like&amp;colorscheme=light&amp;height=62" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:70px; height:62px;" allowTransparency="true"></iframe>
        </li>
    </ul>
</div>