<form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">
    <div>
        <label class="screen-reader-text" for="s"> Search for :</label>
        <input type="text" name="s" id="s" placeholder="<?php the_search_query(); ?>"/>
        <input type="submit" value="Search" id="searchsubmit"/>
    </div>
</form>