var Vue = require('vue');
//require in router plugin
var VueRouter = require('vue-router')
//require in recource plugin
Vue.use(require('vue-resource'));

Vue.use(VueRouter)

//include CSRF Token in header of view instance
Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#csrf_token').getAttribute('content');

var App = Vue.extend();

var router = new VueRouter()

import foundationView from './components/views/foundation-view.vue'
import dashboardView from './components/app.vue'
import introductionView from './components/views/introduction-view.vue'
//set environment to debug
Vue.config.debug = true;

router.map({
    '*': {
        component: Vue.extend({template: '<h4>404 Not found</h4>'})
    },
    '/dashboard': {
        component: dashboardView
    },
    '/': {
        component: foundationView
    },
    '/foundation': {
        component: foundationView
    },
    '/introduction': {
        component: introductionView
    },
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
