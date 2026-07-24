<?php

/**
 * Event meta box class.
 * 
 * @package EventSphere
 */

namespace EventSphere\Admin;

class EventMetaBox
{

    public function __construct()
    {
        add_action('add_meta_boxes', [$this, 'register']);
        add_action('save_post_event', [$this, 'save']);
    }

    public function register(): void
    {
        add_meta_box(
            'eventsphere-details',
            __('Event Details', 'eventsphere'),
            [$this, 'render'],
            'event',
            'normal',
            'default',
        );
    }

    public function save(int $postId): void
    {

        // Verify nonce.
        if (
            ! isset($_POST['eventsphere_event_nonce']) ||
            ! wp_verify_nonce(
                sanitize_text_field(wp_unslash($_POST['eventsphere_event_nonce'])),
                'eventsphere_save_event'
            )
        ) {
            return;
        }

        // Don't save during autosave.
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }

        // Check permission.
        if (! current_user_can('edit_post', $postId)) {
            return;
        }

        $fields = [
            'event_date'       => 'sanitize_text_field',
            'event_time'       => 'sanitize_text_field',
            'venue'            => 'sanitize_text_field',
            'city'             => 'sanitize_text_field',
            'organizer'        => 'sanitize_text_field',
            'capacity'         => 'absint',
            'ticket_price'     => 'floatval',
            'registration_url' => 'esc_url_raw',
            'event_status'     => 'sanitize_text_field',
        ];
        // Save the fields.
        foreach ($fields as $metaKey => $sanitizeCallback) {

            if (isset($_POST[$metaKey])) {

                $value = wp_unslash($_POST[$metaKey]);
                $value = call_user_func($sanitizeCallback, $value);

                update_post_meta(
                    $postId,
                    $metaKey,
                    $value
                );
            }
        }
    }

    public function render(\WP_Post $post): void
    {
        wp_nonce_field(
            'eventsphere_save_event',
            'eventsphere_event_nonce'
        );

        $event = [
            'event_date'       => get_post_meta($post->ID, 'event_date', true),
            'event_time'       => get_post_meta($post->ID, 'event_time', true),
            'venue'            => get_post_meta($post->ID, 'venue', true),
            'city'             => get_post_meta($post->ID, 'city', true),
            'organizer'        => get_post_meta($post->ID, 'organizer', true),
            'capacity'         => get_post_meta($post->ID, 'capacity', true),
            'ticket_price'     => get_post_meta($post->ID, 'ticket_price', true),
            'registration_url' => get_post_meta($post->ID, 'registration_url', true),
            'event_status'     => get_post_meta($post->ID, 'event_status', true),
        ];
?>

        <p>
            <label for="event_date">
                <strong><?php esc_html_e('Event Date', 'eventsphere'); ?></strong>
            </label>
        </p>

        <input
            type="date"
            id="event_date"
            name="event_date"
            value="<?php echo esc_attr($event['event_date']); ?>" />

        <p>
            <label for="event_time"><strong>Event Time</strong></label>
        </p>

        <input
            type="time"
            id="event_time"
            name="event_time"
            value="<?php echo esc_attr($event['event_time']); ?>">
        <p>
            <label for="venue"><strong>Venue</strong></label>
        </p>

        <input
            type="text"
            id="venue"
            name="venue"
            class="widefat"
            value="<?php echo esc_attr($event['venue']); ?>">
        <p>
            <label for="city"><strong>City</strong></label>
        </p>

        <input
            type="text"
            id="city"
            name="city"
            class="widefat"
            value="<?php echo esc_attr($event['city']); ?>">
        <p>
            <label for="organizer"><strong>Organizer</strong></label>
        </p>

        <input
            type="text"
            id="organizer"
            name="organizer"
            class="widefat"
            value="<?php echo esc_attr($event['organizer']); ?>">
        <p>
            <label for="capacity"><strong>Capacity</strong></label>
        </p>

        <input
            type="number"
            id="capacity"
            name="capacity"
            value="<?php echo esc_attr($event['capacity']); ?>">
        <p>
            <label for="ticket_price"><strong>Ticket Price</strong></label>
        </p>

        <input
            type="number"
            step="0.01"
            id="ticket_price"
            name="ticket_price"
            value="<?php echo esc_attr($event['ticket_price']); ?>">
        <p>
            <label for="registration_url"><strong>Registration URL</strong></label>
        </p>

        <input
            type="url"
            id="registration_url"
            name="registration_url"
            class="widefat"
            value="<?php echo esc_attr($event['registration_url']); ?>">
        <p>
            <label for="event_status"><strong>Event Status</strong></label>
        </p>

        <select
            id="event_status"
            name="event_status"
            class="widefat">
            <option value="upcoming" <?php selected($event['event_status'], 'upcoming'); ?>>
                <?php esc_html_e('Upcoming', 'eventsphere'); ?>
            </option>
            <option value="ongoing" <?php selected($event['event_status'], 'ongoing'); ?>>
                <?php esc_html_e('Ongoing', 'eventsphere'); ?>
            </option>
            <option value="completed" <?php selected($event['event_status'], 'completed'); ?>>
                <?php esc_html_e('Completed', 'eventsphere'); ?>
            </option>
        </select>

<?php
    }
}
