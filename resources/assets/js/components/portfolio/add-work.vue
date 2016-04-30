// app.vue
<template>
    <div>
        <h1>Add new work item</h1>
        <hr/>
        <form action="" method="POST" role="form" route="api/portfolios" v-if="! submitted" @submit="onSubmitForm" enctype="multipart/form-data">
            <div class="form-group">
                <input type="text" name="title" v-model="NewPortData.title" v-if="! submitted" id="inputID" class="form-control" value="Title of the project" title="title" required="required"></input>
                <input type="text" name="subtitle" v-model="NewPortData.subtitle" v-if="! submitted" id="inputID" class="form-control" value="The subtitle for the project" title="subtitle" required="required"></input>
                <input type="text" name="description" v-model="NewPortData.description" v-if="! submitted" id="inputID" class="form-control" value="The description for the project" title="description" required="required"></input>
                <input type="hidden" name="pdfurl" v-model="NewPortData.pdfurl" v-if="! submitted" id="inputID" class="form-control" value="/files/portfolio/{ this. }" title="pdfurl" required="required"></input>
                <textarea type="text" name="Intro" v-model="NewPortData.intro" v-if="! submitted" id="inputID" class="form-control" value="Intro text goes here" title="intro" required="required"></textarea>
                <textarea type="text" name="bodycontent" v-model="NewPortData.bodycontent" v-if="! submitted" id="inputID" class="form-control" value="bodycontent" title="bodyconent" required="required"></textarea>
                <input type="text" name="thumbnail" v-model="NewPortData.thumbnail" value="http://someurl.test.com" v-if="! submitted" id="inputID" class="form-control" title="thumbnail"></input>
                <input type="hidden" name="session_token" v-model="NewPortData.session_token" title="session_token" value="this.session_token" ></input>
                <input type="hidden" name="user_id" v-model="NewPortData.user_id" title="user_id" ></input>
                <input type="file" v-el="moreFiles" @change="uploadFile"></input>
                <button type="submit" class="btn btn-default">Submit</button>
            </div>
        </form>
        <div v-show="submitted" class="alert alert-success">
        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        	<strong>Submitted function is running</strong> Alert body ...
        </div>
    </div>
</template>
<script>


    export default {
        data(){
            return {
                submitted: false,
                projectList: [],
                fileList: [],
                portfoliofile: [],
                NewPortData: {
                    user_id: '',
                    title: '',
                    subtitle: '',
                    description: '',
                    thumbnail: '',
                    pdfurl: '',
                    intro: '',
                    bodycontent: '',
                },

            }
        },
        //Properties are used to parse data from the server to view model. In this case, we use userid and sessionkey
        props: {
            userid: [],
            s3bucket: [],
            s3baseurl: [],
            filepath: []

        },
        computed: {
            fullS3Path: function () {
                return this.s3bucket + this.s3baseurl
            }
        },
        //When the page loads the created functions will run.
        created(){
            // Get all projects on page load.
            this.fetchAllProjects();
            console.log('You Asshole');
        },

        //Methods are used to perform tasks based on events
        methods: {
            //Get all items stored on the DB by sending a request to the handler setup in the routes file
            fetchAllProjects: function () {
                //Get the data from the server using vue-recource
                this.$http.get('/api/portfolios').then(function (portfolios) {
                    //Set the collected data in an array object called projectlist
                    this.projectList = portfolios.data;
                });
            },
            onSubmitForm: function (e) {
                // prevent the deafult submit form submit
                e.preventDefault();
                // initialise a variable to assign the new data
                var request = this.NewPortData;
                // add new newPerson to people array
                this.projectList.push(project);
                // reset inputs
                this.NewPortData = {
                    user_id: null,
                    title: '',
                    subtitle: '',
                    description: '',
                    thumbnail: '',
                    pdfurl: '',
                    intro: '',
                    bodycontent: ''
                };
                // show thanks message
                this.submitted = true;
                // send ajax request
                this.$http.post('/api/portfolios', request);
                //Run the file upload function
            },
            uploadFile: function () {
                this.$http.post('/api/post/files', request);
            }
        }
    }
</script>