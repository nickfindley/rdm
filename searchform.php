<form id="searchform" role="search" action="<?php echo esc_url( site_url() ); ?>" method="get" class="search-results-inline">
    <div class="search-input">
        <label for="s" class="sr-only">Search RDM.law</label>
        <input zid="s" name="s" type="text" class="form-control" placeholder="<?php esc_attr_e( 'Search &hellip;', 'rdm' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>">
    </div>
    <div class="search-submit">
        <input type="submit" class="btn btn-beige" value="Go">
    </div>
</form>