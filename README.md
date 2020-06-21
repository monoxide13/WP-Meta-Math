# WP-Meta-Math

## Purpose:
A wordpress plugin that adds or averages post meta based on taxonomy and slug data.

## Reason for design:
I wrote this plugin to be able to log the total amount of work I've done on a project. This way I can create posts (visible or not) to log my time, as well as other values I may want to log.

## Usage:
1. Download and extract this into your wordpress plugin folder, typically at wp-content/plugins.
2. Activate the plugin in wordpress.

## Options:
	- Set these and it will apply to all unspecified meta-math shortcodes.
		- posttype
		- taxonomy


## Shortcodes:
- [meta-math]
	- args:
		- posttype [(default selectd in options menu)]
		- taxonomy [(default selected in options menu)]
		- slug
		- meta [required]
		- math [(sum),avg]
	- Notes:
		- If posttype, taxonomy and meta are not defined, shortcode will return error message.
		- If no slug is defined, shortcode will return the meta from all posts of that post and/or taxonomy type.
		- If a slug is defined 
