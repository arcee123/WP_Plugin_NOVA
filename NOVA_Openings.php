<?php
/*
Plugin Name: Trekfederation Command Open Position List
Plugin URI: https://www.trekfederation.com/engineering
Description: Pulls data from NOVA installations to promote open positions
Version: 0.1 BETA
Author: Evan Cutler
Author URI: https://trekfederation.com
*/

/*
Starfleet Trekfed Chapter List (Wordpress Plugin)
Copyright (C) 2015 International Federation of Trekkers
Contact me at http://www.reallyeffective.co.uk

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program. If not, see <http://www.gnu.org/licenses/>.
*/

//tell wordpress to register the fleet_roster shortcode
add_shortcode("CMD_OPENINGS", "fleet_roster_handler");

function fleet_roster_handler($atts) {
   extract(shortcode_atts(array(
      'prefix' => ''
   ), $atts));

   $response = '';
   if ($prefix) {
	$novadb = new wpdb( '<username>', '<user password>', '<database>', '<server>' );
	if ($novadb->show_errors()) {
		return $novadb->show_errors();
	}
	$response = '';
	$query = "SELECT pos_name, pos_open from ". $prefix . "_positions_sto where pos_open > 0 order by pos_dept, pos_order;";
	$rows = $novadb->get_results($query);
	if (!($novadb->num_rows)) {
		return "No Positions available at this time.";
	}
	$i = 0;
	foreach ($rows as $row) {
		$response .= $row->pos_name;
		if ($row->pos_open > 1) { $response .= ' (' . $row->pos_open . ' open)'; }
		$i++;
		if ($i < $novadb->num_rows) { $response .= ' - '; }
	}
	return $response;
   }
   
return 'Please enter a Command Prefix Code.';
}