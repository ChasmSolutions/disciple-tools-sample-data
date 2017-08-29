<?php

/**
 * Disciple Tools Roles Sample
 *
 * @class dt_demo_roles
 * @version	0.1
 * @since 0.1
 * @package	dt_demo_roles
 * @author Chasm.Solutions & Kingdom.Training
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class dt_demo_roles {

    /**
     * dt_demo_roles The single instance of dt_demo_roles.
     * @var 	object
     * @access  private
     * @since 	0.1
     */
    private static $_instance = null;

    /**
     * Main dt_demo_roles Instance
     *
     * Ensures only one instance of dt_demo_roles is loaded or can be loaded.
     *
     * @since 0.1
     * @static
     * @return dt_demo_roles instance
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
    public function __construct () {    } // End __construct()

    public function reset_roles() {
        if (class_exists('Disciple_Tools')) {

            if (file_exists(get_home_path() . 'wp-content/plugins/disciple-tools/dt-core/admin/class-roles.php')) {
                require_once( get_home_path() . 'wp-content/plugins/disciple-tools/dt-core/admin/class-roles.php');
                $roles = Disciple_Tools_Roles::instance();
                $roles->set_roles();
                return 'Success';
            } else {
                return "failed to connect to " . get_home_path() . 'wp-content/plugins/disciple-tools/dt-core/admin/class-roles.php';
            }
        }
        else {
            return "Did not reset roles";
        }
    }

}