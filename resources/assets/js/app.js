var Vue = require('vue');
//require in router plugin
var VueRouter = require('vue-router')
var Vuex = require("vuex")
Vue.use(Vuex)
//require in recource plugin
Vue.use(require('vue-resource'));
Vue.use(VueRouter)

//include CSRF Token in header of view instance
Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#csrf_token').getAttribute('content');
var router = new VueRouter()

import foundationView from './components/views/foundation-view.vue'
import dashboardView from './components/app.vue'
import introductionView from './components/views/introduction-view.vue'
import welcomeView from './components/views/welcome-view.vue'
// Import vuex store 
import store from './components/vuex/store' // import the store we just created
//set environment to debug
Vue.config.debug = true;

router.map({
    '*': {
        component: Vue.extend({template:'<h4>404 Not found</h4>', name:'not-found'})
    },
    '/dashboard': {
        component: dashboardView
    },
    '/': {
        component: welcomeView
    },
    '/foundation': {
        component: foundationView
    },
    '/introduction': {
        component: introductionView
    },
})

var App = Vue.extend({
    store,
    vuex: {
       

    }
})

router.start(App, '#app')


//Filter Projects By ID Filter 
Vue.filter('projectID', function(value, id){
    return value.filter(function(item){
        return item.project_id == id;
    });
});
Vue.filter('clientID', function(value, client_id){
    return value.filter(function(item){
        return item.id == client_id;
    });
});
Vue.filter('briefsForProject', function(value, id){
    return value.filter(function(item){
       return item.project_id == id;
    });
});


