import './bootstrap';

import { createApp } from 'vue'
import CardsIndex from './components/Cards/Index.vue'

createApp({})
    .component('CardsIndex', CardsIndex)
    .mount('#app')