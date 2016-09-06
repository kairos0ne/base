<template>
    <div>
        <div class="container">
            <h2 class="survey col-lg-offset-2 col-lg-8 col-md-8 col-sm-12"><i class="fa fa-quote-left grey-icon"></i>What people think of as the moment of discovery is really the discovery of the question - Jonas Salk.  <i class="fa fa-quote-right grey-icon"></i></h2>
            <div class="negative-space"></div>
            <form id="addbriefform" action="" method="POST" role="form" v-show="! submitted">
                <div class="form-group col-lg-offset-2" v-show=" ! overviewsubmitted">
                    <div class="col-md-8 col-lg-8 col-sm-12  right-inner-addon pull-left">
                    <div class="left-inner-addon pullright">
                        <img role="img" src="/svg/openbracket.svg"/>
                    <input type="text" class="form-control custom_text_area" name="Overview" id="overview" v-model="newBriefData.overview" placeholder="What is the background to the brief?" v-on:keyup.enter="setOverviewAdded" autocomplete="off"/>
                        </div>
                        <img role="img" src="svg/closebracket.svg"/>
                    </div>
                </div>
                <div class="form-group col-lg-offset-2" v-show=" overviewsubmitted">
                    <div class="col-md-8 col-lg-8 col-sm-12  right-inner-addon pull-left">
                        <div class="left-inner-addon pullright">
                            <img role="img" src="/svg/openbracket.svg"/>
                    <input type="text" class="form-control custom_text_area" name="Objective" id="objective" v-model="newBriefData.objective" placeholder="What are you trying to achieve with the platform?" v-on:keyup.enter="onFormSubmit" autocomplete="off"/>
                        </div>
                        <img role="img" src="svg/closebracket.svg"/>
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
                overviewsubmitted:false,
                objectivesubmitted:false,
                count:null,
                newBriefData:{
                    overview:'',
                    objective:'',
                    project_id: null,
                }
            }
        },
        created(){
            // Get project id from parent component
            this.getProjectId();
            // Fire the count method on page load 
            this.getBriefCount();
            },
        methods: {
            setOverviewAdded: function () {
                    this.overviewsubmitted = true;
            },
            onFormSubmit: function (e){
                //Prevent default action
                e.preventDefault();
                // update the brief count
                this.getBriefCount();
                // initialise a variable to assign the new data
                var request = this.newBriefData;
                //Set the current brief on the parent vm
                this.$parent.currentBrief.id = this.count + 1;
                this.$parent.currentBrief.project_id = request.project_id;
                this.$parent.currentBrief.overview = request.overview;
                this.$parent.currentBrief.objective = request.objective;
                // Change the showBrief value on the parent vm
                this.$parent.showBrief = false;
                // show thanks message
                this.submitted = true;
                //reset inputs
                this.newBriefData = {
                    overview:'',
                    objective:'',
                    project_id:null
                };
                // send ajax request
                this.$http.post('/api/post/briefs', request);
                // Refresh the page and DOM 
                this.$router.go('/dashboard');
                
            },
            getProjectId:function () {
                this.newBriefData.project_id = this.$parent.currentProject.id;  
            },
            getBriefCount: function(){
                this.$http.get('/api/get/briefcount').then(function (briefcount) {
                    //get the request data
                    var count = briefcount.data;
                    this.count = count;
                });
            }
        }
    }
</script>
