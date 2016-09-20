<template>
<div class="container">
    <div id="what" class="page-header col-lg-12 col-md-12 col-sm-12 ">
        <h1>Research<small> Metrics and their role.</small></h1>
        <p>Curiosity creates ideas and research validates them. Enabling the correct methodologies of research mitigates risk and often steers projects in a safer direction. The process entails data analysis across all capture and use points at the outset. The data is then collated and analysed to create a base set of<a href="/persona"> ideal personas.</a></p>
    </div>
    <p class="col-lg-6 col-md-6 col-sm-12"> <img id="foundation" src="png/research_image.png" alt="">Research is the backbone in the creative process It allows for a focused approach on a given set of objectives/ outcomes. The approach entails building associated data sets that provide context for an argument or comparison. The comparison of the sample data then serves as a starting point for a
        <a href="https://en.wikipedia.org/wiki/Test-driven_development">test driven development environment.</a> It is essential to define your parameters. A good example of this is the need for a per capita value in population analysis.</p>
    <div class="col-lg-6 col-md-6 col-sm-12">
        <h4 class="bullets-heading">Our approach in a digital environment is no different.</h4>
        <ul class="list-group-bullets">
            <li class="list-bullets" v-for="item in list">
                <i class="fa fa-check fa-md"></i> &nbsp;{{ item }}
            </li>
        </ul>
    </div>
    <div id="what" class="col-lg-12 col-md-12 col-sm-12 ">
        <p>Following this methodology allows us to build profiles of users and will later provide context for the features planned for development using
            <a href="https://en.wikipedia.org/wiki/Behavior-driven_development">BDD (behaviour driven development).</a></p>
    </div>
</div>
</template>

<script>
export default  {
    data () {
        return {
            list: [
                'Define your population - All site traffic/ traffic within region x',
                'Break it down into core samples using demographics and psychographics',
                'Analyse the set to identify trends',
                'Sample data within trends to build a road-map for continuous assessment',
                'Test, test, test...'
            ]
        };
    },

};
</script>