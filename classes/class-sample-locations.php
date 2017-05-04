<?php

/**
 * dt_sample_locations
 *
 * @class dt_sample_locations
 * @version	0.1
 * @since 0.1
 * @package	Disciple_Tools
 * @author Chasm.Solutions & Kingdom.Training
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class dt_sample_locations {

    /**
     * dt_sample_locations The single instance of dt_sample_locations.
     * @var 	object
     * @access  private
     * @since 	0.1
     */
    private static $_instance = null;

    /**
     * Main dt_sample_locations Instance
     *
     * Ensures only one instance of dt_sample_locations is loaded or can be loaded.
     *
     * @since 0.1
     * @static
     * @return dt_sample_locations instance
     */
    public static function instance () {
        if ( is_null( self::$_instance ) )
            self::$_instance = new self();
        return self::$_instance;
    } // End instance()

    /**
     * Constructor function.
     * @access  public
     * @since   0.1
     */
    public function __construct () {  } // End __construct()

    /**
     * Loops location creation according to supplied $count.
     * @param $count    int Number of records to create.
     * @return string
     */
    public function add_locations_by_count ($count)
    {
        $i = 0;
        while ($count > $i ) {

            $post = $this->single_random_location ();
            wp_insert_post($post);

            $i++;
        }
        return $count . ' records created';
    }

    /**
     * Builds a single random location record.
     * @return array|WP_Post
     */
    public function single_random_location () {

        $post = array(
            "post_title" => 'Location' . rand(100, 999),
            'post_type' => 'locations',
            "post_content" => ' ',
            "post_status" => "publish",
            "post_author" => get_current_user_id(),
        );

        return $post;
    }

}