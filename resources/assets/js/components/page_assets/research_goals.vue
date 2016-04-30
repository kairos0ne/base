<template>
    <h4 class="bullets-heading">Our approach in a digital environment is no different.</h4>
        <ul class="list-group-bullets">
            <li class="list-bullets" v-for="item in list">
                <i class="fa fa-check fa-md"></i> &nbsp;{{ item }}
            </li>
        </ul>
</template>

<script>

export default  {
    data () {
        return {
            list: [
                'Define your population - All site traffic/ traffic within region x',
                'Break it down into core samples using demographics and psychographics',
                'Anaylse the set to identify trends',
                'Sample data within trends to build a road-map for continuous assessment',
            ]
        };
    },

};
</script>


