<template>
    <div>
        <div class="container">
            <h2 class="survey col-lg-offset-2 col-lg-8 col-md-8 col-sm-12">Add the client details.</h2>
            <div class="negative-space">
            </div>
            <form method="POST" action="" role="form" v-show="! submitted">
                <div class="form-group col-lg-offset-2" v-show="showname">
                    <div class="col-md-8 col-lg-8 col-sm-12  right-inner-addon pull-left">
                        <div class="left-inner-addon pullright">
                            <img role="img" src="/svg/openbracket.svg"/>
                            <input type="text" v-focus class="form-control custom_text_area" name="name" id="name" v-model="newClientData.name" placeholder="Client name" v-on:keyup.enter="setNameAdded" autocomplete="off"/>
                        </div>
                        <img role="img" src="/svg/closebracket.svg"/>
                    </div>
                </div>
                <div class="form-group col-lg-offset-2" v-show="showarea">
                    <div class="col-md-8 col-lg-8 col-sm-12  right-inner-addon pull-left">
                        <div class="left-inner-addon pullright">
                            <img role="img" src="/svg/openbracket.svg"/>
                            <input  type="text" class="form-control custom_text_area" name="business_area" id="business_area" v-model="newClientData.business_area" placeholder="What is the core bsuiness focus" v-on:keyup.enter="onFormSubmit" autocomplete="off"/>
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
            submitted:false,
            showname:true,
            showarea:false,
            clients:[],
            count:null,
            newClientData: {
                name:'',
                business_area:'',
                user_id: this.userid,
            }
        };
    },
    props: [
        'userid'
    ],
    created(){
        // Get the client Count 
        this.getClientCount();
        // focus first input
        this.focusFirstInput();
    },
    methods: {
        setNameAdded: function () {
            this.showname = false;
            this.showarea = true;
        },
        onFormSubmit: function (e){
            //Prevent default action
            e.preventDefault();
            // Run the client function to ensure that the latest is current
            this.getClientCount();
            // initialise a variable to assign the new data
            var request = this.newClientData;
            // Add the id to current client.
            this.$parent.currentClient.id = this.count + 1;
            // add the client to client to a client object on the parent view model
            this.$parent.currentClient.user_id = request.user_id;
            this.$parent.currentClient.name = request.name;
            this.$parent.currentClient.business_area = request.business_area;
            // show thanks message
            this.submitted = true;
            //set showarea to false
            this.showarea = false;
            // set hasClients to true
            this.$parent.showClient = false;
            // show the project component
            this.$parent.showProject = true;
            //reset inputs
            this.newClientData = {
                name:'',
                business_area:'',
                user_id:null
            };
            // send ajax request
            this.$http.post('/api/post/clients', request);

        },
        focusFirstInput: function() {
            // Set overview class as :focus

            
        },
        getClientCount: function(){
            this.$http.get('/api/get/clientcount').then(function (clientcount) {
                //get the request
                var count = clientcount.data;
                this.count = count;
            });
        }
    }
}
</script>
