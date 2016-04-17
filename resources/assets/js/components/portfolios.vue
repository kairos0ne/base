<template>
    <div class="container">
        <div class="page-header col-lg-12 col-md-12 col-sm-12 ">
            <h1>Latest Work
                <small>(UX, User Flows and Strategic insight)</small>
            </h1>
            <p>A collection of work spanning multiple channels and clients. </p>
        </div>
        <ul class="list-group">
            <li class="list-group-item" v-for="item in portlist">
                <h3><a href="/portfolio/{{ item.id }}">{{ item.title }}</a></h3>
                <img class="portthumbnail" v-bind="{src:item.thumbnail}"/>
                    <p>{{ item.description }}</p>
                    <a href=" /portfolio/{{ item.id }}">
                    <button type="submit" class="btn btn-primary">View files </button>
                    </a>
                    <p class="clear"></p>
                    <hr/>
            </li>
        </ul>
    </div>
</template>
<script>
export default {
    data() {
        return {
            portlist:[]
        }
    },
        created () {
        this.fetchPortfoliosList();
        },

        methods: {
        fetchPortfoliosList: function(){
            this.$http.get('/api/portfolios').then(function(portfolios) {
            this.portlist = portfolios.data;
            });
        }
    }
};
</script>


