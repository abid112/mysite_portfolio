/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

jQuery(document).ready(function(){
    jQuery('.page_content .widget .menu li .sub-menu').hide();
    jQuery('.page_content .widget .menu li.menu-item-has-children').click(function(){
        jQuery(this).find('ul').toggle('slow');
        if (jQuery(this).find('ul').is(':visible')) {
            jQuery(this).toggleClass('padding-remover');
        }
    });
});


