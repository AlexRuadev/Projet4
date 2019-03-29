/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you require will output into a single css file (app.css in this case)
require('../css/app.css');
require('../css/header.css');

// Need jQuery? Install it with "yarn add jquery", then uncomment to require it.
const $ = require('jquery');
require('popper.js');
require('bootstrap');

$(document).ready(function() {
    $('[data-toggle="popover"]').popover();
});

<<<<<<< HEAD

// console.log('Hello Webpack Encore! Edit me in assets/js/app.js');

=======
//console.log('Hello Webpack Encore! Edit me in assets/js/app.js');
>>>>>>> f9f4a8f929e5799a08b8ad6677c24b1641a6d838
