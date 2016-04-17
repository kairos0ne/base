var Vue = require('vue');
Vue.use(require('vue-resource'));
Vue.config.debug = true

import portfolios from './componants/portfolios.vue'
import work from './componants/work.vue'
import research from './componants/research_goals.vue'
import gridpersona from './componants/gridpersona.vue'

new Vue({
    el: '#app',

    components: {portfolios, work, research, gridpersona},

    data: {

        pageintro1:'As a planner I look at research and analytics to create base sets of personas. Testing the base sets with like minded consumer groups/expert panels, then allows for validation and further clarification. Each persona is assessed in relation to the planned acquisition/retention journeys. This in turn forms a set of base performance structures for conversion tracking and allows for KPI comparison reports. The process entails data analysis across all capture and use points at the outset.',
        pageintro2:'The data is then collated and analysed to create and validate ideal personas (base sets). Personas are use cases within a specific audience segment that would interact with a brand in a unique way. Understanding the way in which these personas interact online, is the foundation to providing continuity in interaction through business intelligence. This in turn, once agreed, is used to build the acquisition journeys by identifying the core consumer epics, and presenting the journeys respectively.',
        searchQuery: '',
        gridColumns: ['Joa Blogs', 'Jim James', 'Sally Sam','Tami Times', ],
        gridData: [
            { 'Joa Blogs': 'Test some long text in this section so that we can check the formatting of the table', 'Jim James':'Some opening description here','Sally Sam':'Some opening description here','Tami Times':'Some opening line' },
            { 'Joa Blogs':'Some metric', 'Jim James': 'Some metric', 'Sally Sam':'Some metric', 'Tami Times':'Some metric' },
            { 'Joa Blogs':'Some metric', 'Jim James': 'Some metric', 'Sally Sam':'Some metric', 'Tami Times':'Some metric' },
            { 'Joa Blogs':'Some metric', 'Jim James': 'Some metric', 'Sally Sam':'Some metric', 'Tami Times':'Some metric' },
            { 'Joa Blogs':'Some metric', 'Jim James': 'Some metric', 'Sally Sam':'Some metric', 'Tami Times':'Some metric' },
            { 'Joa Blogs':'Some metric', 'Jim James': 'Some metric', 'Sally Sam':'Some metric', 'Tami Times':'Some metric' }
        ]
    },

});

