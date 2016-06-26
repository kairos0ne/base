var Vue = require('vue');
//require in router plugin
var VueRouter = require('vue-router')
//require in recource plugin
Vue.use(require('vue-resource'));

Vue.use(VueRouter)
//set environment to debug
Vue.config.debug = true;
//include CSRF Token in header of view instance
Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#csrf_token').getAttribute('content');

// Directives
Vue.directive('focus', {
    bind: function () {
        this.el.focus();
    }
});
// Note include aws save to s3 directive at a later date

// Import Components for the Application, these are the components that belong 
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
import showbrief from './components/brief/show-brief.vue'
import editbrief from './components/brief/edit-brief.vue'
import listbrief from './components/brief/list-brief.vue'
// Client - resources/assets/js/components/client
import addclient from './components/client/add-client.vue'
import showclient from './components/client/show-client.vue'
import editclient from './components/client/edit-client.vue'
import listclient from './components/client/list-client.vue'
// Project - recourses/js/components/project
import addproject from './components/project/add-project.vue'
import showproject from './components/project/show-project.vue'
import editproject from './components/project/edit-project.vue'
import listproject from './components/project/list-project.vue'

// Project - recourses/js/components/project
import viewprojects from './components/views/view-project.vue'
import viewclients from './components/views/view-project.vue'
import viewbriefs from './components/project/edit-project.vue'
import listproject from './components/project/list-project.vue'

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




// Main vue application instance
new Vue({

    el: '#vueapplication',

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
    directives: {
        focus: focus
    },
    components: {
        // Client Components 
        addclient: addclient,
        showclient: showclient,
        editclient: editclient,
        listclient: listclient,
        // Project Components 
        addproject: addproject,
        showproject: showproject,
        editproject: editproject,
        listproject: listproject,
        // Brief Components 
        addbrief: addbrief,
        showbrief:showbrief,
        editbrief: editbrief,
        listbrief: listbrief,
        // Page Asset Components 
        foundation: foundation,
        research: research,
        persona:persona,
        architecture: architecture,
        earlyaccess: earlyaccess,
        underconstruction:underconstruction,
        introduction: introduction,
        //Portfolio Components - Remove 
        portfolios:portfolios,
        work: work,
        addwork:addwork,
        
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
        setSelectedClient: function(client) {
            this.currentClient = client;
        },
        setSelectedProject: function(project) {
            this.currentProject = project;
        },
        setSelectedBrief: function(brief) {
            this.currentBrief = brief;
        },
    }

});


