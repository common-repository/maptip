<?php

/**
 * Plugin Name: MapTip
 * Plugin URI: https://wordpress.org/plugins/MapTip/
 * Description: MapTip is a free wordpress tooltip plugin shows maps of cities on hovering mouse over the city name.
 * Version: 1.0
 * Author: aviket
 * License: GPL2
 */
function MapTip($atts, $content) {

    $content = ucwords($content);
    static $tooltipID = 0;
    $attrs = shortcode_atts(array(
        'text' => 'Your Tooltip Text Here',
        'title' => 'Tooltip Title',
        'position' => 'top',
        'trigger' => 'hover',
        'animation' => 'slide',
        'speed' => 350,
        'image' => '',
        'theme' => 'tooltipster-punk',
		'zoom' => '12'
            ), $atts);
    $tooltipID++;
    $output = '<div class="tooltipster" id="tooltipster' . $tooltipID . '" title="">';
    $output .= $content;
    $output .='</div>';
    $image = $attrs['image'];
    $title = $attrs['title'];
	$zoom = $attrs['zoom'];
    $tooltipContent = '<span class="tooltipster_content"><strong><b>' . $title . '</b>' . $attrs['text'] . '</strong></span>';
    ?>
    <script type="text/javascript">


        jQuery.ajax({
            url:
                    'http://www.overpass-api.de/api/interpreter?data=' +
                    '[out:json][timeout:60];' +
                    'node["name"="<?php echo $content; ?>"];' +
                    'out;',
            dataType: 'json',
            type: 'GET',
            async: true,
            crossDomain: true
        }).done(function (data) {

            if (!(data === undefined || data === null || data.elements.length == 0)) {
                // do something 

                var lat = data.elements[0].lat;
                var lon = data.elements[0].lon;
                latlon = lat + ',' + lon;
                jQuery("<?php echo '#tooltipster' . $tooltipID; ?>").tooltipster({
                    //content: jQuery('<?php echo $tooltipContent; ?>'),
                    content: '<img src="http://open.mapquestapi.com/staticmap/v4/getmap?key=LXbRhuwafRvG1CGF3kwAU8UhDDHgRdVm&size=400,400&zoom=<?php echo $zoom; ?>&center=' + latlon + '&type=map">',
                    animation: '<?php echo $attrs["animation"]; ?>',
                    position: '<?php echo $attrs["position"]; ?>',
                    theme: '<?php echo $attrs["theme"]; ?>',
                    touchDevices: false,
                    trigger: '<?php echo $attrs["trigger"]; ?>',
                    speed: '<?php echo $attrs["speed"]; ?>',
                    image: '',
                    contentAsHTML: true,
					zoom: 12
                });
                console.log("second success");
            }
            else
            {
                jQuery("<?php echo '#tooltipster' . $tooltipID; ?>").tooltipster({
                    //content: jQuery('<?php echo $tooltipContent; ?>'),
                    content: '<div>No Map Found</div>',
                    title: 'No Data Found',
                    animation: '<?php echo $attrs["animation"]; ?>',
                    position: '<?php echo $attrs["position"]; ?>',
                    theme: '<?php echo $attrs["theme"]; ?>',
                    touchDevices: false,
                    trigger: '<?php echo $attrs["trigger"]; ?>',
                    speed: '<?php echo $attrs["speed"]; ?>',
                    image: '',
                    contentAsHTML: true,
					zoom: 12
                });
                console.log("second success");

            }

        }).fail(function (error) {
            console.log(error);
            console.log("error");
        }).always(function () {
            console.log("complete");
        });






    </script>
    <?php
    return $output;
}

add_shortcode('MapTip', 'MapTip');

function MapTipScript() {
    wp_enqueue_script('jquery');
    wp_enqueue_style('tooltipster', plugin_dir_url(__FILE__) . 'css/tooltipster.css');
    wp_enqueue_script('tooltipster_js', plugin_dir_url(__FILE__) . 'js/jquery.tooltipster.min.js', array('jquery'), '', true);
    wp_enqueue_script('tooltipster_active', plugin_dir_url(__FILE__) . 'js/tooltipster_active.js', array('tooltipster_js'), '', true);
}

add_action('wp_enqueue_scripts', 'MapTipScript');
?>