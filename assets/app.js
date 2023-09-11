import 'bootstrap/dist/css/bootstrap.css'
import './styles/app.css';


import { createApp } from 'vue';
import App from './App.vue';


const app = createApp({
    components: {
        App
    }
});
app.mount('#app');
