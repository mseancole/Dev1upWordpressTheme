Word Press Theme
===

This is the Wordpress theme I created and use on my [blog](http://www.dev1up.com).

Install To Use
===

 1. Login to your wp-admin account
 1. Navigate to Appearance > Themes
 1. Click the **Add New** button
 1. Click the **Upload Theme** button
 1. Upload the compressed zip file located at `dist/wp-content/themes/dev1up.zip`
 1. If installation was successful the theme should now be available

Install To Develop
===

The layout of this repository is structured to promote development alongside a local Wordpress installation. When configured correctly, Wordpress should be preinstalled into the `dist` directory and the contents of the dist directory from this repository should be copied on top of it.

The following prerequisites are necessary to setup a live development environment. If you have your own setup that you wish to follow you may skip to the **Developing** section.

**Prerequisites:**

 * Vagrant (set shared folder to `dist`)
 * npm
   * npm:jshint
   * npm:uglify-js
   * npm:csslint
   * npm:clean-css
   * npm:nodemon
   * npm:parallelshell
   * npm:browser-sync

Once all the prerequisites are installed, you should be able to up your vagrant box and access your installation of Wordpress. This repository includes a `package.json` file in the root directory. This file can be used in conjunction with `npm` to run build commands.

 1. Open a terminal
 1. Navigate the terminal to the directory containing the `dist` and `src` directories
 1. Type the following command: `npm run build-watch`
 1. Open a second terminal
 1. Navigate the second terminal to the directory containing the `dist` and `src` directories
 1. Type the following command: `npm run live`

A browser window/tab should have opened and should contain your Wordpress installation. If your browser has not opened, you may use the first of the IP's/hostnames provided in the second terminal to manually do so now. Leave these terminal up while developing.

You are now ready to begin developing this theme.

Developing
===

You should contain any edits to the `src` directory. The `dist` directory is compiled and minified, and should automatically be regenerated as you work.

JS files added, edited, or removed from `src/assets/scripts` should automatically be compiled into a single file and minified at `dist/wp-content/themes/dev1up/assets/scripts/main.min.js`.

CSS files added, edited, or removed from `src/assets/styles` should automatically be compiled into a single file and minified at `dist/wp-content/themes/dev1up/style.css`.

PHP files added, edited, or removed from `src` should automatically be copied to `dist/wp-content/themes/dev1up`.

When you have finished making any changes and wish to recompile the compressed zip file:

 1. Open a terminal
 1. Navigate ther terminal to the directory containing the `dist` and `src` directories
 1. Type the following command: `npm run compile`

The theme should now be compressed and located at `dist/wp-content/themes/dev1up.zip`.
