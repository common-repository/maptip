=== MapTip ===
Contributors: aviket
Tags: tooltip, content tooltip, wordpress tooltip plugin, jquery tooltip wordpress plugin, image tooltip, image with content tooltip, map tooltip, gis, gis map
Requires at least: 3.0
Tested up to: 4.0.1
Stable tag: tooltip, jquery tooltip, wordpress tooltip, map tooltip
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

== Description ==
MapTip is a jquery tooltip plugin. It is used to display map of a city or place, when mouse is hovered over the city name. It very easy to use.
The basic tooltip facility is borrowed from tooltipster wordpress plugin.
Link to the Tooltipster Jquery Library: http://iamceege.github.io/tooltipster/
URL for Tooltipster plugin: https://wordpress.org/plugins/tooltipster/

it has 10+ features in the base tooltipster plugin.
example animation, position, title, text, image, speed, delay,icon ,theme, trigger etc.

After installing the plugin, you have to enclose the city name within opening and closing shortcodes like below:
[MapTip]Mumbai[/MapTip]
[MapTip]Jakarta[/MapTip] is capital of indonesia.
We were travelling from [MapTip]New Delhi[/MapTip] to [MapTip]Kolkata[/MapTip]

The plugin refers to Overpass api for finding latitude and longitude from the place name.(http://overpass-api.de/)
You can find more about Overpass API (formerly known as OSM Server Side Scripting) at : http://wiki.openstreetmap.org/wiki/Overpass_API
If the place name is misspelled or it doesn't exist in openstreetmap database, the tooltip shows
the message "Map Not Found".
You can use animation values 'fade', 'grow', 'swing', 'slide', 'fall'
You can override default theme (i.e colors, borders and general appearance).
There are four themes available "tooltipster-light" , "tooltipster-noir" , "tooltipster-punk" and "tooltipster-shadow"
There are other options available like delay, animationduration etc.
For using them, you have to pass them as arguments to the shortcode like:
[MapTip animation="swing"]Mumbai[/MapTip] is capital of Maharashtra

[MapTip theme="tooltipster-noir"]Pune[/MapTip] is the second most big city of Maharashtra

[MapTip animation="grow"]new delhi[/MapTip] is capital of India

[MapTip]Chiplun[/MapTip] is a place in konkan region.

The map shown in the tooltip has some default zoom factor. You can override the zoom factor by specifying 
it in the shortcode.

[MapTip zoom="10"]Chiplun[/MapTip] is a place in konkan region.


My friend stays in[MapTip]London[/MapTip].

For getting the map images, Mapquest staticmap api is used.
For more information about staticmap refer: http://www.mapquestapi.com/staticmap/
Both openstreetmap and MapQuest have "Fair Usage Policy" in place , so if
there are too many requests from a single IP, that IP is temporarily blocked.
[youtube https://www.youtube.com/watch?v=Nk2k4dyMmmE]

Known issues:
If there are multiple places with the same name, all the records are returned by the API and
the first one is selected for displaying the map tip. So, you may not see the map of the place you intend to see.






== Installation ==
<ul>
<li>From WP admin > Plugins > Add New</li>
<li>Search \"Tooltipster\" under search and hit Enter</li>
<li>Click \"Install Now\"</li>
<li>Click the Activate Plugin link</li>
</ul>


== Frequently Asked Questions ==
MapTip can be added any where .

== Screenshots ==
1. Tooltip with Image
2. Tooltip with Headline 
3. Tooltip content

== Changelog ==
1.0
First Release

== Upgrade Notice ==
Hello , Tooltipster has a new version . if you update it you can find more features