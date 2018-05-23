<?php $search_terms = htmlspecialchars( $_GET["s"] ); ?>

<!--
<form action="<?php bloginfo('siteurl'); ?>/" id="searchform" method="get">
    <label for="s" class="sr-only">Search</label>
    <div class="input-group">
        <input type="search" class="form-control" id="s" name="s" placeholder="Search the site"<?php if ( $search_terms !== '' ) { echo ' value="' . $search_terms . '"'; } ?> />
        <div class="input-group-append">
            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i><span class="sr-only">Search</span></button>
        </div>
    </div>
</form>
-->

<form action="https://google.com/search" id="searchform" method="get">
  <input type="hidden" name="sitesearch" value="https://www.chesterlestreetasc.co.uk" />
    <label for="s" class="sr-only">Search</label>
    <div class="input-group">
        <input type="search" class="form-control" id="q" name="q" placeholder="Search the site"<?php if ( $search_terms !== '' ) { echo ' value="' . $search_terms . '"'; } ?> />
        <div class="input-group-append">
            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i><span class="sr-only">Search</span></button>
        </div>
    </div>
</form>

<!--<form action="https://www.google.com/search" id="searchform" method="get">
    <label for="q" class="sr-only">Search</label>
    <div class="input-group">
        <input type="search" class="form-control" id="q" name="q" placeholder="Search the site"<?php if ( $search_terms !== '' ) { echo ' value="' . $search_terms . '"'; } ?> />
        <input type="hidden" name="sitesearch" value="https://www.chesterlestreetasc.co.uk">
        <span class="input-group-btn">
            <button type="submit" value="Google Search" class="btn btn-primary"><i class="fa fa-search"></i><span class="sr-only">Search</span></button>
        </span>
    </div>>
</form>-->
