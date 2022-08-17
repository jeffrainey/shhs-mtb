<form id="searchform" class="search-bar"  style="display:none" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="grid-search-bar">
        <input type="text" class="search-field" name="s" placeholder="Enter your search here..." value="<?php echo get_search_query(); ?>">
        <input type="submit" value="SEARCH">
    </div>
</form>


