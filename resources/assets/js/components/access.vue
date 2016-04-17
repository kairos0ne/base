<template>
    <div>
        <form   
            action="/api/post/access" 
            method="POST" 
            role="form"  
            v-if="! submitted"
            v-ajax
            @submit="onSubmit"
            >
            <div class="form-group">
                <input 
                    type="text" 
                    name="name" 
                    v-model="newPerson.name" 
                    v-if="! submitted" 
                    id="inputID" 
                    class="form-control" 
                    value="John Doe" title="" 
                    required="required"
                    />
                <input 
                    type="email" 
                    name="email" 
                    v-model="newPerson.email" 
                    v-if="! submitted" 
                    id="inputID" 
                    class="form-control" 
                    value="john@doe.com" 
                    title="" 
                    required="required"/>
            </div>
            <button type="submit" class="btn btn-default" v-if="! submitted">Submit</button>
        </form>
        <div class="alert alert-success" v-if="submitted">
            <i class="fa fa-thumbs-up thumbalert"></i>
            Thanks for submitting your details. All details are stored and encryted in the Database. An email noting the launch date will be deployed.
        </div>
    </div>
</template>
<script>
    export default {
    data() {
    return {
        newPerson:  {
            name:'',
            email:''
        },
        submitted: false,
    }
},

    created () {
},

    methods: {
        
        onSubmitForm: function(e){
            // prevent the deafult submit form submit
            e.preventDefault();
            var person = this.newPerson;
            // reset inputs
            this.newPerson = {name: '', email:''};
            // hide submit
            // show thanks message
            this.submitted = true;
            // send ajax request
            this.$http.post('api/post/access', person)
        }
    }
}
</script>
