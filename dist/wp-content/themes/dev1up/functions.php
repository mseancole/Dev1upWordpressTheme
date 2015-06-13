<?php
if( function_exists( 'register_sidebar' ) ) {
    register_sidebar( array(
    	'id' => 'about',
    	'name' => 'About Widget',
        'description' => 'These widgets will appear in the left sidebar under the Site name and will always be visible.',
        'class' => '',
        'before_widget' => '<div class="row">',
        'after_widget' => '</div></div>',
        'before_title' => '<div class="col-xs-6 col-md-4">',
        'after_title' => '</div><div class="col-xs-12 col-sm-6 col-md-8">'
    ) );

    register_sidebar( array(
        'id' => 'blog',
        'name' => 'Blog Sidebar',
        'description' => 'These widgets will appear in the left sidebar under the About Widget. They will only appear when the Blog is visible',
        'class' => '',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3 class="bg-primary">',
        'after_title' => '</h3>'
    ) );

    register_sidebar( array(
        'id' => 'single',
        'name' => 'Article Sidebar',
        'description' => 'These widgets will appear in the left sidebar under the About Widget. They will only appear on a single Article page.',
        'class' => '',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3 class="bg-primary">',
        'after_title' => '</h3>'
    ) );

    register_sidebar( array(
        'id' => 'doing',
        'name' => 'What I am Doing',
        'description' => 'These widgets will appear in the left sidebar under the About Widget. They will only appear when the Jumbotron is visible.',
        'class' => '',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3 class="bg-primary">',
        'after_title' => '</h3>'
    ) );

    register_sidebar( array(
        'id' => 'jumbotron',
        'name' => 'Jumbotron',
        'description' => 'This information will appear in a giant emphasized div at the beginning of the page.',
        'class' => '',
        'before_widget' => '<div class="jumbotron">',
        'after_widget' => '</div>',
        'before_title' => '<h1>',
        'after_title' => '</h1>'
    ) );
}

add_filter( 'widget_text', 'execute_php', 100 );
function execute_php( $html ) {
    if( strpos( $html, "<" . "?php" ) !== FALSE ) {
        ob_start();
        eval( "?" . ">" . $html );
        $html = ob_get_contents();
        ob_end_clean();
    }

    return $html;
}

function split_site_name() {
    $name = get_bloginfo( 'name' );
    $middle = floor( strlen( $name ) / 2 );
    return array(
        'first' => substr( $name, 0, $middle ),
        'last' => substr($name, $middle)
    );
}

function new_input_field( $id, $label, $placeholder, $value ) {
    return '<div class="form-group form-group-lg"><label for="' . $id . '">' . $label . '</label> <input id="' . $id . '" name="' . $id . '" type="text" class="form-control" placeholder="' . $placeholder . '" value="' . esc_attr( $value ) . '" /></div>';
}

function new_comment_fields( $user_identity, $commenter = array() ) {
    if( ! $commenter ) {
        return array();
    }

    $login_pattern = 'You must be <a href="%s">logged in</a> to post a comment.';
    $login_url = wp_login_url( apply_filters( 'the_permalink', get_permalink() ) );
    $login = sprintf( __( $login_pattern ), $login_url );

    $logout_pattern = 'Loggedin as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Logout of this account">Logout?</a>';
    $logout_url = wp_logout_url( apply_filters( 'the_permalink', get_permalink() ) );
    $logout = sprintf(
        __( $logout_pattern ),
        admin_url( 'profile.php' ),
        $user_identity,
        $logout_url
    );

    $fields = array(
        'author' => new_input_field( 'author', 'Name', 'Name', $commenter[ 'comment_author' ] ),
        'email' => new_input_field( 'email', 'Email', 'you@email.com', $commenter[ 'comment_author_email' ] ),
        'url' => new_input_field( 'url', 'Promote Yourself', 'www.you.com', $commenter[ 'comment_author_url' ] )
    );

    return array(
        'fields' => apply_filters( 'comment_form_default_fields', $fields ),
        'comment_field' => '<div class="form-group"><textarea name="comment" class="form-control" rows="8"></textarea></div>',
        'must_log_in' => '<p class="must-log-in">' . $login . '</p>',
        'logged_in_as' => '<p class="logged-in-as">' . $logout . '</p>',
        'comment_notes_before' => '',
        'comment_notes_after' => '',
        'class_submit' => 'btn btn-primary btn-lg btn-block',
        'title_reply' => '<h3 class="bg-primary">' . __( 'Join the Discussion' ) . '</h3>'
    );
}

function page_description() {
    if( ! is_single() ) {
        return bloginfo( 'description' );
    }

    $id = get_the_id();
    $post = get_post( $id );
    setup_postdata( $post );
    return get_the_excerpt();
}

function page_keywords() {
    $tags = is_single() ? get_the_tags() : get_tags();

    $keywords = array();
    foreach( $tags AS $tag ) {
        $keywords[] = $tag->name;
    }

    return implode( ',', $keywords );
}

function page_title() {
    $title = bloginfo( 'name' );
    $subtitle = is_single() ? ' - ' . get_the_title() : '';
    return $title . $subtitle;
}