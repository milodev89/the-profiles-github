import './bootstrap';
import '../sass/app.scss'
import Toaster from "@meforma/vue-toaster";
import {createApp} from 'vue'
import App from './components/App.vue'

createApp(App).use(Toaster).mount("#app")
