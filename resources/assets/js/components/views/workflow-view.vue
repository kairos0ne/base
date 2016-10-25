<template>
	<!-- Start vue boilerplate template for vm  -->
	<div id="wrapper">
    <!-- Start Main Container -->
    <div id="main_content_container" class="container-fluid">
        <colgroup>
            <div id="sidebar_container" class="col-md-2 col-sm-12 col-lg-2">
                <!-- Sidebar content  -->
               
            </div>
            <div id="content_bar_container" class="col-md-3 col-sm-12 col-lg-3">
                <!-- Secondary Bar  -->
         
            </div>
			<div id="content_section" class="col-md-7 col-lg-7 col-sm-12">
				<!-- Main application space -->
				<addworkflow></addworkflow>
			</div>
        </colgroup>
    </div>
</div>

</template>
<script>
    import addworkflow from '../workflow/add-workflow.vue'

// Start vue script for vm 
export default {
		data(){
        return {
        	showsidebar:true,
        	showtoolsbar:false,


        };
    },
    ready(){

    },
    components:{
    	addworkflow,
    },
    props:{

    },
    events: {

        },
    methods: {

    },
}
</script>