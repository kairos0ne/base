<template>	
	<ul class="list-group">
	    <li id="project_title" class="list-group-item h4 ">Projects
	        <a @click.prevent="setListView"><span class="fa fa-list fa-pull-right"></a></span>
	        <a @click.prevent="setCardView"><span class="fa fa-th-large fa-pull-right"></a></span>
	        <a href="{filter}"><span class="fa fa-filter fa-pull-right"></a></span>
	    </li>
	    
	    <li v-show="cardView" v-for="project in projectList" class="project_panel"><a>
	        <div id="project_panel_title" @click.prevent="fireProjectEvent(project)"><i class="fa fa-briefcase"></i>&nbsp;{{ project.name }}</div></a>
            <p id="project_panel_BusUnit">{{project.description}}</p>
	        <p id="project_panel_BusUnit"><i class="fa fa-folder"></i>&nbsp;<strong>Client:</strong>&nbsp;{{ ClientData.name }}</p>
	        <div id="progress_bar_ID"class="progress">
	            <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;">
	                <span class="sr-only"></span>
	            </div>
	        </div>
	        <hr>
	    </li>

	    <!-- Start List View -->
		<ul v-show="listView" class="list-group">
            <a>
                <li id="project_list_bar" class="list-group-item" v-for="project in projectList" @click.prevent="fireProjectEvent(project)">
                    <i class="fa fa-briefcase"></i>&nbsp;
                    {{project.name}}
                </li>
            </a>
        </ul>	    
	</ul>
</template>
<script>
	export default {
		data(){
        return {
            ClientData:{},
            ClientID:null,
            projectList:[],
            editToggel:true,
            status:'',
            cardView:true,
            listView:false,
        };
    },
    ready(){

    },
    events: {
            'list-projects': function (client) {
              // `this` in event callbacks are automatically bound
              // to the instance that registered it 
                this.ClientData = client; 
                this.ClientID = this.ClientData.id;
                this.$http.get('api/get/projects/'+ this.ClientData.id).then(function(projects){
                    this.projectList = projects.data;
                });
            },
        },
    methods: {
    	fireProjectEvent: function(project){
    		this.$dispatch('update-project-rest', project);
    	},
    	setListView: function(){
    		this.cardView = false;
    		this.listView = true;
    	},
    	setCardView: function(){
    		this.cardView = true; 
    		this.listView = false; 
    	},
    },
}
</script>