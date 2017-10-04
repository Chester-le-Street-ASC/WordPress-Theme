<?php $search_terms = htmlspecialchars( $_GET["s"] ); ?>

<form action="<?php bloginfo('siteurl'); ?>/" id="searchform" method="get">
    <label for="s" class="sr-only">Search</label>
    <div class="input-group">
        <input type="search" class="form-control" id="s" name="s" placeholder="Search the site"<?php if ( $search_terms !== '' ) { echo ' value="' . $search_terms . '"'; } ?> />
        <span class="input-group-btn">
            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i><span class="sr-only">Search</span></button>
        </span>
    </div> <!-- .input-group -->
</form>