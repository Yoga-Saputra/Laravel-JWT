import './bootstrap'
import Vue from 'vue'
import App from './components/ExampleComponent.vue'
const vm = new Vue({
    el: '#app',
    render: h => h(App)
})