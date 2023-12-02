<?php
// frontend.php

// Display social media links with Bootstrap and Font Awesome
function display_social_media_links($atts)
{
    // Create an array of social media links based on provided links
    $social_media_links = array(
        'facebook' => get_option('facebook_link'),
        'twitter' => get_option('twitter_link'),
        'instagram' => get_option('instagram_link'),
        'linkedin' => get_option('linkedin_link'),
        'youtube' => get_option('youtube_link'),
        'pinterest' => get_option('pinterest_link'),
        'tiktok' =>get_option('tiktok_link'),
    );

    // Filter out social media links with empty URLs
    $filtered_social_media_links = array_filter($social_media_links);

    // Check if there are any social media links to display
    if (empty($filtered_social_media_links)) {
        // No links provided or allowed to display, do not display anything
        return '';
    }

    ob_start(); // Start output buffering

?>
    


    <ul class="list-inline social-media-links">
        <?php foreach ($filtered_social_media_links as $platform => $link) : ?>
            <li class="list-inline-item">
            <a href="<?php echo esc_url($link); ?>"  class="text-dark" target="_blank">
                <?php if ($platform === 'twitter') : ?>
                    <i class="fa-brands fa-x-twitter"></i>
                <?php else : ?>
                    <i class="fa-brands fa-<?php echo esc_attr($platform); ?>"></i>
                <?php endif; ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>

<?php

    return ob_get_clean(); // Return the buffered output
}

// Shortcode for displaying social media links
add_shortcode('social_media_links', 'display_social_media_links');
