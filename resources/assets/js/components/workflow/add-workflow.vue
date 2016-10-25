<template>
	<!-- Start vue boilerplate template for vm  -->
	<div>
		<h1>Test Add Workflow</h1>
	</div>
	<button @click.prevent="setValues" type="button" class="btn btn-info">button</button>
</template>
<script>

// Start vue script for vm 
export default {
		data(){
        return {
        	values:[
        		'test1',
        		'test2',
        		'test3',
        	],

        };
    },
    ready(){

    },
    props:{

    },
    events: {

        },
    methods: {
    	setValues:function (e){
    		//Prevent default action
            e.preventDefault();
            var request = this.values;
            var projectid = 1;
            // add the client to client to a client object on the parent view model
            // send ajax request	
            this.$http.post('/api/post/workflow/', request);
    	}
    },
}
</script>