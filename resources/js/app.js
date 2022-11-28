require('./bootstrap');

import $ from 'jquery';
window.$ = window.jQuery = $;

import 'jquery-ui/ui/widgets/datepicker.js';
$('.datepicker').datepicker();
// / e.g <input type="text" class="datepicker" />