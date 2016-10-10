<template>
	<div class="list-group ">
	    <li  class="list-group-item h4">Clients</li>
        <li @click.prevent="setSelectedClient(client)" class="client_panel" v-for="client in clientList | orderBy 'name'">{{ client.name }}</li>
	</div>
</template>
<script>
export default {

    data(){
        return {
            userID:null,
            clientID:null,
            clientList:[],
            editToggel:true,

        };
    },
    ready(){
    	this.getClientData();
    	
    },
     events: {

        },
    methods: {
    	setSelectedClient: function(client) {
                this.$dispatch('update-client-rest', client); 
                this.$dispatch('setShowClientTrue');
                this.$dispatch('setShowProjectFalse');
                this.$dispatch('setShowBriefFalse');
        },
        getClientData: function(){
        	this.$http.get('api/get/clients').then(function(clients){
                    this.clientList = clients.data;
                });	
        },    
    },
}

</script>