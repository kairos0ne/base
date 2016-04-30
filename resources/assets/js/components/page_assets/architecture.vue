<template>
<div class="container">
    <div id="what" class="page-header col-lg-12 col-md-12 col-sm-12 ">
        <h1>Architecture<small>Defining core messaging and messaging hierarchy</small></h1>
        <p>Information architecture is the result of building conversion journeys based one the use cases defines.</p>
    </div>
    <p class="col-lg-6 col-md-6 col-sm-12"> <img id="foundation" src="png/architecture_image.png" alt="">Many digital practioners will have you belive that an information architecture (IA) is generally a site map. It is not a site map. Had it been as such, we would have called it that. It is rather an assement of the of the information you have in relation to the users needs</p>
    <p class="col-lg-6 col-md-6 col-sm-12"> As a result many make the mistake of, well let's start with the homepage and then discuss where we go from there. As per the first statement, this is not the correct way to go about developing an IA. An IA is rather an assesment of propositions you'd like to present and where they should be based on your defined personas</p>
    <div class="container">
    <p class="col-lg-6 col-md-6 col-sm-12"> A better place to start would be - What is my core proposition and is it relevant to all personas? For instance, let's say I run a online platform to help folks establish a strategy for building digital tools. My core proposition is: 'Helping you, do a better job at building a strategy'. This needs to be at the forfront of my communications and is relevant to all audiences. Therefor lets start with that and use it as a hero on the homepage. Lets break that down into a thought process so you can see whats going on here.</p>
    <div class="col-lg-6 col-md-6 col-sm-12">
    <h4 class="bullets-heading">Thought process</h4>
        <ul class="list-group-bullets">
            <li class="list-bullets" v-for="item in list">
                <i class="fa fa-check fa-md"></i> &nbsp;{{ item }}
            </li>
        </ul>
    </div>
    </div>
    <hr/>
    <div class="container">
        <p class="col-lg-6 col-md-6 col-sm-12">It's a very rudimentary example and almost seems silly and obvious, however as you transition down the hierarchy in propositions, these choices and decisions become less obvious. A good example of this would be - Given the platform I'm building, there are X core modules. One of which is to export predefined prototype templates to take into design. The other is an export of features as a integrated behat module for developers across x platforms. This will enable developers and designers to work independently as the templates are then exported with links and documentation on the connected elements provided</p>
        <p class="col-lg-6 col-md-6 col-sm-12">However, the site is not for developers. The site is for building a strategy while connecting that strategy to the materials required for these developers to take further into something of production quality. Therefore the message is not fit for a hero as I may alienate a core target market. In plain english, had I put the earlier up front, developers, strategists and clients may come to the site and think I'm just selling front end templates. This would not be ideal as I'm not selling front end templates, the sites core market are strategeists</p>
    </div>

</template>
<script>
    export default  {
        data () {
            return {
                list: [
                'What is my core proposition for the business?',
                'Is that core proposition relevant to everyone who engages on the site?',
                'Is this proposition important enough to feature as a hero?',
                'Will this proposition discourage users looking for other services we provide?',
                ]
            };
        },

    };
</script>