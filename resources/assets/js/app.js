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

//import global components
import portfolios from './components/portfolios.vue'
import work from './components/work.vue'
import architecture from './components/architecture.vue'
import persona from './components/personas.vue'
import foundation from './components/foundation.vue'
import addbrief from './components/add-brief.vue'
import addclient from './components/add-client.vue'
import research from './components/research.vue'
import earlyaccess from './components/access.vue'
import underconstruction from './components/construction.vue'
import addwork from './components/add-work.vue'
import selectbrief from './components/selectbrief.vue'
import selectclient from './components/selectclient.vue'
import addproject from './components/add-project.vue'
import selectproject from './components/selectproject.vue'
import introduction from './components/introduction.vue'

// Build a S3 Custom Directive for file inputs.
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

//Custom directive to bind forms needs work to accept form data
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

    //get the request type from the mthod
    getRequestType: function () {
        var method = this.el.querySelector('input[name="_method"]');
        return (method ? method.value : this.el.method).toLowerCase();
    },
    formData: function (e) {
        e.preventDefault();
       //get form data as array 
    }
});
// create router componant
//New up a new view model
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
        addbrief: addbrief,
        selectbrief:selectbrief,
        addproject: addproject,
        selectproject: selectproject,
        earlyaccess: earlyaccess,
        underconstruction:underconstruction,
        addclient:addclient,
        selectclient: selectclient,
        introduction: introduction
    },
    created() {
       console.log('Vue & Vueify Ready');
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

     }
    }

});
