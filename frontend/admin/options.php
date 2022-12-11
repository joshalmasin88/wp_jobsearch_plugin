<?php

if (get_option( 'joobleapikey' )){
    $key = '**********';
}
else {
    $key = 'Enter your API KEY Here';
}
?>

<h1>Job Searcher Options:</h1>

<p>
    <?php if (get_transient( 'error' )){ echo get_transient( 'error' ); } ?>
    <small>Please get the API key from: <a href="https://jooble.org/api/about?ref=apilist.fun">Here</a> and enter it in the form below</small>
    <form action="<?php echo esc_url(admin_url('admin-post.php'));  ?>" method="POST">
        <input type="text" name="apikey" placeholder="<?php echo esc_html($key); ?>">
        <input type="hidden" name="action" value="storeAPIKey">
        <input type="submit" value="Save">
    </form>
</p>