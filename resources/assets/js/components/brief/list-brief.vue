<template>  
    <div>
        <ul id="show_project_list" class="list-group">
            <li class="brief_list_edit">
                <a class="badge_lable">Briefs&nbsp;<span class="badge">Total -&nbsp;{{briefList.length}}</span></a><br>
            </li>
            <li class="brief_list" v-for="item in briefList">
                {{item.overview}}
            </li>
        </ul>
    </div>
</template>
<script>
export default {

    data(){
        return {
            ProjectID:null,
            project:{},
            briefList:[],
            editToggel:true,
            status:'',

        };
    },
    created(){
    	
    },
     events: {
            'list-briefs': function (project) {
              // `this` in event callbacks are automatically bound
              // to the instance that registered it
                this.project = project; 
                this.ProjectID = this.project.id;
                this.$http.get('api/get/briefs/' + this.ProjectID).then(function(briefs){
                    this.briefList = briefs.data;
                });
            },
        },
    methods: {

    },
}
</script>