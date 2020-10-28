<?php
function my_load_users() {  
    //hook our custom query action
    add_action( 'pre_user_query', 'my_query_clauses' ); 
    
    //run the query as usual
    $query = new WP_User_Query(array( 'fields' => array('ID', 'user_login', 'user_email')));
    $users = $query->get_results();
    
    //remove the action so it doesn't mess up with the rest of the user queries
    remove_action( 'pre_user_query', 'my_query_clauses' ); 
   
    return $users;   
  }

function my_query_clauses( $query )
{
    global $wpdb;
    
    $query->query_fields .= ', title.meta_value AS title, last_name.meta_value AS last_name';
    // $query->query_fields .= ', title.zmeta_value AS title';

    $query->query_from .= " LEFT JOIN
        $wpdb->usermeta title ON $wpdb->users.ID = title.user_id
            AND title.meta_key = 'title'
        AND $wpdb->usermeta last_name ON $wpdb->users.ID = last_name.user_id
            AND last_name.meta_key = 'last_name'";
      
    //and the last step is ordering users based on the billing_country values, when present
    $query->query_orderby = ' ORDER BY 
        CASE
            WHEN title="Founding Member" THEN 1
            WHEN title="Member" THEN 2
            WHEN title="Associate" THEN 3
        END ASC, name ASC';
}