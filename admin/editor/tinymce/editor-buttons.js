//////////////////////////////////////////////////////////////////
// Add Youtube button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.youtube', {  
        init : function(ed, url) {  
            ed.addButton('youtube', {  
                title : 'Add a Youtube video',  
                image : url+'/button-youtube.png',  
                onclick : function() {  
                     ed.selection.setContent('[youtube id="Enter video ID (eg. Wq4Y7ztznKc)" width="600" height="350"]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('youtube', tinymce.plugins.youtube);  
})();

//////////////////////////////////////////////////////////////////
// Add Vimeo button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.vimeo', {  
        init : function(ed, url) {  
            ed.addButton('vimeo', {  
                title : 'Add a Vimeo video',  
                image : url+'/button-vimeo.png',  
                onclick : function() {  
                     ed.selection.setContent('[vimeo id="Enter video ID (eg. 10145153)" width="600" height="350"]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('vimeo', tinymce.plugins.vimeo);  
})();

//////////////////////////////////////////////////////////////////
//Add SoundCloud button
//////////////////////////////////////////////////////////////////
(function() {  
 tinymce.create('tinymce.plugins.soundcloud', {  
     init : function(ed, url) {  
         ed.addButton('soundcloud', {  
             title : 'Add a SoundCloud widget',  
             image : url+'/soundcloud.png',  
             onclick : function() {  
                  ed.selection.setContent('[soundcloud url="http://api.soundcloud.com/tracks/15565763" comments="true" auto_play="false" color="ff7700" width="100%" height="81"]');  

             }  
         });  
     },  
     createControl : function(n, cm) {  
         return null;  
     },  
 });  
 tinymce.PluginManager.add('soundcloud', tinymce.plugins.soundcloud);  
})();

//////////////////////////////////////////////////////////////////
// Add Button button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.button', {  
        init : function(ed, url) {  
            ed.addButton('button', {  
                title : 'Add a button',  
                image : url+'/button-button.png',  
                onclick : function() {  
                     ed.selection.setContent('[button color="e.g. peach, orange or leave blank" size="large or small" link="" target=""]Text here[/button]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('button', tinymce.plugins.button);  
})();

//////////////////////////////////////////////////////////////////
// Add Dropcap button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.dropcap', {  
        init : function(ed, url) {  
            ed.addButton('dropcap', {  
                title : 'Add a dropcap',  
                image : url+'/button-dropcap.png',  
                onclick : function() {  
                     ed.selection.setContent('[dropcap]...[/dropcap]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('dropcap', tinymce.plugins.dropcap);  
})();

//////////////////////////////////////////////////////////////////
// Add Highlight button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.highlight', {  
        init : function(ed, url) {  
            ed.addButton('highlight', {  
                title : 'Add a highlight',  
                image : url+'/button-highlight.png',  
                onclick : function() {  
                     ed.selection.setContent('[highlight color="eg. yellow, black"]...[/highlight]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('highlight', tinymce.plugins.highlight);  
})();

//////////////////////////////////////////////////////////////////
// Add Checklist button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.checklist', {  
        init : function(ed, url) {  
            ed.addButton('checklist', {  
                title : 'Add a checklist',  
                image : url+'/button-checklist.png',  
                onclick : function() {  
                     ed.selection.setContent('[checklist]<ul>\r<li>Item #1</li>\r<li>Item #2</li>\r<li>Item #3</li>\r</ul>[/checklist]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('checklist', tinymce.plugins.checklist);  
})();

//////////////////////////////////////////////////////////////////
// Add Badlist button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.badlist', {  
        init : function(ed, url) {  
            ed.addButton('badlist', {  
                title : 'Add a badlist',  
                image : url+'/button-badlist.png',  
                onclick : function() {  
                     ed.selection.setContent('[badlist]<ul>\r<li>Item #1</li>\r<li>Item #2</li>\r<li>Item #3</li>\r</ul>[/badlist]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('badlist', tinymce.plugins.badlist);  
})();
	
//////////////////////////////////////////////////////////////////
// Add Tabs button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.tabs', {  
        init : function(ed, url) {  
            ed.addButton('tabs', {  
                title : 'Add tabs',  
                image : url+'/button-tabs.png',  
                onclick : function() {  
                     ed.selection.setContent('[tabs tab1=\"Tab 1\" tab2=\"Tab 2\" tab3=\"Tab 3\"]<br /><br />[tab id=1]Tab content 1[/tab]<br />[tab id=2]Tab content 2[/tab]<br />[tab id=3]Tab content 3[/tab]<br /><br />[/tabs]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('tabs', tinymce.plugins.tabs);  
})();

//////////////////////////////////////////////////////////////////
// Add Toggle button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.toggle', {  
        init : function(ed, url) {  
            ed.addButton('toggle', {  
                title : 'Add a toggle',  
                image : url+'/button-toggle.png',  
                onclick : function() {  
                     ed.selection.setContent('[accordian][toggle title="Title" open="yes"]...[/toggle][toggle title="Title" open="no"]...[/toggle][toggle title="Title" open="no"]...[/toggle][toggle title="Title" open="no"]...[/toggle][toggle title="Title" open="no"]...[/toggle][/accordian]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('toggle', tinymce.plugins.toggle);  
})();

//////////////////////////////////////////////////////////////////
// Add One_half button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.one_half', {  
        init : function(ed, url) {  
            ed.addButton('one_half', {  
                title : 'Add a one_half column',  
                image : url+'/button-12.png',  
                onclick : function() {  
                     ed.selection.setContent('[one_half last="no"]...[/one_half]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('one_half', tinymce.plugins.one_half);  
})();

//////////////////////////////////////////////////////////////////
// Add One_half button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.one_third', {  
        init : function(ed, url) {  
            ed.addButton('one_third', {  
                title : 'Add a one_third column',  
                image : url+'/button-13.png',  
                onclick : function() {  
                     ed.selection.setContent('[one_third last="no"]...[/one_third]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('one_third', tinymce.plugins.one_third);  
})();

//////////////////////////////////////////////////////////////////
// Add Two_half button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.two_third', {  
        init : function(ed, url) {  
            ed.addButton('two_third', {  
                title : 'Add a two_third column',  
                image : url+'/button-23.png',  
                onclick : function() {  
                     ed.selection.setContent('[two_third last="no"]...[/two_third]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('two_third', tinymce.plugins.two_third);  
})();

//////////////////////////////////////////////////////////////////
// Add one_fourth button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.one_fourth', {  
        init : function(ed, url) {  
            ed.addButton('one_fourth', {  
                title : 'Add a one_fourth column',  
                image : url+'/button-14.png',  
                onclick : function() {  
                     ed.selection.setContent('[one_fourth last="no"]...[/one_fourth]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('one_fourth', tinymce.plugins.one_fourth);  
})();

//////////////////////////////////////////////////////////////////
// Add three_fourth button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.three_fourth', {  
        init : function(ed, url) {  
            ed.addButton('three_fourth', {  
                title : 'Add a three_fourth column',  
                image : url+'/button-34.png',  
                onclick : function() {  
                     ed.selection.setContent('[three_fourth last="no"]...[/three_fourth]');   
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('three_fourth', tinymce.plugins.three_fourth);  
})();

//////////////////////////////////////////////////////////////////
// Add slider button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.slider', {  
        init : function(ed, url) {  
            ed.addButton('slider', {  
                title : 'Add a slider',  
                image : url+'/slider-icon.png',  
                onclick : function() {  
                     ed.selection.setContent('[slider][slide type="video"][vimeo id="10145153" width="600" height="350"][/slide][slide link="" linktarget=""]image link here[/slide][/slider]');
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('slider', tinymce.plugins.slider);  
})();

//////////////////////////////////////////////////////////////////
// Add testimonial button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.testimonial', {  
        init : function(ed, url) {  
            ed.addButton('testimonial', {  
                title : 'Add a testimonial',  
                image : url+'/testimonial-icon.png',  
                onclick : function() {  
                     ed.selection.setContent('[testimonials]<br />[testimonial name="John Doe" gender="male or female" company="My Company" link="" target=""]"Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consec tetur, adipisci velit, sed quia non numquam eius modi tempora incidunt utis labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minimas veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur slores amet untras vel illum qui."[/testimonial]<br />[testimonial name="Doe John" gender="male or female" company="My Company" link="" target=""]"Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consec tetur, adipisci velit, sed quia non numquam eius modi tempora incidunt utis labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minimas veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur slores amet untras vel illum qui."[/testimonial]<br />[/testimonials]');
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('testimonial', tinymce.plugins.testimonial);  
})();

//////////////////////////////////////////////////////////////////
// Add Progress Bar Button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.progress', {  
        init : function(ed, url) {  
            ed.addButton('progress', {  
                title : 'Add a progress bar',  
                image : url+'/button-progress.png',  
                onclick : function() {  
                     ed.selection.setContent('[progress percentage="60"]Web Design[/progress]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('progress', tinymce.plugins.progress);  
})();

//////////////////////////////////////////////////////////////////
// Add Person Button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.person', {  
        init : function(ed, url) {  
            ed.addButton('person', {  
                title : 'Add a person',  
                image : url+'/person-button.png',  
                onclick : function() {  
                     ed.selection.setContent('[person name="John Doe" picture="" title="Developer" facebook="http://facebook.com" twitter="http://twitter.com" linkedin="http://linkedin.com" dribbble="http://dribbble.com" linktarget=""]Redantium, totam rem aperiam, eaque ipsa qu ab illo inventore veritatis et quasi architectos beatae vitae dicta sunt explicabo. Nemo enim.[/person]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('person', tinymce.plugins.person);  
})();

//////////////////////////////////////////////////////////////////
// Add Alert Messages Button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.alert', {  
        init : function(ed, url) {  
            ed.addButton('alert', {  
                title : 'Add an alert message',  
                image : url+'/alert-icon.png',  
                onclick : function() {  
                     ed.selection.setContent('[alert type="e.g. general, error, success, notice"]Your Message Goes Here.[/alert]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('alert', tinymce.plugins.alert);  
})();

//////////////////////////////////////////////////////////////////
// Add Pricing Button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.pricing_table', {  
        init : function(ed, url) {  
            ed.addButton('pricing_table', {  
                title : 'Add pricing table',  
                image : url+'/pricing-icon.png',  
                onclick : function() {  
                     ed.selection.setContent('[pricing_table type="e.g. 1 or 2"][pricing_column title="Standard"][pricing_price currency="$" price="15.55" time="monthly"][/pricing_price][pricing_row]Feature 1[/pricing_row][pricing_footer]Signup[/pricing_footer][/pricing_column][/pricing_table]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('pricing_table', tinymce.plugins.pricing_table);  
})();

//////////////////////////////////////////////////////////////////
// Add Recent Works Button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.recent_works', {  
        init : function(ed, url) {  
            ed.addButton('recent_works', {  
                title : 'Add recent works slider',  
                image : url+'/recent-works-icon.png',  
                onclick : function() {  
                     ed.selection.setContent('[recent_works cat_slug="" number_posts="10"][/recent_works]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('recent_works', tinymce.plugins.recent_works);  
})();

//////////////////////////////////////////////////////////////////
// Add Tagline Box Button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.company_pitch', {  
        init : function(ed, url) {  
            ed.addButton('company_pitch', {  
                title : 'Add company pitch',  
                image : url+'/company-pitch.png',  
                onclick : function() {  
                     ed.selection.setContent('[company_pitch link="http://themeforest.net/user/WiredThemes" linktarget="" button="Purchase Now" title="Inhouse is incredibly responsive, with a refreshingly clean design" description="And it has some awesome features, premium sliders, unlimited colors, advanced theme options and so much more!"][/company_pitch]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('company_pitch', tinymce.plugins.company_pitch);  
})();

//////////////////////////////////////////////////////////////////
// Add Content Boxes Button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.content_boxes', {  
        init : function(ed, url) {  
            ed.addButton('content_boxes', {  
                title : 'Add content boxes',  
                image : url+'/content-boxes.png',  
                onclick : function() {  
                     ed.selection.setContent('[content_boxes]<br />[content_box title="Responsive Design" icon="" image="http://theme-fusion.com/inhouse/wp-content/uploads/2012/07/ico-02.gif" link="http://themeforest.net/user/WiredThemes" linktarget="" linktext="Learn More"]Inhouse is fully responsive and can adapt to any screen size. Try resizing your browser window to see the adaptation.[/content_box]<br />[content_box title="Awesome Sliders" icon="" image="http://theme-fusion.com/inhouse/wp-content/uploads/2012/07/ico-02.gif" link="http://themeforest.net/user/WiredThemes" linktarget="" linktext="Learn More"]Inhouse includes the awesome Layer Parallax Slider as well as the popular FlexSlider2. Both are super easy to use![/content_box]<br />[content_box title="Unlimited Colors"  icon="" image="http://theme-fusion.com/inhouse/wp-content/uploads/2012/07/ico-03.gif" link="http://themeforest.net/user/WiredThemes" linktarget="" linktext="Learn More"]We included a backend color picker for unlimited color options. Anything can be changed, including the gradients![/content_box]<br />[content_box last="yes" title="500+ Google Fonts" icon="" image="http://theme-fusion.com/inhouse/wp-content/uploads/2012/07/ico-04.gif" link="http://themeforest.net/user/WiredThemes" linktarget="" linktext="Learn More"]Inhouse loves fonts, choose from over 500+ Google Fonts. You can change all headings and body copy with ease![/content_box]<br />[/content_boxes]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('content_boxes', tinymce.plugins.content_boxes);  
})();

//////////////////////////////////////////////////////////////////
// Add Recent Posts Button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.recent_posts', {  
        init : function(ed, url) {  
            ed.addButton('recent_posts', {  
                title : 'Add recent posts',  
                image : url+'/recent-posts.png',  
                onclick : function() {  
                     ed.selection.setContent('[recent_posts columns="3 or 4" number_posts="4" cat_slug="" thumbnail="yes" title="yes" meta="yes" excerpt="yes" excerpt_words="15" strip_html="true"][/recent_posts]');
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('recent_posts', tinymce.plugins.recent_posts);  
})();

//////////////////////////////////////////////////////////////////
// Add FontAwesome Button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.fontawesome', {  
        init : function(ed, url) {  
            ed.addButton('fontawesome', {  
                title : 'Add FontAwesome Icon',  
                image : url+'/fontawesome.png',  
                onclick : function() {  
                     ed.selection.setContent('[fontawesome icon="adjust" circle="yes or no" size="large medium or small"]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('fontawesome', tinymce.plugins.fontawesome);
})();

//////////////////////////////////////////////////////////////////
// Add Social Links Button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.social_links', {  
        init : function(ed, url) {  
            ed.addButton('social_links', {  
                title : 'Add Social Links',  
                image : url+'/social.png',  
                onclick : function() {  
                     ed.selection.setContent('[social_links linktarget="" rss="" facebook="" twitter="" dribbble="" google="" linkedin="" blogger="" tumblr="" reddit="" yahoo="" deviantart="" vimeo="" youtube="" pinterest="" digg="" flickr="" forrst="" myspace="" skype=""]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('social_links', tinymce.plugins.social_links);
})();

//////////////////////////////////////////////////////////////////
// Add Clients Slider Button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.clients', {  
        init : function(ed, url) {  
            ed.addButton('clients', {  
                title : 'Add Clients Slider',  
                image : url+'/clients.png',  
                onclick : function() {  
                     ed.selection.setContent('[clients][client link="" linktarget="" image=""][client link="" linktarget="" image=""][client link="" linktarget="" image=""][client link="" linktarget="" image=""][client link="" linktarget="" image=""][/clients]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('clients', tinymce.plugins.clients);
})();

//////////////////////////////////////////////////////////////////
// Add Title Button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.title', {  
        init : function(ed, url) {  
            ed.addButton('title', {  
                title : 'Add a Title',  
                image : url+'/title.png',  
                onclick : function() {  
                     ed.selection.setContent('[title size="1 to 6"]Title[/title]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('title', tinymce.plugins.title);
})();


//////////////////////////////////////////////////////////////////
// Add Separator Button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.separatoor', {  
        init : function(ed, url) {  
            ed.addButton('separatoor', {  
                title : 'Add a Separator',  
                image : url+'/separator.png',  
                onclick : function() {  
                     ed.selection.setContent('[separator top="40"]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('separatoor', tinymce.plugins.separatoor);
})();

//////////////////////////////////////////////////////////////////
// Add PrettyPhoto Button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.tfprettyphoto', {  
        init : function(ed, url) {  
            ed.addButton('tfprettyphoto', {  
                title : 'Add a Lightbox Image',  
                image : url+'/lightbox.png',  
                onclick : function() {  
                     ed.selection.setContent('<a href="full image link" rel="prettyPhoto" title="lightbox description"><img src="thumbnail image link" alt="lightbox title" /></a>');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('tfprettyphoto', tinymce.plugins.tfprettyphoto);
})();