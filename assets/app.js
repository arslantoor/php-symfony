/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */
import $ from 'jquery'
// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

// start the Stimulus application
import './bootstrap';

$(document).ready(function(){
$(".select2-selection select2-selection--single").prepend('<span class="select2-selection__rendered" id="select2-s60cc80cc3cfa4_checklist-container" role="textbox" aria-readonly="true" title="introduction">select</span>')
})