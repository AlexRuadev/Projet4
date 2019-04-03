/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you require will output into a single css file (app.css in this case)
require('../css/app.css');
require('../css/header.css');
require('../../node_modules/leaflet/dist/leaflet.css')

// Need jQuery? Install it with "yarn add jquery", then uncomment to require it.
const $ = require('jquery');
require('popper.js');
require('bootstrap');
import 'leaflet/dist/leaflet.css'; import 'leaflet/dist/leaflet'; import 'leaflet-draw'; import 'leaflet-draw/dist/leaflet.draw.css'; import 'leaflet.markercluster'; import 'leaflet.markercluster/dist/MarkerCluster.css';

$(document).ready(function() {
    $('[data-toggle="popover"]').popover();
});

// console.log('Hello Webpack Encore! Edit me in assets/js/app.js');
