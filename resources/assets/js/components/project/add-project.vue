<template>
    <div>
        <div class="container">
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
                            <input type="text" class="form-control custom_text_area" name="description" id="decription" v-model="newProjectData.description" placeholder="What is the core bsuiness focus" v-on:keyup.enter="onFormSubmit" autocomplete="off"/>
                        </div>
                        <img role="img" src="/svg/closebracket.svg"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return {
            submitted: false,
            showproject: true,
            showdescription: false,
            count:null,
            newProjectData: {
                client_id: null,
                name: '',
                description: ''
            }
        };
    },
    created(){
        // Get all briefs for now - this should be changed later TEMP
        // focus first input;
        this.focusFirstInput();
        // Set the client_id of the new project data.
        this.getClientId();
        // Get the project count
        this.getProjectCount();
    },
    methods: {
        setProjectAdded: function () {
            this.showproject = false;
            this.showdescription = true;
        },
        onFormSubmit: function (e) {
            //Prevent default action
            e.preventDefault();
            // update the project count.
            this.getProjectCount();
            // Add the project id to parent vm
            this.$parent.currentProject.id = this.count + 1;
            var request = this.newProjectData;
            // add the client to client to a client object on the parent view model
            this.$parent.currentProject.client_id = request.client_id;
            this.$parent.currentProject.name = request.name;
            this.$parent.currentProject.description = request.description;
            // show thanks message
            this.submitted = true;
            //set showarea to false
            this.showarea = false;
            // set show project
            this.$parent.showProject = false;
            // set show brief
            this.$parent.showBrief = true;
            //reset inputs
            this.newProjectData = {
                name: '',
                description: '',
                client_id: null
            };
            // send ajax request
            this.$http.post('/api/post/projects', request);
        },
        focusFirstInput: function () {
            console.log('This only fires when loaded to the page test');
        },
        getClientId: function () {
            this.newProjectData.client_id = this.$parent.currentClient.id;
        },
        getProjectCount: function() {
            this.$http.get('/api/get/projectcount').then(function (projectcount) {
                var count = projectcount.data;
                this.count = count;
            });
        }
    }
}
</script>
