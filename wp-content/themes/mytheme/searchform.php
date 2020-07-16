
<div class="searchform section">
    <form role="search" class="form" action="<?php bloginfo('url'); ?>">
        <label for="s"></label>
        <input class="input" type="search" name="s" id="s" placeholder=" Rechercher ..." value="<?php echo get_search_query(); ?>">
        <button class="button is-primary">Go</button>
    </form>
</div>