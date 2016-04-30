var Vue = require('vue');
//require in router plugin
var VueRouter = require('vue-router')
//require in recource plugin
Vue.use(require('vue-resource'));

Vue.use(VueRouter)
//set environment to debug
Vue.config.debug = true;
//include CSRF Token in header of view instance
Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#csrf-token').getAttribute('content');

// Directives
// Amazon S3 Directive - directive to save files requires additional work and dropzone intergration.
Vue.directive('savefile', {
   params: ['S3'],
    bind: function () {
        this.el.addEventListener(
            'submit', this.onSubmit.bind(this)
            );  
    },

    onSubmit: function (e) {
        var requestType = this.getRequestType();
        this.vm
            .$http[requestType](this.el.action)
            .then(this.onS3.bind(this))
            .catch(this.onError.bind(this));
        e.preventDefault();
    },
    onS3: function(){
        if (this.params.s3) {
            alert(this.params.complete); // Use pretty flash message instead.
        }
    },

    onError: function (response) {
        alert(response.data.message); // Use pretty flash message instead.
    },

    //get the request type from the mthod
    getRequestType: function () {
        var method = this.el.querySelector('input[name="_method"]');
        return (method ? method.value : this.el.method).toLowerCase();
    }
});

// Custom directive to store forms 
Vue.directive('ajax', {
    params: ['complete'],

    bind: function () {
        this.el.addEventListener(
            'submit', this.onSubmit.bind(this)
        );
    },

    onSubmit: function (e) {
        var postData = this.request.formData();
        var requestType = this.getRequestType();

        this.vm
            .$http[requestType](this.el.action)
            .then(this.onComplete.bind(this))
            .catch(this.onError.bind(this));

        e.preventDefault();
    },

    onComplete: function () {
        if (this.params.complete) {
            alert(this.params.complete); // Use pretty flash message instead.
        }
    },

    onError: function (response) {
        alert(response.data.message); // Use pretty flash message instead.
    },

    //get the request type from the method
    getRequestType: function () {
        var method = this.el.querySelector('input[name="_method"]');
        return (method ? method.value : this.el.method).toLowerCase();
    },
    formData: function (e) {
        e.preventDefault();
       //get form data as array 
    }
});


//Import Components for the Application, these are the componants that belong 
// to the main vue instance and is Global for the site and bound to the vueapplication div

// Portfolio - resources/assets/js/components/portfolio
import portfolios from './components/portfolio/portfolios.vue'
import work from './components/portfolio/work.vue'
import addwork from './components/portfolio/add-work.vue'
// Page Assets - resources/assets/js/components/page_assets
import architecture from './components/page_assets/architecture.vue'
import persona from './components/page_assets/personas.vue'
import foundation from './components/page_assets/foundation.vue'
import research from './components/page_assets/research.vue'
import earlyaccess from './components/page_assets/access.vue'
import underconstruction from './components/page_assets/construction.vue'
import introduction from './components/page_assets/introduction.vue'

// Brief - resources/assets/js/components/brief
import addbrief from './components/brief/add-brief.vue'
import selectbrief from './components/brief/selectbrief.vue'
// Client - resources/assets/js/components/client
import addclient from './components/client/add-client.vue'
import selectclient from './components/client/selectclient.vue'
// Project - recourses/js/components/project
import addproject from './components/project/add-project.vue'
import selectproject from './components/project/selectproject.vue'


// Main vue application instance
new Vue({

    el: '#vueapplication',
    http: {
        headers: {
            // You could also store your token in a global object,
            // and reference it here. APP.token
            // 'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
        }
    },
data: {
        formData:[],
        user: null,
        clientList:[],
        projectList:[],
        briefList:[],
        showClient:true,
        showProject:false,
        showBrief:false,

        currentBrief:{
            id:null,
            overview:'',
            objective:'',
            project_id:null

        },
        currentProject:{
            id:null,
            name:'',
            description:'',
            client_id:null
        },
        currentClient:{
            id:null,
            name:'',
            business_area:'',
            user_id:null
        }
    },
    props: {
    
    },
    components: {
        persona:persona,
        portfolios:portfolios,
        work: work,
        addwork:addwork,
        research: research,
        architecture: architecture,
        foundation: foundation,
        earlyaccess: earlyaccess,
        underconstruction:underconstruction,
        introduction: introduction,
        addbrief: addbrief,
        selectbrief:selectbrief,
        addproject: addproject,
        selectproject: selectproject,
        addclient:addclient,
        selectclient: selectclient
    },
    ready() {
        this.getDashboardData();
    },
    methods: {
     getDashboardData: function () {
         this.$http.get('/api/get/clients').then(function(clients){
             this.clientList = clients.data;
         });
         this.$http.get('/api/get/projects').then(function (projects) {
             this.projectList = projects.data;
         });
         this.$http.get('/api/get/briefs').then(function (briefs) {
             this.briefList = briefs.data;
         })
     },
     
    }

});


