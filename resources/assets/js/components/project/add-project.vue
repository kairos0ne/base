<template>
    <div>
        <!-- Start onboarding specific template - only shows if the prop 'onboarding' is true -->
        <div v-if="onboadring" class="container">
            <h2 class="survey col-lg-offset-2 col-lg-8 col-md-8 col-sm-12">Enter the project details.</h2>
            <div class="negative-space"></div>
            <form action="" method="POST" role="form" v-show="! submitted">
                <div class="form-group col-lg-offset-2" v-show="showproject">
                    <div class="col-md-8 col-lg-8 col-sm-12  right-inner-addon pull-left">
                        <div class="left-inner-addon pullright">
                            <img role="img" src="/svg/openbracket.svg"/>
                            <input type="text" class="form-control custom_text_area" name="name" id="name" v-model="newProjectData.name" placeholder="Project" v-on:keyup.enter="setProjectAdded" autocomplete="off"/>
                        </div>
                        <img role="img" src="/svg/closebracket.svg"/>
                    </div>
                </div>
                <div class="form-group col-lg-offset-2" v-show="showdescription">
                    <div class="col-md-8 col-lg-8 col-sm-12  right-inner-addon pull-left">
                        <div class="left-inner-addon pullright">
                            <img role="img" src="/svg/openbracket.svg"/>
                            <input type="area" class="form-control custom_text_area" name="description" id="decription" v-model="newProjectData.description" placeholder="What is the core bsuiness focus" v-on:keyup.enter="setDescriptionAdded" autocomplete="off"/>
                        </div>
                        <img role="img" src="/svg/closebracket.svg"/>
                    </div>                    
                </div>
                <div class="form-group col-lg-offset-2" v-show="showtype">
                    <div class="col-md-8 col-lg-8 col-sm-12">
                        <p>Select your prefered project type and click enter.</p>
                        <select name="" id="input" class="form-control" required="required" v-model="newProjectData.type"  v-on:keyup.enter="onFormSubmit">
                            <option v-for="item in types" value="{{item}}" >{{item}}</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>

        <!-- Start add project generic temp for adding from edit dashboard -->
        <div v-else="! onboadring" id="content_pane_container">
            <form action="" method="POST" role="form">
                    <div class="form-group">
                        <ul class="list-group">
                            <li id="project_title_edit" class="">
                                <a id="btn-save" class="btn btn-default btn-xs pull-right" v-on:click="onFormSubmit">
                                    <i class="fa fa-pencil pull-right"></i>Save
                                </a>
                                <input type="text" class="form-control edit_input_style_title " name="name" id="name" v-model="ProjectData.name"  autocomplete="off"/>
                                
                            </li>
                            <div id="page_content_brief_edit">
                                <textarea class="form-control edit_input_style_body" name="description" id="decription" v-model="ProjectData.description" autocomplete="off"></textarea>
                                <listbrief></listbrief> 
                            </div>
                        </ul>         
                    </div> 
                    <button type="button" class="btn btn-default" v-on:click="onFormSubmit">Save</button>
            </form>
    </div>   
    </div>
</template>
<script>
import { getClientFromOnboarding } from '../vuex/getters'
import { setProjectInOnboarding } from '../vuex/actions'
export default {
    data(){
        return {
            submitted: false,
            showproject: true,
            showdescription: false,
            showtype:false,
            selected:'',
            types:[
                'Digital',
                'Print',
                'Packaging',
                'Outdoor',
                'Broadcast',
            ], 
            newProjectData: {
                id:null,
                client_id: null,
                name: '',
                description: '',
                status:'New',
                status_value:1,
                // This needs to be added to a data table later
                type:'',
            }
        };
    },
    props:{
        onboadring:false,
    },
    vuex: {
            getters: {
             // note that you're passing the function itself, and not the value 'getCount()'
            clientFromOnboarding: getClientFromOnboarding
            }, 
            actions: {
                setProjectInOnboarding,

            }
    },
    events: {

    },
    created(){
        // Get the client ID 
        this.newProjectData.client_id = this.clientFromOnboarding.id;
        this.getProjectCount();
        
    },
    methods: {
        setProjectAdded: function () {
            this.showproject = false;
            this.showdescription = true;
        },
        setDescriptionAdded: function(){
            this.showdescription = false;
            this.showtype = true;
        },
        setTypeForProject: function(item){
            this.newProjectData.type = this.selected;
        },
        onFormSubmit: function (e) {
            //Prevent default action
            e.preventDefault();
            // update the project count.
            this.getProjectCount();
            var project = this.newProjectData;
            this.setProjectInOnboarding(project);
            // Add the project id to parent vm
            var request = this.newProjectData;
            this.$dispatch('projectAdded');
            // show thanks message
            this.submitted = true;
            //set showarea to false
            this.showarea = false;
            //reset inputs
            this.newProjectData = {
                id:null,
                name: '',
                description: '',
                client_id: null,
                status:'',
                status_value:null,
                type:'',
            };
            // send ajax request
            this.$http.post('/api/post/projects', request);
        },
        getProjectCount: function() {
            this.$http.get('/api/get/projectcount').then(function (projectnew) {
                this.newProjectData.id = projectnew.data;
            });
        },
    }
}
</script>
