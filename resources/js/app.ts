import { createApp } from 'vue';
import ExampleComponent from './components/AppFrame.vue';

const app = createApp({});
app.component('example-component', ExampleComponent);
app.mount('#app');
