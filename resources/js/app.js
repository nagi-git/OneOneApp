/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp } from 'vue';

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

const app = createApp({});

import router from './router'
import ExampleComponent from './components/com/ExampleComponent.vue';
import ModalComponent from './components/com/Modal.vue';
import MeetingModal from './components/MeetingModal.vue';
import MeetingList from './components/MeetingList.vue';
import MeetingDetail from './components/MeetingDetail.vue';
import Multiselect from './components/com/Multiselect.vue';

app.use(router);
app.component('example-component', ExampleComponent);
app.component('modal-component', ModalComponent);
app.component('meeting-modal', MeetingModal);
app.component('multi-select', Multiselect);
app.component('meeting-list', MeetingList);
app.component('meeting-detail', MeetingDetail);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Object.entries(import.meta.globEager('./**/*.vue')).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });

/**
 * Finally, we will attach the application instance to a HTML element with
 * an "id" attribute of "app". This element is included with the "auth"
 * scaffolding. Otherwise, you will need to add an element yourself.
 */
app.mount('#app');
