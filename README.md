NOVA Position Advertisement WP Plugin
===================

For those clubs who play Anodyne Production's NOVA Star Trek Simulator engine.  This plugin is designed to pull from the NOVA database engine and display the open positions in a wordpress site using Shortcode.

This can be used for a single NOVA engine, or multiple NOVA engines on the same NOVA database backend.

----------


Installation
-------------

1. Clone this repository to your wordpress installation folder, inside wp-content/wp-plugins/NOVA_WP directory.  create the directory if needed.
2. Open the file NOVA_Openings.php file in your favorite editor.
3.  On line 40 where it reads:
>$novadb = new wpdb( 'username', 'user password', 'database', 'server' );
replace with your NOVA database backend credentials.
>**Note:** if your database is not local to your wordress installation, please ensure all remote access privileges are set.
4.Open Wordpress administration screen and select plugins.  Activate the plugin **NOVA Command Open Position List**
5. On the desired page, insert the shortcode **[CMD_OPENINGS PREFIX="Nova Table Prefix Code"] **.  Change the Prefix code to the table prefix code specified during the installation of the NOVA application.
6. surround the shortcode with <span> tags if styling is desired.

Changing the output styling
---------

On lines 52-55, the templating of the output is generated.  The current format is position, ' - ' (space-dash-space).  If there is a position with more than one openings, the suffices (# open) will be attached to the end of the postion prior to the space-dash-space.
