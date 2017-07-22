<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux_Framework_sample_config_balloon' ) ) {

        class Redux_Framework_sample_config_balloon {

            public $args = array();
            public $sections = array();
            public $theme;
            public $ReduxFramework;

            public function __construct() {

                if ( ! class_exists( 'ReduxFramework' ) ) {
                    return;
                }

                // This is needed. Bah WordPress bugs.  ;)
                if ( true == Redux_Helpers::isTheme( __FILE__ ) ) {
                    $this->initSettings();
                } else {
                    add_action( 'plugins_loaded', array( $this, 'initSettings' ), 10 );
                }

            }

            public function initSettings() {

                // Just for demo purposes. Not needed per say.
                $this->theme = wp_get_theme();

                // Set the default arguments
                $this->setArguments();

                // Set a few help tabs so you can see how it's done
                $this->setHelpTabs();

                // Create the sections and fields
                $this->setSections();

                if ( ! isset( $this->args['opt_name'] ) ) { // No errors please
                    return;
                }

                // If Redux is running as a plugin, this will remove the demo notice and links
                //add_action( 'redux/loaded', array( $this, 'remove_demo' ) );

                // Function to test the compiler hook and demo CSS output.
                // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
                //add_filter('redux/options/'.$this->args['opt_name'].'/compiler', array( $this, 'compiler_action' ), 10, 3);

                // Change the arguments after they've been declared, but before the panel is created
                //add_filter('redux/options/'.$this->args['opt_name'].'/args', array( $this, 'change_arguments' ) );

                // Change the default value of a field after it's been set, but before it's been useds
                //add_filter('redux/options/'.$this->args['opt_name'].'/defaults', array( $this,'change_defaults' ) );

                // Dynamically add a section. Can be also used to modify sections/fields
                //add_filter('redux/options/' . $this->args['opt_name'] . '/sections', array($this, 'dynamic_section'));

                $this->ReduxFramework = new ReduxFramework( $this->sections, $this->args );
            }

            /**
             * This is a test function that will let you see when the compiler hook occurs.
             * It only runs if a field    set with compiler=>true is changed.
             * */
            function compiler_action( $options, $css, $changed_values ) {
                echo '<h1>The compiler hook has run!</h1>';
                echo "<pre>";
                print_r( $changed_values ); // Values that have changed since the last save
                echo "</pre>";
                //print_r($options); //Option values
                //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )

                /*
              // Demo of how to use the dynamic CSS and write your own static CSS file
              $filename = dirname(__FILE__) . '/style' . '.css';
              global $wp_filesystem;
              if( empty( $wp_filesystem ) ) {
                require_once( ABSPATH .'/wp-admin/includes/file.php' );
              WP_Filesystem();
              }

              if( $wp_filesystem ) {
                $wp_filesystem->put_contents(
                    $filename,
                    $css,
                    FS_CHMOD_FILE // predefined mode settings for WP files
                );
              }
             */
            }

            /**
             * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
             * Simply include this function in the child themes functions.php file.
             * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
             * so you must use get_template_directory_uri() if you want to use any of the built in icons
             * */
            function dynamic_section( $sections ) {
                //$sections = array();
                $sections[] = array(
                    'title'  => __( 'Section via hook', 'redux-framework-demo' ),
                    'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'redux-framework-demo' ),
                    'icon'   => 'el-icon-paper-clip',
                    // Leave this as a blank section, no options just some intro text set above.
                    'fields' => array()
                );

                return $sections;
            }

            /**
             * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
             * */
            function change_arguments( $args ) {
                //$args['dev_mode'] = true;

                return $args;
            }

            /**
             * Filter hook for filtering the default value of any given field. Very useful in development mode.
             * */
            function change_defaults( $defaults ) {
                $defaults['str_replace'] = 'Testing filter hook!';

                return $defaults;
            }

            // Remove the demo link and the notice of integrated demo from the redux-framework plugin
            function remove_demo() {

                // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
                if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                    remove_filter( 'plugin_row_meta', array(
                        ReduxFrameworkPlugin::instance(),
                        'plugin_metalinks'
                    ), null, 2 );

                    // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                    remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
                }
            }

            public function setSections() {

                /**
                 * Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
                 * */
                // Background Patterns Reader
                $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
                $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
                $sample_patterns      = array();

                if ( is_dir( $sample_patterns_path ) ) :

                    if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) :
                        $sample_patterns = array();

                        while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                            if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                                $name              = explode( '.', $sample_patterns_file );
                                $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                                $sample_patterns[] = array(
                                    'alt' => $name,
                                    'img' => $sample_patterns_url . $sample_patterns_file
                                );
                            }
                        }
                    endif;
                endif;

                ob_start();

                $ct          = wp_get_theme();
                $this->theme = $ct;
                $item_name   = $this->theme->get( 'Name' );
                $tags        = $this->theme->Tags;
                $screenshot  = $this->theme->get_screenshot();
                $class       = $screenshot ? 'has-screenshot' : '';

                $customize_title = sprintf( __( 'Customize &#8220;%s&#8221;', 'redux-framework-demo' ), $this->theme->display( 'Name' ) );

                ?>
                <div id="current-theme" class="<?php echo esc_attr( $class ); ?>">
                    <?php if ( $screenshot ) : ?>
                        <?php if ( current_user_can( 'edit_theme_options' ) ) : ?>
                            <a href="<?php echo wp_customize_url(); ?>" class="load-customize hide-if-no-customize"
                               title="<?php echo esc_attr( $customize_title ); ?>">
                                <img src="<?php echo esc_url( $screenshot ); ?>"
                                     alt="<?php esc_attr_e( 'Current theme preview', 'redux-framework-demo' ); ?>"/>
                            </a>
                        <?php endif; ?>
                        <img class="hide-if-customize" src="<?php echo esc_url( $screenshot ); ?>"
                             alt="<?php esc_attr_e( 'Current theme preview', 'redux-framework-demo' ); ?>"/>
                    <?php endif; ?>

                    <h4><?php echo $this->theme->display( 'Name' ); ?></h4>

                    <div>
                        <ul class="theme-info">
                            <li><?php printf( __( 'By %s', 'redux-framework-demo' ), $this->theme->display( 'Author' ) ); ?></li>
                            <li><?php printf( __( 'Version %s', 'redux-framework-demo' ), $this->theme->display( 'Version' ) ); ?></li>
                            <li><?php echo '<strong>' . __( 'Tags', 'redux-framework-demo' ) . ':</strong> '; ?><?php printf( $this->theme->display( 'Tags' ) ); ?></li>
                        </ul>
                        <p class="theme-description"><?php echo $this->theme->display( 'Description' ); ?></p>
                        <?php
                            if ( $this->theme->parent() ) {
                                printf( ' <p class="howto">' . __( 'This <a href="%1$s">child theme</a> requires its parent theme, %2$s.', 'redux-framework-demo' ) . '</p>', __( 'http://codex.wordpress.org/Child_Themes', 'redux-framework-demo' ), $this->theme->parent()->display( 'Name' ) );
                            }
                        ?>

                    </div>
                </div>

                <?php
                $item_info = ob_get_contents();

                ob_end_clean();

                $sampleHTML = '';
                if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
                    Redux_Functions::initWpFilesystem();

                    global $wp_filesystem;

                    $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
                }

                // ACTUAL DECLARATION OF SECTIONS
                $this->sections[] = array(
                    'title'  => __( 'Genetal Settings', 'redux-framework-demo' ),
                    'desc'   => __( 'General Options of this website Here', 'redux-framework-demo' ),
                    'icon'   => 'el-icon-home',
                    // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
                    'fields' => array(

                       
                        
                        array(
                            'id' => 'logopic',
                            'type' => 'media',
                            'compiler' => 'true',
                            'title' => __('Upload Logo Picture', 'kyte_theme'),
                            'desc' => __('Logo Picture not More than 100px x 63px .png or .gif image that will be your or Admin Picture.', 'balloon_theme')
                        ),

                        array(
                            'id' => 'favipic',
                            'type' => 'media',
                            'compiler' => 'true',
                            'title' => __('Upload Favicon icon', 'kyte_theme'),
                            'desc' => __('Favicon Icon not More than 16px x 16px .png or .gif image that will be your or Admin Picture.', 'balloon_theme')
                        ),

                        array(
                            'id' => 'dbuttonopt',
                            'type' => 'select',
                            
                            'title' => __('Download Button Option :', 'kyte_theme'),
                            'subtitle' => __('Do you want Download Button in Profile.', 'kyte_theme'),
                            'desc' => '',
                            'options' => array(
                                    'yes' => __('Yes', 'kyte_theme'),
                                    'no'=> __('NO', 'kyte_theme'),
                    
                            ),
                            'default'  => 'yes'
                            
                        ),

                        array(
                            'id'       => 'downloadbtc',
                            'type'     => 'text',
                            'title'    => __( 'Download Button Content', 'kyte_theme' ),
                            'subtitle' => __( 'Write your Download Button Content Here.', 'kyte_theme' ),
                            'default'  => 'Download CV',
                        ),
                        array(
                            'id'       => 'downloadbtnl',
                            'type'     => 'text',
                            'title'    => __( 'Download Button Link :', 'kyte_theme' ),
                            'subtitle' => __( 'Write your Download Button Link Here.', 'kyte_theme' ),
                            'default'  => '#',
                        ),

                        array(
                            'id' => 'color_option',
                            'type' => 'select',
                            
                            'title' => __('Select Color:', 'kyte_theme'),
                            'subtitle' => __('Select Your Website Color.', 'kyte_theme'),
                            'desc' => '',
                            'options' => array(
                                    'red'=> __('RED', 'kyte_theme'),
                                    'blue' => __('BLUE', 'kyte_theme'),
                                    'gold'=> __('GOLD', 'kyte_theme'),
                                    'green'=> __('GREEN', 'kyte_theme'),
                                    'pink'=> __('PINK', 'kyte_theme'),
                                    'purple'=> __('PURPLE', 'kyte_theme'),
                                    

                    
                            ),
                            'default'  => 'blue'
                            
                        )

                        
                        
                    
                        
                    ),
                );

                // Profile Options
        
                 // ACTUAL DECLARATION OF SECTIONS
                $this->sections[] = array(
                    'icon'   => 'el-icon-list-alt',
                    'title'  => __( 'Profile Settings', 'redux-framework-demo' ),
                    'desc'   => __( 'All Profile Related Options of this section Here', 'redux-framework-demo' ),
                   
                    // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
                    'fields' => array(

                       
                        array(
                            'id'       => 'protitlem',
                            'type'     => 'text',
                            'title'    => __( 'Profile title :', 'kyte_theme' ),
                            'subtitle' => __( 'Write Profile Title for Mobile Viewers', 'kyte_theme' ),
                            'default'  => 'Profile',
                        ),

                        array(
                            'id' => 'profilepic',
                            'type' => 'media',
                            'compiler' => 'true',
                            'title' => __('Upload Profile Picture', 'kyte_theme'),
                            'desc' => __('Logo Picture not More than 80px x 80px .png or .gif image that will be your or Admin Picture.', 'balloon_theme')
                        ),

                        array(
                            'id'       => 'Skilltop',
                            'type'     => 'text',
                            'title'    => __( 'Skill :', 'kyte_theme' ),
                            'subtitle' => __( 'Write Your content How you Want to start (Eg. Hi Or Hellow Or anything)', 'kyte_theme' ),
                            'default'  => 'Front-End Developer, Web Designer, Illustrator',
                        ),

                        array(
                            'id'       => 'procontent',
                            'type'     => 'text',
                            'title'    => __( 'Content Start :', 'kyte_theme' ),
                            'subtitle' => __( 'Write Your Skill (Eg. Front-End Developer, Web Designer, Illustrator)', 'kyte_theme' ),
                            'default'  => 'Hi',
                        ),

                        array(
                            'id'       => 'profilecontent',
                            'type'     => 'textarea',
                            'title'    => __( 'Content :', 'kyte_theme' ),
                            'subtitle' => __( 'Write Your Profile Content after Start', 'kyte_theme' ),
                            'default'  => 'I"m Katya. Front-end developer based on Saint Petersburg, Russia. While not coding, i love to play guitar and read comic books.',
                        ),

                        
                    ),
                );

                
                $this->sections[] = array(
                    'icon'   => 'el-icon-cogs',
                    'title'  => __( 'Social Links Options', 'redux-framework-demo' ),
                    'fields' => array(

                        array(
                            'id' => 'fb',
                            'type' => 'select',
                            
                            'title' => __('Facebook social Icon:', 'kyte_theme'),
                            'subtitle' => __('Do you want fb social icon in Profile.', 'kyte_theme'),
                            'desc' => '',
                            'options' => array(
                                    'yes' => __('Yes', 'kyte_theme'),
                                    'no'=> __('NO', 'kyte_theme'),
                    
                            ),
                            'default'  => 'yes'
                            
                        ),
                        array(
                            'id' => 'fblink',
                            'type' => 'text',
                            'title' => __('Facebbok Link ', 'kyte_theme'),
                            'subtitle' => __('Write a Fb link text of your Profile', 'kyte_theme'),
                            'validate' => 'url'
                            
                        ),

                       array(
                            'id' => 'tw',
                            'type' => 'select',
                            'title' => __('Twitter social Icon:', 'kyte_theme'),
                            'subtitle' => __('Do you want Twitter social icon in Profile.', 'kyte_theme'),
                            'desc' => '',
                            'options' => array(
                                    'yes' => __('Yes', 'kyte_theme'),
                                    'no'=> __('NO', 'kyte_theme'),
                            ),
                            'default'  => 'yes'
                        ),

                        array(
                                'id' => 'twlink',
                                'type' => 'text',
                                'title' => __('Twitter Link', 'kyte_theme'),
                                'subtitle' => __('Write a Twitter Link text of your Profile', 'kyte_theme'),
                                'validate' => 'url'
                        ),

                        array(
                            'id' => 'dr',
                            'type' => 'select',
                            'title' => __('Dribble social Icon:', 'kyte_theme'),
                            'subtitle' => __('Do you want Dribble social icon in Profile.', 'kyte_theme'),
                            'desc' => '',
                            'options' => array(
                                    'yes' => __('Yes', 'kyte_theme'),
                                    'no'=> __('NO', 'kyte_theme'),
                            ),
                            'default'  => 'yes'
                        ),

                        array(
                                'id' => 'drlink',
                                'type' => 'text',
                                'title' => __('Dribble Link', 'kyte_theme'),
                                'subtitle' => __('Write a Dribble Link text of your Profile', 'kyte_theme'),
                                'validate' => 'url'
                        ),

                        array(
                            'id' => 'pl',
                            'type' => 'select',
                            'title' => __('Pinterest social Icon:', 'kyte_theme'),
                            'subtitle' => __('Do you want Pinterest social icon in Profile.', 'kyte_theme'),
                            'desc' => '',
                            'options' => array(
                                    'yes' => __('Yes', 'kyte_theme'),
                                    'no'=> __('NO', 'kyte_theme'),
                            ),
                            'default'  => 'no'
                        ),

                        array(
                                'id' => 'pinterest',
                                'type' => 'text',
                                'title' => __('Pinterest Link', 'kyte_theme'),
                                'subtitle' => __('Write a Pinterest Link text of your Profile', 'kyte_theme'),
                                'validate' => 'url'
                        ),

                        array(
                            'id' => 'lin',
                            'type' => 'select',
                            'title' => __('LinkedIn social Icon:', 'kyte_theme'),
                            'subtitle' => __('Do you want LinkedIn social icon in Profile.', 'kyte_theme'),
                            'desc' => '',
                            'options' => array(
                                    'yes' => __('Yes', 'kyte_theme'),
                                    'no'=> __('NO', 'kyte_theme'),
                            ),
                            'default'  => 'no'
                        ),

                        array(
                                'id' => 'linkedin',
                                'type' => 'text',
                                'title' => __('LinkedIn Link', 'kyte_theme'),
                                'subtitle' => __('Write a LinkedIn Link text of your Profile', 'kyte_theme'),
                                'validate' => 'url'
                        ),

                        array(
                            'id' => 'gl',
                            'type' => 'select',
                            'title' => __('Google+ social Icon:', 'kyte_theme'),
                            'subtitle' => __('Do you want Google+ social icon in Profile.', 'kyte_theme'),
                            'desc' => '',
                            'options' => array(
                                    'yes' => __('Yes', 'kyte_theme'),
                                    'no'=> __('NO', 'kyte_theme'),
                            ),
                            'default'  => 'no'
                        ),

                        array(
                                'id' => 'glink',
                                'type' => 'text',
                                'title' => __('Google+ Link', 'kyte_theme'),
                                'subtitle' => __('Write a Google+ Link text of your Profile', 'kyte_theme'),
                                'validate' => 'url'
                        ),

                        array(
                            'id' => 'skl',
                            'type' => 'select',
                            'title' => __('Skype social Icon:', 'kyte_theme'),
                            'subtitle' => __('Do you want Skype social icon in Profile.', 'kyte_theme'),
                            'desc' => '',
                            'options' => array(
                                    'yes' => __('Yes', 'kyte_theme'),
                                    'no'=> __('NO', 'kyte_theme'),
                            ),
                            'default'  => 'no'
                        ),

                        array(
                                'id' => 'sklink',
                                'type' => 'text',
                                'title' => __('Skype Link', 'kyte_theme'),
                                'subtitle' => __('Write a Skype Link text of your Profile', 'kyte_theme'),
                                'validate' => 'url'
                        ),

                        array(
                            'id' => 'flc',
                            'type' => 'select',
                            'title' => __('Flickr social Icon:', 'kyte_theme'),
                            'subtitle' => __('Do you want Flickr social icon in Profile.', 'kyte_theme'),
                            'desc' => '',
                            'options' => array(
                                    'yes' => __('Yes', 'kyte_theme'),
                                    'no'=> __('NO', 'kyte_theme'),
                            ),
                            'default'  => 'no'
                        ),

                        array(
                                'id' => 'flclink',
                                'type' => 'text',
                                'title' => __('Flickr Link', 'kyte_theme'),
                                'subtitle' => __('Write a Flickr Link text of your Profile', 'kyte_theme'),
                                'validate' => 'url'
                        ),
                        array(
                            'id' => 'yt',
                            'type' => 'select',
                            'title' => __('Youtube social Icon:', 'kyte_theme'),
                            'subtitle' => __('Do you want Youtube social icon in Profile.', 'kyte_theme'),
                            'desc' => '',
                            'options' => array(
                                    'yes' => __('Yes', 'kyte_theme'),
                                    'no'=> __('NO', 'kyte_theme'),
                            ),
                            'default'  => 'no'
                        ),

                        array(
                                'id' => 'ytlink',
                                'type' => 'text',
                                'title' => __('Youtube Link', 'kyte_theme'),
                                'subtitle' => __('Write a Youtube Link text of your Profile', 'kyte_theme'),
                                'validate' => 'url'
                        ),

                        array(
                            'id' => 'dbx',
                            'type' => 'select',
                            'title' => __('DropBox social Icon:', 'kyte_theme'),
                            'subtitle' => __('Do you want DropBox social icon in Profile.', 'kyte_theme'),
                            'desc' => '',
                            'options' => array(
                                    'yes' => __('Yes', 'kyte_theme'),
                                    'no'=> __('NO', 'kyte_theme'),
                            ),
                            'default'  => 'no'
                        ),
                       
                        array(
                                'id' => 'dblink',
                                'type' => 'text',
                                'title' => __('DropBox Link', 'kyte_theme'),
                                'subtitle' => __('Write a DropBox Link text of your Profile', 'kyte_theme'),
                                'validate' => 'url'
                        ),

                        array(
                            'id' => 'bh',
                            'type' => 'select',
                            'title' => __('Behance social Icon:', 'kyte_theme'),
                            'subtitle' => __('Do you want Behance social icon in Profile.', 'kyte_theme'),
                            'desc' => '',
                            'options' => array(
                                    'yes' => __('Yes', 'kyte_theme'),
                                    'no'=> __('NO', 'kyte_theme'),
                            ),
                            'default'  => 'yes'
                        ),

                        
                        array(
                                'id' => 'behance',
                                'type' => 'text',
                                'title' => __('Behance Link', 'kyte_theme'),
                                'subtitle' => __('Write a Behance Link text of your Profile', 'kyte_theme'),
                                'validate' => 'url'
                        )
                    )
                );

               

                /**
                 *  Note here I used a 'heading' in the sections array construct
                 *  This allows you to use a different title on your options page
                 * instead of reusing the 'title' value.  This can be done on any
                 * section - kp
                 */
                $this->sections[] = array(
                    'icon'    => 'el-icon-bullhorn',
                    'title'   => __( 'Resume Skill', 'redux-framework-demo' ),
                    'heading' => __( 'ALL Skill Related Options Here.', 'redux-framework-demo' ),
                    
                    'fields'  => array(
                        array(
                                'id' => 'skilltitle',
                                'type' => 'text',
                                'title' => __('Skill Title :', 'kyte_theme'),
                                'subtitle' => __('Write Skill Title Here.', 'kyte_theme'),
                                'default'  => 'My skills',
                        ),

                        array(
                            'id' => 'sk1',
                            'type' => 'select',
                            'title' => __('Want to Show Skill 1? :', 'kyte_theme'),
                            'subtitle' => __('if you want to show skill 1 please select yes', 'kyte_theme'),
                            'desc' => '',
                            'options' => array(
                                    'yes' => __('Yes', 'kyte_theme'),
                                    'no'=> __('NO', 'kyte_theme'),
                            ),
                            'default'  => 'yes'
                        ),

                        array(
                                'id' => 'skilln1',
                                'type' => 'text',
                                'title' => __('Skill Name 1 :', 'kyte_theme'),
                                'subtitle' => __('Write Skill Name 1.', 'kyte_theme'),
                                'default'  => 'HTML / CSS',
                        ),

                        array(
                                'id' => 'skill1',
                                'type' => 'text',
                                'title' => __('Skill Percent 1 :', 'kyte_theme'),
                                'subtitle' => __('Write Skill 1 Percent Number.', 'kyte_theme'),
                                'default'  => '80',
                        ),

                        array(
                            'id' => 'sk2',
                            'type' => 'select',
                            'title' => __('Want to Show Skill 2? :', 'kyte_theme'),
                            'subtitle' => __('if you want to show skill 2 please select yes', 'kyte_theme'),
                            'desc' => '',
                            'options' => array(
                                    'yes' => __('Yes', 'kyte_theme'),
                                    'no'=> __('NO', 'kyte_theme'),
                            ),
                            'default'  => 'yes'
                        ),

                        array(
                                'id' => 'skilln2',
                                'type' => 'text',
                                'title' => __('Skill Name 2 :', 'kyte_theme'),
                                'subtitle' => __('Write Skill Name 2.', 'kyte_theme'),
                                'default'  => 'jQuery',
                        ),

                         array(
                                'id' => 'skill2',
                                'type' => 'text',
                                'title' => __('Skill Percent 2 :', 'kyte_theme'),
                                'subtitle' => __('Write Skill 2 Percent Number.', 'kyte_theme'),
                                'default'  => '70',
                        ),

                        array(
                            'id' => 'sk3',
                            'type' => 'select',
                            'title' => __('Want to Show Skill 3? :', 'kyte_theme'),
                            'subtitle' => __('if you want to show skill 3 please select yes', 'kyte_theme'),
                            'desc' => '',
                            'options' => array(
                                    'yes' => __('Yes', 'kyte_theme'),
                                    'no'=> __('NO', 'kyte_theme'),
                            ),
                            'default'  => 'yes'
                        ),

                        array(
                                'id' => 'skilln3',
                                'type' => 'text',
                                'title' => __('Skill Name 3 :', 'kyte_theme'),
                                'subtitle' => __('Write Skill Name 3.', 'kyte_theme'),
                                'default'  => 'WordPress',
                        ),

                        array(
                                'id' => 'skill3',
                                'type' => 'text',
                                'title' => __('Skill Percent 3 :', 'kyte_theme'),
                                'subtitle' => __('Write Skill 3 Percent Number.', 'kyte_theme'),
                                'default'  => '65',
                        ),

                        array(
                            'id' => 'sk4',
                            'type' => 'select',
                            'title' => __('Want to Show Skill 4? :', 'kyte_theme'),
                            'subtitle' => __('if you want to show skill 4 please select yes', 'kyte_theme'),
                            'desc' => '',
                            'options' => array(
                                    'yes' => __('Yes', 'kyte_theme'),
                                    'no'=> __('NO', 'kyte_theme'),
                            ),
                            'default'  => 'no'
                        ),

                        array(
                                'id' => 'skilln4',
                                'type' => 'text',
                                'title' => __('Skill Name 4 :', 'kyte_theme'),
                                'subtitle' => __('Write Skill Name 4.', 'kyte_theme'),
                                'default'  => 'PHP',
                        ),

                        array(
                                'id' => 'skill4',
                                'type' => 'text',
                                'title' => __('Skill Percent 4 :', 'kyte_theme'),
                                'subtitle' => __('Write Skill 4 Percent Number.', 'kyte_theme'),
                                'default'  => '90',
                        ),

                        array(
                            'id' => 'sk5',
                            'type' => 'select',
                            'title' => __('Want to Show Skill 5? :', 'kyte_theme'),
                            'subtitle' => __('if you want to show skill 5 please select yes', 'kyte_theme'),
                            'desc' => '',
                            'options' => array(
                                    'yes' => __('Yes', 'kyte_theme'),
                                    'no'=> __('NO', 'kyte_theme'),
                            ),
                            'default'  => 'no'
                        ),

                        array(
                                'id' => 'skilln5',
                                'type' => 'text',
                                'title' => __('Skill Name 5 :', 'kyte_theme'),
                                'subtitle' => __('Write Skill Name 5.', 'kyte_theme'),
                                'default'  => 'WordPress',
                        ),

                        array(
                                'id' => 'skill5',
                                'type' => 'text',
                                'title' => __('Skill Percent 5 :', 'kyte_theme'),
                                'subtitle' => __('Write Skill 5 Percent Number.', 'kyte_theme'),
                                'default'  => '65',
                        ),

                        array(
                            'id' => 'sk6',
                            'type' => 'select',
                            'title' => __('Want to Show Skill 6? :', 'kyte_theme'),
                            'subtitle' => __('if you want to show skill 6 please select yes', 'kyte_theme'),
                            'desc' => '',
                            'options' => array(
                                    'yes' => __('Yes', 'kyte_theme'),
                                    'no'=> __('NO', 'kyte_theme'),
                            ),
                            'default'  => 'no'
                        ),

                        array(
                                'id' => 'skilln6',
                                'type' => 'text',
                                'title' => __('Skill Name 6 :', 'kyte_theme'),
                                'subtitle' => __('Write Skill Name 6.', 'kyte_theme'),
                                'default'  => 'WordPress',
                        ),

                        array(
                                'id' => 'skill6',
                                'type' => 'text',
                                'title' => __('Skill Percent 6 :', 'kyte_theme'),
                                'subtitle' => __('Write Skill 6 Percent Number.', 'kyte_theme'),
                                'default'  => '65',
                        ),

                        array(
                            'id' => 'sk7',
                            'type' => 'select',
                            'title' => __('Want to Show Skill 7? :', 'kyte_theme'),
                            'subtitle' => __('if you want to show skill 7 please select yes', 'kyte_theme'),
                            'desc' => '',
                            'options' => array(
                                    'yes' => __('Yes', 'kyte_theme'),
                                    'no'=> __('NO', 'kyte_theme'),
                            ),
                            'default'  => 'no'
                        ),

                        array(
                                'id' => 'skilln7',
                                'type' => 'text',
                                'title' => __('Skill Name 7 :', 'kyte_theme'),
                                'subtitle' => __('Write Skill Name 7.', 'kyte_theme'),
                                'default'  => 'WordPress',
                        ),

                        array(
                                'id' => 'skill7',
                                'type' => 'text',
                                'title' => __('Skill Percent 7 :', 'kyte_theme'),
                                'subtitle' => __('Write Skill 7 Percent Number.', 'kyte_theme'),
                                'default'  => '65',
                        ),

                        array(
                            'id' => 'sk8',
                            'type' => 'select',
                            'title' => __('Want to Show Skill 8? :', 'kyte_theme'),
                            'subtitle' => __('if you want to show skill 8 please select yes', 'kyte_theme'),
                            'desc' => '',
                            'options' => array(
                                    'yes' => __('Yes', 'kyte_theme'),
                                    'no'=> __('NO', 'kyte_theme'),
                            ),
                            'default'  => 'no'
                        ),

                        array(
                                'id' => 'skilln8',
                                'type' => 'text',
                                'title' => __('Skill Name 8 :', 'kyte_theme'),
                                'subtitle' => __('Write Skill Name 8.', 'kyte_theme'),
                                'default'  => 'WordPress',
                        ),

                        array(
                                'id' => 'skill8',
                                'type' => 'text',
                                'title' => __('Skill Percent 8 :', 'kyte_theme'),
                                'subtitle' => __('Write Skill 8 Percent Number.', 'kyte_theme'),
                                'default'  => '65',
                        ),

                        array(
                            'id' => 'sk9',
                            'type' => 'select',
                            'title' => __('Want to Show Skill 9? :', 'kyte_theme'),
                            'subtitle' => __('if you want to show skill 9 please select yes', 'kyte_theme'),
                            'desc' => '',
                            'options' => array(
                                    'yes' => __('Yes', 'kyte_theme'),
                                    'no'=> __('NO', 'kyte_theme'),
                            ),
                            'default'  => 'no'
                        ),

                        array(
                                'id' => 'skilln9',
                                'type' => 'text',
                                'title' => __('Skill Name 9 :', 'kyte_theme'),
                                'subtitle' => __('Write Skill Name 9.', 'kyte_theme'),
                                'default'  => 'WordPress',
                        ),

                        array(
                                'id' => 'skill9',
                                'type' => 'text',
                                'title' => __('Skill Percent 9 :', 'kyte_theme'),
                                'subtitle' => __('Write Skill 9 Percent Number.', 'kyte_theme'),
                                'default'  => '65',
                        ),

                        array(
                            'id' => 'sk10',
                            'type' => 'select',
                            'title' => __('Want to Show Skill 10? :', 'kyte_theme'),
                            'subtitle' => __('if you want to show skill 10 please select yes', 'kyte_theme'),
                            'desc' => '',
                            'options' => array(
                                    'yes' => __('Yes', 'kyte_theme'),
                                    'no'=> __('NO', 'kyte_theme'),
                            ),
                            'default'  => 'no'
                        ),

                        array(
                                'id' => 'skilln10',
                                'type' => 'text',
                                'title' => __('Skill Name 10 :', 'kyte_theme'),
                                'subtitle' => __('Write Skill Name 10.', 'kyte_theme'),
                                'default'  => 'WordPress',
                        ),

                        array(
                                'id' => 'skill10',
                                'type' => 'text',
                                'title' => __('Skill Percent 10 :', 'kyte_theme'),
                                'subtitle' => __('Write Skill 10 Percent Number.', 'kyte_theme'),
                                'default'  => '65',
                        ),

                    )
                );

                

                $this->sections[] = array(
                    'icon'   => 'el-icon-list-alt',
                    'title'  => __( 'Contact Options', 'redux-framework-demo' ),
                    'heading' => __( 'ALL Contact Related Options Here.', 'redux-framework-demo' ),
                    'fields' => array(
                        array(
                                'id' => 'conaddr',
                                'type' => 'text',
                                'title' => __('Contact Address :', 'kyte_theme'),
                                'subtitle' => __('Write Your Contact address.', 'kyte_theme'),
                                'default'  => 'Saint Petersburg, Russia',
                        ),
                        array(
                                'id' => 'contactmai',
                                'type' => 'text',
                                'title' => __('Contact Email :', 'kyte_theme'),
                                'subtitle' => __('Write Your Contact Email.', 'kyte_theme'),
                                'validate' => 'email',
                                'msg'      => 'custom error message',
                                'default'  => 'katya@gmail.com',
                                
                        ),

                        array(
                                'id' => 'contactnum',
                                'type' => 'text',
                                'title' => __('Contact Phone :', 'kyte_theme'),
                                'subtitle' => __('Write Your Contact Phone.', 'kyte_theme'),
                                'default'  => '+6282365104013',
                        ),

                        array(
                                'id' => 'twittertitle',
                                'type' => 'text',
                                'title' => __('Twitter Title :', 'kyte_theme'),
                                'subtitle' => __('Write Your Twitter Title Here.', 'kyte_theme'),
                                'default'  => 'Latest tweet',
                        ),

                        array(
                                'id' => 'twittercode',
                                'type' => 'text',
                                'title' => __('Twitter Code :', 'kyte_theme'),
                                'subtitle' => __('Write Your Twitter Code Here.', 'kyte_theme'),
                                'default'  => '354314774856757248',
                        ),

                        array(
                                'id' => 'lat',
                                'type' => 'text',
                                'title' => __('Map Latitude :', 'kyte_theme'),
                                'subtitle' => __('Write Latitude for your place.', 'kyte_theme'),
                                'default'  => '59.9174455',
                        ),

                        array(
                                'id' => 'lng',
                                'type' => 'text',
                                'title' => __('Map Longitude :', 'kyte_theme'),
                                'subtitle' => __('Write Longitude for your place.', 'kyte_theme'),
                                'default'  => '30.3250575',
                        ),

                       
                    )
                );

                $theme_info = '<div class="redux-framework-section-desc">';
                $theme_info .= '<p class="redux-framework-theme-data description theme-uri">' . __( '<strong>Theme URL:</strong> ', 'redux-framework-demo' ) . '<a href="' . $this->theme->get( 'ThemeURI' ) . '" target="_blank">' . $this->theme->get( 'ThemeURI' ) . '</a></p>';
                $theme_info .= '<p class="redux-framework-theme-data description theme-author">' . __( '<strong>Author:</strong> ', 'redux-framework-demo' ) . $this->theme->get( 'Author' ) . '</p>';
                $theme_info .= '<p class="redux-framework-theme-data description theme-version">' . __( '<strong>Version:</strong> ', 'redux-framework-demo' ) . $this->theme->get( 'Version' ) . '</p>';
                $theme_info .= '<p class="redux-framework-theme-data description theme-description">' . $this->theme->get( 'Description' ) . '</p>';
                $tabs = $this->theme->get( 'Tags' );
                if ( ! empty( $tabs ) ) {
                    $theme_info .= '<p class="redux-framework-theme-data description theme-tags">' . __( '<strong>Tags:</strong> ', 'redux-framework-demo' ) . implode( ', ', $tabs ) . '</p>';
                }
                $theme_info .= '</div>';

                if ( file_exists( dirname( __FILE__ ) . '/../README.md' ) ) {
                    $this->sections['theme_docs'] = array(
                        'icon'   => 'el-icon-list-alt',
                        'title'  => __( 'Documentation', 'redux-framework-demo' ),
                        'fields' => array(
                            array(
                                'id'       => '17',
                                'type'     => 'raw',
                                'markdown' => true,
                                'content'  => WP_Filesystem( dirname( __FILE__ ) . '/../README.md' )
                            ),
                        ),
                    );
                }

                // You can append a new section at any time.
                

                $this->sections[] = array(
                    'icon'            => 'el-icon-list-alt',
                    'title'           => __( 'Customizer Only', 'redux-framework-demo' ),
                    'desc'            => __( '<p class="description">This Section should be visible only in Customizer</p>', 'redux-framework-demo' ),
                    'customizer_only' => true,
                    'fields'          => array(
                        array(
                            'id'              => 'opt-customizer-only',
                            'type'            => 'select',
                            'title'           => __( 'Customizer Only Option', 'redux-framework-demo' ),
                            'subtitle'        => __( 'The subtitle is NOT visible in customizer', 'redux-framework-demo' ),
                            'desc'            => __( 'The field desc is NOT visible in customizer.', 'redux-framework-demo' ),
                            'customizer_only' => true,
                            //Must provide key => value pairs for select options
                            'options'         => array(
                                '1' => 'Opt 1',
                                '2' => 'Opt 2',
                                '3' => 'Opt 3'
                            ),
                            'default'         => '2'
                        ),
                    )
                );

                $this->sections[] = array(
                    'title'  => __( 'Import / Export', 'redux-framework-demo' ),
                    'desc'   => __( 'Import and Export your Redux Framework settings from file, text or URL.', 'redux-framework-demo' ),
                    'icon'   => 'el-icon-refresh',
                    'fields' => array(
                        array(
                            'id'         => 'opt-import-export',
                            'type'       => 'import_export',
                            'title'      => 'Import Export',
                            'subtitle'   => 'Save and restore your Redux options',
                            'full_width' => false,
                        ),
                    ),
                );

                $this->sections[] = array(
                    'type' => 'divide',
                );

                $this->sections[] = array(
                    'icon'   => 'el-icon-info-sign',
                    'title'  => __( 'Theme Information', 'redux-framework-demo' ),
                    'desc'   => __( '<p class="description">This is the Description. Again HTML is allowed</p>', 'redux-framework-demo' ),
                    'fields' => array(
                        array(
                            'id'      => 'opt-raw-info',
                            'type'    => 'raw',
                            'content' => $item_info,
                        )
                    ),
                );

                if ( file_exists( trailingslashit( dirname( __FILE__ ) ) . 'README.html' ) ) {
                    $tabs['docs'] = array(
                        'icon'    => 'el-icon-book',
                        'title'   => __( 'Documentation', 'redux-framework-demo' ),
                        'content' => nl2br( WP_Filesystem( trailingslashit( dirname( __FILE__ ) ) . 'README.html' ) )
                    );
                }
            }

            public function setHelpTabs() {

                // Custom page help tabs, displayed using the help API. Tabs are shown in order of definition.
                $this->args['help_tabs'][] = array(
                    'id'      => 'redux-help-tab-1',
                    'title'   => __( 'Theme Information 1', 'redux-framework-demo' ),
                    'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' )
                );

                $this->args['help_tabs'][] = array(
                    'id'      => 'redux-help-tab-2',
                    'title'   => __( 'Theme Information 2', 'redux-framework-demo' ),
                    'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' )
                );

                // Set the help sidebar
                $this->args['help_sidebar'] = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'redux-framework-demo' );
            }

            /**
             * All the possible arguments for Redux.
             * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
             * */
            public function setArguments() {

                $theme = wp_get_theme(); // For use with some settings. Not necessary.

                $this->args = array(
                    // TYPICAL -> Change these values as you need/desire
                    'opt_name'             => 'kyte_theme',
                    // This is where your data is stored in the database and also becomes your global variable name.
                    'display_name'         => $theme->get( 'Name' ),
                    // Name that appears at the top of your panel
                    'display_version'      => $theme->get( 'Version' ),
                    // Version that appears at the top of your panel
                    'menu_type'            => 'menu',
                    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
                    'allow_sub_menu'       => true,
                    // Show the sections below the admin menu item or not
                    'menu_title'           => __( 'Katya Options', 'redux-framework-demo' ),
                    'page_title'           => __( 'Katya Options', 'redux-framework-demo' ),
                    // You will need to generate a Google API key to use this feature.
                    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
                    'google_api_key'       => '',
                    // Set it you want google fonts to update weekly. A google_api_key value is required.
                    'google_update_weekly' => false,
                    // Must be defined to add google fonts to the typography module
                    'async_typography'     => true,
                    // Use a asynchronous font on the front end or font string
                    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
                    'admin_bar'            => true,
                    // Show the panel pages on the admin bar
                    'admin_bar_icon'     => 'dashicons-portfolio',
                    // Choose an icon for the admin bar menu
                    'admin_bar_priority' => 50,
                    // Choose an priority for the admin bar menu
                    'global_variable'      => '',
                    // Set a different name for your global variable other than the opt_name
                    'dev_mode'             => true,
                    // Show the time the page took to load, etc
                    'update_notice'        => false,
                    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
                    'customizer'           => true,
                    // Enable basic customizer support
                    //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
                    //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

                    // OPTIONAL -> Give you extra features
                    'page_priority'        => 58,
                    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
                    'page_parent'          => 'themes.php',
                    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
                    'page_permissions'     => 'manage_options',
                    // Permissions needed to access the options panel.
                    'menu_icon'            => '',
                    // Specify a custom URL to an icon
                    'last_tab'             => '',
                    // Force your panel to always open to a specific tab (by id)
                    'page_icon'            => 'icon-themes',
                    // Icon displayed in the admin panel next to your menu_title
                    'page_slug'            => '_options',
                    // Page slug used to denote the panel
                    'save_defaults'        => true,
                    // On load save the defaults to DB before user clicks save or not
                    'default_show'         => false,
                    // If true, shows the default value next to each field that is not the default value.
                    'default_mark'         => '',
                    // What to print by the field's title if the value shown is default. Suggested: *
                    'show_import_export'   => true,
                    // Shows the Import/Export panel when not used as a field.

                    // CAREFUL -> These options are for advanced use only
                    'transient_time'       => 60 * MINUTE_IN_SECONDS,
                    'output'               => true,
                    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
                    'output_tag'           => true,
                    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
                    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

                    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
                    'database'             => '',
                    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
                    'system_info'          => false,
                    // REMOVE

                    // HINTS
                    'hints'                => array(
                        'icon'          => 'icon-question-sign',
                        'icon_position' => 'right',
                        'icon_color'    => 'lightgray',
                        'icon_size'     => 'normal',
                        'tip_style'     => array(
                            'color'   => 'light',
                            'shadow'  => true,
                            'rounded' => false,
                            'style'   => '',
                        ),
                        'tip_position'  => array(
                            'my' => 'top left',
                            'at' => 'bottom right',
                        ),
                        'tip_effect'    => array(
                            'show' => array(
                                'effect'   => 'slide',
                                'duration' => '500',
                                'event'    => 'mouseover',
                            ),
                            'hide' => array(
                                'effect'   => 'slide',
                                'duration' => '500',
                                'event'    => 'click mouseleave',
                            ),
                        ),
                    )
                );

                // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
                $this->args['admin_bar_links'][] = array(
                    'id'    => 'redux-docs',
                    'href'   => 'http://docs.reduxframework.com/',
                    'title' => __( 'Documentation', 'redux-framework-demo' ),
                );

                $this->args['admin_bar_links'][] = array(
                    //'id'    => 'redux-support',
                    'href'   => 'https://github.com/ReduxFramework/redux-framework/issues',
                    'title' => __( 'Support', 'redux-framework-demo' ),
                );

                $this->args['admin_bar_links'][] = array(
                    'id'    => 'redux-extensions',
                    'href'   => 'reduxframework.com/extensions',
                    'title' => __( 'Extensions', 'redux-framework-demo' ),
                );

                // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
                $this->args['share_icons'][] = array(
                    'url'   => 'https://github.com/ReduxFramework/ReduxFramework',
                    'title' => 'Visit us on GitHub',
                    'icon'  => 'el-icon-github'
                    //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
                );
                $this->args['share_icons'][] = array(
                    'url'   => 'https://www.facebook.com/pages/Redux-Framework/243141545850368',
                    'title' => 'Like us on Facebook',
                    'icon'  => 'el-icon-facebook'
                );
                $this->args['share_icons'][] = array(
                    'url'   => 'http://twitter.com/reduxframework',
                    'title' => 'Follow us on Twitter',
                    'icon'  => 'el-icon-twitter'
                );
                $this->args['share_icons'][] = array(
                    'url'   => 'http://www.linkedin.com/company/redux-framework',
                    'title' => 'Find us on LinkedIn',
                    'icon'  => 'el-icon-linkedin'
                );

                // Panel Intro text -> before the form
                if ( ! isset( $this->args['global_variable'] ) || $this->args['global_variable'] !== false ) {
                    if ( ! empty( $this->args['global_variable'] ) ) {
                        $v = $this->args['global_variable'];
                    } else {
                        $v = str_replace( '-', '_', $this->args['opt_name'] );
                    }
                    $this->args['intro_text'] = sprintf( __( '<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'redux-framework-demo' ), $v );
                } else {
                    $this->args['intro_text'] = __( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'redux-framework-demo' );
                }

                // Add content after the form.
                $this->args['footer_text'] = __( '<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'redux-framework-demo' );
            }

            public function validate_callback_function( $field, $value, $existing_value ) {
                $error = true;
                $value = 'just testing';

                /*
              do your validation

              if(something) {
                $value = $value;
              } elseif(something else) {
                $error = true;
                $value = $existing_value;
                
              }
             */

                $return['value'] = $value;
                $field['msg']    = 'your custom error message';
                if ( $error == true ) {
                    $return['error'] = $field;
                }

                return $return;
            }

            public function class_field_callback( $field, $value ) {
                print_r( $field );
                echo '<br/>CLASS CALLBACK';
                print_r( $value );
            }

        }

        global $reduxConfig;
        $reduxConfig = new Redux_Framework_sample_config_balloon();
    } else {
        echo "The class named Redux_Framework_sample_config_balloon has already been called. <strong>Developers, you need to prefix this class with your company name or you'll run into problems!</strong>";
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ):
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    endif;

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ):
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error = true;
            $value = 'just testing';

            /*
          do your validation

          if(something) {
            $value = $value;
          } elseif(something else) {
            $error = true;
            $value = $existing_value;
            
          }
         */

            $return['value'] = $value;
            $field['msg']    = 'your custom error message';
            if ( $error == true ) {
                $return['error'] = $field;
            }

            return $return;
        }
    endif;
