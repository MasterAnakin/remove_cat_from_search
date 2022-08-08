function exclude_cat_from_search( $query ) {

   if ( !is_admin() && $query->is_main_query() && $query->is_search() ) {

       $query->set( 'post_type', array( 'product' ) );

       $tax_query = array(

           array(

               'taxonomy' => 'product_cat',
               'field'   => 'slug',
               'terms'   => 'no-search-display',
               'operator' => 'NOT IN',
           ),
       );
       $query->set( 'tax_query', $tax_query );
	}
}

add_action( 'pre_get_posts', 'exclude_cat_from_search' );
