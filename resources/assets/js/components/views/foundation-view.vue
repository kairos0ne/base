<template>
    <div>
        <foundation></foundation>
        <research></research>
        <persona></persona>
        <architecture></architecture>
    </div>
</template>
<script>
    import foundation from './../page_assets/foundation.vue'
    import persona from './../page_assets/personas.vue'
    import architecture from './../page_assets/architecture.vue'
    import research from './../page_assets/research.vue'
    export default{
        name: 'information',
        data(){
            return{
                msg:'hello vue'
            }
        },
        components:{
            foundation: foundation,
            research: research,
            persona:persona,
            architecture: architecture,
        }
    }
</script>
    