<?php
// admin.php

// Add menu item in the admin menu
function social_media_links_menu()
{
    add_menu_page(
        'Social Media ',
        'Social Media ',
        'manage_options',
        'social-media-links',
        'social_media_links_page'
    );
    add_submenu_page(
        'social-media-links', 
        'Info', 
        'Info',
        'manage_options',
        'social-media-info',
        'social_media_info_page'
    );
}
add_action('admin_menu', 'social_media_links_menu');

// Create the admin settings page
function social_media_links_page()
{
    if (isset($_POST['submit_social_media_links'])) {
        // Save social media links
        update_option('facebook_link', esc_url($_POST['facebook_link']));
        update_option('twitter_link', esc_url($_POST['twitter_link']));
        update_option('instagram_link', esc_url($_POST['instagram_link']));
        update_option('linkedin_link', esc_url($_POST['linkedin_link']));
        update_option('youtube_link', esc_url($_POST['youtube_link']));
        update_option('pinterest_link', esc_url($_POST['pinterest_link']));
        update_option('tiktok_link', esc_url($_POST['tiktok_link']));

        echo '<div class="updated"><p>Social media links saved!</p></div>';
    }
?>

    <div class="wrap">
        <h2>Social Media Links</h2>

        <form method="post" action="">
            <!-- Facebook Section -->
            <div class="form-div">
                <label for="facebook_link">Facebook:</label>
                <input type="text" class="" name="facebook_link" value="<?php echo esc_attr(get_option('facebook_link')); ?>" /><br />
            </div>
            <!-- Twitter Section -->
            <div class="form-div">
                <label for="twitter_link">Twitter:</label>
                <input type="text" name="twitter_link" value="<?php echo esc_attr(get_option('twitter_link')); ?>" /><br />
            </div>
            <!-- Instagram Section -->
            <div class="form-div">
                <label for="instagram_link">Instagram:</label>
                <input type="text" name="instagram_link" value="<?php echo esc_attr(get_option('instagram_link')); ?>" /><br />
            </div>
            <!-- LinkedIn Section -->
            <div class="form-div">
                <label for="linkedin_link">LinkedIn:</label>
                <input type="text" name="linkedin_link" value="<?php echo esc_attr(get_option('linkedin_link')); ?>" /><br />
            </div>
            <!-- YouTube Section -->
            <div class="form-div">
                <label for="youtube_link">YouTube:</label>
                <input type="text" name="youtube_link" value="<?php echo esc_attr(get_option('youtube_link')); ?>" /><br />
            </div>
            <!-- Pinterest Section -->
            <div class="form-div">
                <label for="pinterest_link">Pinterest:</label>
                <input type="text" name="pinterest_link" value="<?php echo esc_attr(get_option('pinterest_link')); ?>" /><br />
            </div>
            <!-- TikTok Section -->
            <div class="form-div">
                <label for="tiktok_link">TikTok:</label>
                <input type="text" name="tiktok_link" value="<?php echo esc_attr(get_option('tiktok_link')); ?>" /><br />
            </div>
            <input type="submit" name="submit_social_media_links" class="" value="Save Links" />
        </form>
    </div>
    <!-- Add this script to your admin settings page -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('submit_social_media_links').addEventListener('click', function(event) {
                var youtubeLink = document.getElementById('youtube_link').value;
                if (youtubeLink !== '' && !isValidUrl(youtubeLink)) {
                    alert('Please enter a valid YouTube URL.');
                    event.preventDefault(); // Prevent form submission
                }
            });

            function isValidUrl(url) {
                // Use a regular expression to check if the input is a valid URL
                var urlPattern = /^(https?:\/\/)?([\w.]+)\.([a-z]{2,6}\.?)(\/[\w\d-]+)?(\/)?([^\s]*)?$/;
                return urlPattern.test(url);
            }
        });
    </script>

<?php
}
function social_media_info_page() {
    ?>
    <div class="wrap">
        <h2>Social Media Links - How to Use</h2>
      
        <p>To display the social media links widget, use the shortcode <code>[social_media_links]</code> in your posts or pages.
    </div>
    <?php
}