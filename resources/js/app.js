import './bootstrap';
import 'flowbite';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';

Alpine.plugin(focus);
window.Alpine = Alpine;
Alpine.start();


// // Reference from published scripts
// require('./vendor/livewire-ui/modal');


// // Reference from vendor
// require('../../vendor/livewire-ui/modal/resources/js/modal');
