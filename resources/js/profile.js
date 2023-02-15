import './bootstrap';
import '../sass/app.scss'
import Toaster from "@meforma/vue-toaster";
import {createApp} from 'vue'
import Profile from './components/Profile.vue'

createApp(Profile).use(Toaster).mount("#app")