import './bootstrap';
import './comment';
import './chat';
import { initFlowbite } from 'flowbite';

window.axios = axios;

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

var notifications = [];
const NOTIFICATION_TYPES = {
   follow: 'App\\Notifications\\FollowNotification',
};