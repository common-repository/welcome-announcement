=== Plugin Name ===
Contributors: jmbamba
Donate link: http://mbamba.fr/?page_id=93
Tags: Welcome announcement, Flash, animation, static, HTML, flash parameters, flash vars, alternate content, style, opacity, transparency, flow, effects, fx, appearance, disappearance, cookie, cross-browser, cross-platform, IE, Internet explorer, Firefox.
Requires at least: 2.6 (might work on earlier versions)
Tested up to: 3.0
Stable tag: 1.0.5

Displays a welcome announcement to your visitors. Shows it over a transparent veil with appearance effects. Format: Flash /static HTML.

== Description ==
## What it does<a name="Description"></a>

This plugin displays a welcome announcement when a visitor enters your blog. The announcement is shown over a transparent veil with an appearance effect, displayed for the defined duration and then taken offscreen with a disappearance effect. The plugin supports announcement in flash format (swf) and standard HTML announcement.

The plugin is packaged with a default animation (wa_demo.swf) animating a customizable text. Upon installation, the default announcement message is “Welcome to [your-blog-name]”. You can of course edit it to your needs.

An HTML announcement can be defined and supports all standard HTML tags, including text and images. There is wysiwyg editor in the administration panel to help you design it. If you fancy rich content, you can also add it.

For convenience, your visitors will see your announcement only once, at the frequency you define. A cookie is set with your specified expiration date and returning visitors won’t see the welcome message again before the cookie expires.

The announcement is shown on any page, as long as the visitor has not yet seen it. It is very useful if people are redirected to your articles / pages from other blogs or search engines. It has been testes on Internet Explorer 6+ and Firefox 3+.

<h6 style="TEXT-ALIGN: right">
  <a title="reach the top of the page" href="#top" target="_self"><em>Top</em></a>
</h6>

To view a demo of the plugin, open <a title="reach the top of the page" href="http://mbamba.fr/?page_id=93" target="_self">The demo and disucssion page</a>.

### *Features: *

*   Welcome announcement in **Flash** animation or static (**HTML format**)
*   You can dynamically pass **parameters** to your flash file
*   If you choose the flash format, you can provide an **alternate content** in case the visitor doesn’t have flash installed in his browser.
*   You can temporarily **enable or disable** the welcome announcement
*   You can **style the announcement**: dimensions and background color. Further customization is possible via the provided CSS file.
*   You can **style the veil**: background color and transparency. Further customization is possible via the provided CSS file.
*   You can completely set up the **animation flow**: appearance phase duration and effects, display phase duration, and disappearance phase duration and effects. About **20 effects** are proposed for **appearance and disappearance**, ranging from simple show and slide to stunning infinite zoom or explosion.
*   You can set **cookie** parameters: name and expiration.
*   A fully fledged **configuration page** where you can completely set up your welcome announcement. Detailed description of each parameter and visual aids like **wysiwyg text editors** or **color selectors**.

### *Tags*

Welcome announcement, Flash, animation, static, HTML, flash parameters, flash vars, alternate content, style, opacity, transparency, flow, effects, fx, appearance, disappearance, cookie, cross-browser, cross-platform, IE, Internet explorer, Firefox.

== Installation ==

## Installation and Configuration<a name="install"></a>

Installation is very easy.

1.  Download the package here:
2.  Unzip it
3.  Upload the folder to your Wordpress site in the plugins folder: /wp-content/plugins
4.  Log in to your Wordpress admin page, go to the plugins menu and activate welcome.
5.  That’s it , you have a functional welcome announcement.
6.  You can open you Wordpress blog to see how the default animation looks.

If you are updating from an earlier version, follow steps 1, and 2 above. Then 
   - replace the previous files with the new ones
   - Log in to your admin panel, 
   - Deactivate the plugin
   - Activate the plugin
   - That's it for the update!

Configuration: To configure the welcome announcement, log in your Wordpress administration panel and under the theme menu group, locate the link ‘Welcome announcement’ and click it. This opens the welcome announcement options page. Just go through the section and make your changes.

Nota: it is recommended to test the appearance of your announcement by opening your blog page. After you make modification to the plugin options, modify the cookie name to view yourself the changes.

<h6 style="TEXT-ALIGN: right">
  <a title="reach the top of the page" href="#top" target="_self"><em>Top</em></a>
</h6>

== Frequently Asked Questions ==

I have tested it on many Wordpress 2.8.5 installations, under various themes, under Internet Explorer and Firefox.

Normally, there shouldn’t be any problem. If there is, make sure your theme calls the functions wp\_head and wp\_footer. A good theme should call them. Isn't it?!

== Screenshots ==
1. A screenshot of the announcement playing over a blog page
2. The options page
3. The link to the options page in the Theme menu section
4. The content of the package: all the plugin files
5. Activation of the plugin

== Changelog ==
v1.0.5 Corrected a bug with the add_theme_page call

v1.0.4 Added the following:
1. Corrected an addressing bug, thanks to Luis from judowaza.net
2. Opted for the wa prefix instead of welcome_

v1.0.3 Added the following:
1. All scripts loaded using wp_enqueue_scripts and via the hooks wp_print_scripts // admin_print_scripts
2. All stylesheets loaded using wp_enqueue_style and via the hooks wp_print_styles // admin_print_styles
3. Correct noConflict mode to ensure smooth running in presence of other js libraries

v1.0.2: Added the following:
1. Ready for internationalization. Loaded with a pot file and a french translation 
2. Array of options 
3. Restore Default Options Button
4. Dynamic loading of embarqued librairies like jQuery
5. Improved default values 
