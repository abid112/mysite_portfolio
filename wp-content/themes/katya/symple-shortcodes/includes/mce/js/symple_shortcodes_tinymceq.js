(function() {

    tinymce.PluginManager.add('my_mce_button', function( editor, url ) {

        editor.addButton( 'my_mce_button', {

            text: 'Shortcode',

            icon: false,

            type: 'menubutton',

            menu: [

                        {

                            text: 'Kyte Page Header',

                            onclick: function() {

                                  

                                        editor.insertContent( '[ky_page_head]<br>[/ky_page_head]' );
                                        
                                  
                            }

                        },

                        {

                            text: 'Resume',

                           menu: [

                           

                        {

                            text: 'Resume Head',

                            onclick: function() {

                                editor.windowManager.open( {

                                    title: 'Resume Head Shortcode',

                                    body: [

                                        {

                                            type: 'textbox',

                                            name: 'textboxName',

                                            label: 'Resume Head Title',

                                            value: 'My Resume'

                                        },
                                        
                                    ],

                                    onsubmit: function( e ) {

                                        editor.insertContent( '[ky_resume_head title="' + e.data.textboxName + '"][/ky_resume_head]' );
                                        
                                    }

                                });

                            }

                        },

                        {

                            text: 'Resume Experience',

                            onclick: function() {


                                        editor.insertContent( '[ky_experience]' );
                                 
                            }

                        },

                        {

                            text: 'Skill & Testimonial',

                            onclick: function() {

                                editor.windowManager.open( {

                                    title: 'Resume Skill & Testimonial Shortcode',

                                    body: [

                                        {

                                            type: 'textbox',

                                            name: 'textboxName',

                                            label: 'Testimonial Head Title',

                                            value: 'What They Say'

                                        },

                                       

                                    ],

                                    onsubmit: function( e ) {

                                        editor.insertContent( '[ky_skill_testimonial  title="' + e.data.textboxName + '"]' );
                                        
                                    }

                                });

                            }

                        },

                                                
                    ]
                        },

                        {

                            text: 'Portfolio',

                            onclick: function() {

                                editor.windowManager.open( {

                                    title: 'Portfolio Shortcode',

                                    body: [

                                        {

                                            type: 'textbox',

                                            name: 'textboxName',

                                            label: 'Head Title',

                                            value: 'My Portfolio'

                                        },
                                        
                                                                                                                                                           

                                    ],

                                    onsubmit: function( e ) {

                                        editor.insertContent( '[ky_Portfolio title="' + e.data.textboxName + '"]' );
                                        
                                    }

                                });

                            }

                        },

                        {

                            text: 'Blog',

                            onclick: function() {

                                editor.windowManager.open( {

                                    title: 'Blog Shortcode',

                                    body: [

                                        {

                                            type: 'textbox',

                                            name: 'textboxName',

                                            label: 'Head Title',

                                            value: 'My Latest Blog'

                                        },

                                        {

                                            type: 'textbox',

                                            name: 'textboxLinkc',

                                            label: 'Link Content',

                                            value: 'Read More'

                                        },
                                        
                                                                                                                                                           

                                    ],

                                    onsubmit: function( e ) {

                                        editor.insertContent( '[ky_blog title="' + e.data.textboxName + '" link="' + e.data.textboxLinkc + '"]' );
                                        
                                    }

                                });

                            }

                        },

                        {

                            text: 'Contact',

                            onclick: function() {

                                editor.windowManager.open( {

                                    title: 'Contact Shortcode',

                                    body: [

                                        {

                                            type: 'textbox',

                                            name: 'textboxName',

                                            label: 'Head Title',

                                            value: 'Get in Touch'

                                        },

                                        {

                                            type: 'textbox',

                                            name: 'textboxmapc',

                                            label: 'Map Title',

                                            value: 'Find Me Here'

                                        },

                                        {

                                            type: 'textbox',

                                            name: 'textboxforms',

                                            label: 'Contact from-7 Shortcode',

                                            value: '[contact-form-7 id="95" title="Contact form 1"]'

                                        },
                                        
                                                                                                                                                           

                                    ],

                                    onsubmit: function( e ) {

                                        editor.insertContent( '[ky_contact title="' + e.data.textboxName + '" link="' + e.data.textboxmapc + '"]' + e.data.textboxforms + '[/ky_contact]' );
                                        
                                    }

                                });

                            }

                        },
                       

                    
                    ]


               

        });

    });

})();
