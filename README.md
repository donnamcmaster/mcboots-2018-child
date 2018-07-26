## Synopsis

McBoots 2018 Child is a starter child theme for the [McBoots 2018](https://github.com/donnamcmaster/mcboots-2018) WordPress template. It is deliberately minimal. 

Note that both McBoots 2018 and McBoots 2018 Child assume that you are familiar with both WordPress and PHP programming. They are not intended for novices. 

## Motivation

Although we could simply edit McBoots directly, creating child themes enables us to more easily update the core code without impacting all sites based on McBoots. 

## Organization

McBoots 2018 Child consists of the following:

* License and read-me files that can be modified or ignored. 
* An `assets` folder with sub-folders for CSS, fonts, images used in styles (e.g., logo, icons), and SCSS files. 
* An empty assets/js folder for your custom scripts. Bootstrap Javascript distro is downloaded from the Bootstrap CDN. 
* Empty folders `lib`, `lib/setup`, and `template-parts`. When you need to override a file in the McBoots parent theme, copy that file into the matching folder in McBoots 2018 Child and edit it as needed. 
* Note that there is an index file in each of the empty folders as otherwise Git won't sync them. 
* WordPress standard file `style.css`. NOTE: This file is only to satisfy WordPress theme requirements. The actual site CSS is generated from SCSS files and is located in `assets/css`.
* Theme image file `screenshot.png`. Replace if desired. Recommended size is 1200 x 900 px. PNG or JPEG files work well. 

## Installation

* First download McBoots 2018 and install it in a `mcboots-2018` (lower case) folder in your `wp-content/themes` folder. 
* Then download McBoots 2018 Child and install it in a folder in your `wp-content/themes` folder. We suggest that you change the folder name and edit `style.css` to change the theme name and details at this time. 
* Select your copy of McBoots 2018 Child in WordPress admin (Appearance/Themes). 

## Setup

I'm not including build files with the project at this time. The only file that needs compilation is `assets/less/custom.scss`. It is compiled into `assets/css/custom.css`. `Custom.scss` includes the Bootstrap files and an overrides file that allows you to set defaults before they are defined in the _variables.scss file. 

See also the [McBoots 2018 documentation](https://github.com/donnamcmaster/mcboots-2018). 

## Contributors

I appreciate your letting me know (via message or pull request) if you find any problems or see areas for improvement. You can contact me [via email](https://www.donnamcmaster.com/contact/ "at my website") or on Twitter as [@mcdonna](https://twitter.com/mcdonna). 

## License

Licensed under [GPLv3 or later](https://www.gnu.org/licenses/gpl.html).
