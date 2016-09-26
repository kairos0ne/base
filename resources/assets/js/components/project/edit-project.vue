<template>
    <div>
        <div class="container">
            <h2 class="survey col-lg-offset-2 col-lg-8 col-md-8 col-sm-12">Enter the project details.</h2>
            <div class="negative-space"></div>
            <form action="" method="POST" role="form">
                <div class="form-group col-lg-offset-2">
                    <div class="col-md-8 col-lg-8 col-sm-12  right-inner-addon pull-left">
                        <div class="left-inner-addon pullright">
                            <img role="img" src="/svg/openbracket.svg"/>
                            <input type="text" class="form-control custom_text_area" name="name" id="name" v-model="ProjectData.name"  autocomplete="off"/>
                        </div>
                        <img role="img" src="/svg/closebracket.svg"/>
                    </div>
                </div>
                <div class="form-group col-lg-offset-2">
                    <div class="col-md-8 col-lg-8 col-sm-12  right-inner-addon pull-left">
                        <div class="left-inner-addon pullright">
                            <img role="img" src="/svg/openbracket.svg"/>
                            <input type="text" class="form-control custom_text_area" name="description" id="decription" v-model="ProjectData.description" autocomplete="off"/>
                        </div>
                 		<button type="button" class="btn btn-default" v-on:click="onFormSubmit">Save</button>
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
            ProjectData: {
            }, 
            ParentClient: {
            },
            clientID:null,
            briefList:[],
        };
    },
    created(){
    	
    },
     events: {
            'edit-project': function (project) {
              // `this` in event callbacks are automatically bound
              // to the instance that registered it
                this.ProjectData = project; 
                this.clientID = project.client_id;
                this.$http.get('api/get/clients/' + this.clientID).then(function(client){
                    this.ParentClient = client.data;
                });
            },
        },

    methods: {
        onFormSubmit: function (e) {
            //Prevent default action
            e.preventDefault();
            var request = this.ProjectData;
            // add the client to client to a client object on the parent view model
            // send ajax request	
            this.$http.put('/api/put/project/ + ProjectData.id', [request, id]);
        },
    }
}
</script>