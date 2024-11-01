=== Plugin Name ===

Contributors:      dracea
Plugin Name:       Suffusion Selectik Menu
Plugin URI:        http://drafie-design.nl
Tags:              select box, navigation, responsive design, mobile devices
Author URI:        http://drafie-design.nl
Author:            Ciprian Dracea (Drake)
Donate link:       
Requires at least: 3.4
Tested up to:      4.0
Stable tag:        0.2
Version:           0.2
License: 	   GPLv2 or later. (http://www.gnu.org/licenses/gpl-2.0.html)

== Description ==
**Stylize Suffusion Select Lists on mobiles**
This Plugin help you to improve the look of Select Lists loaded by Suffusion on mobile devices.

The Plugin just load selectik.js files adapting them to replace the native select lists loaded on mobile devices.

**Thanks to**
This Plugin uses [selectik.js] jQuery plugin by Ivan Kubrakov (https://github.com/Brankub/selectik) 

== Installation ==

1. **Download the Plugin**, unzip and load the folder "suffusion-selectik-menu" in to the "/wp-content/plugins/" directory, or install the zip from WordPress dashboard.
2. **Activate the Plugin** from plugin menu in the WordPress dashboard

== Screenshots ==
1. Suffusion Selectik Menu in action

== Changelog ==
**0.2** June 29, 2014
* Bugfix: - add "home icon" on list, when the icon is used at Suffusion Options -> Other Graphical Elements -> Navigation Bar Above (or Below) Header. (this address a bug of Suffusion -> the native select lists lose the icon).
* Bugfix: - duplicated select list for Navigation Bar Below Header no longer appear in Navigation Bar Above Header when are used both navigation bars. (this is also a problem of native select lists in Suffusion).
* Improvement: The plugin follows the breakpoints settled at Suffusion Options -> Responsive Layouts, no need for an extra media query for hiding Selectik on screens with high resolutions.
* Improvement: Default styles are added in the stylesheet of plugin, so the plugin will work now out-of-the-box, no more needed extra styles at Custom Styles.
* Changed licence to GPLv2 or later, for conforming with WordPress recommendation for getting the plugin hosted on WordPress Repository

**0.1** May 21, 2014 
* Initial release

== Upgrade Notice ==

= 0.2 = This version address all bugs disclosed by Suffusion Collapse Menu.

== Frequently Asked Questions ==

= This plugin will work with my theme? =
The plugin is written specifically for Suffusion, it address it's elements and even use some of Suffusion Options, so, it will not work with any other theme.