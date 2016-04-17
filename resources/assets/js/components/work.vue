<template>
<div>
    <div class="page-header col-lg-12 col-md-12 col-sm-12 " transition="fade">
        <h1>Latest Work <small>(UX, User Flows and Strategic insight)</small></h1>
        <p>Collection of work latest work accross a mix of channels. </p>
    </div>
    <div class=" page-header col-lg-12 col-md-12 col-sm-12">
        <h1>{{ project.title }}<small>{{project.subtitle}}{{projectId}}</small></h1>
        <button class="btn btn-default" type="submit" v-if="project.id > 1" @click="">Previous</button>
        <button class="btn btn-default" type="submit" v-if="this.urlid < projectList.length" @click="">Next</button>
    </div>
</div>
</template>

<script>
export default  {
    data () {
        return {
            project:[],
            projectList:[]
        };
    },
    props: {
        urlid: '',

    },
    created () {
        this.setUrlId();
        this.fetchAllProjects();
    },

    methods: {

        fetchAllProjects: function () {
            this.$http.get('/api/portfolios/').then(function(portfolios){
                this.projectList = portfolios.data;
            });
        },
        setUrlId:function () {

            var resource = this.$resource('/api/portfolios{/id}');
            //Get the data from the URL with the Url ID Specified
            resource.get({id:this.urlid}).then(function (response) {
                this.project = response.data;
            });
        },
    }
}
</script>

