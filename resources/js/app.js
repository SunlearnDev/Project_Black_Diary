import './bootstrap';
import './comment';
import './chat';

window.axios = axios;

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import $ from 'jquery';
window.jQuery = $;
window.$ = $;

// window._ = require('lodash');
// window.$ = window.jQuery = require('jquery');
// require('bootstrap-sass');
// var notifications = [];
// const NOTIFICATION_TYPES = {
//    follow: 'App\\Notifications\\FollowNotification',
// };
