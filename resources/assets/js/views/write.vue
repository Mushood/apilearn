<template>
  <div class="row">
    <div class="col-md-6">
      <h1>Preview</h1>
      <h2>{{title}}</h2>
      <p>
          {{body}}
      </p>
      <img :src="'/images/'+ picture" class="img-responsive col-md-10" alt="image" />
    </div>
    <div class="col-md-6">
      Blog form
      <form method="POST" action="/blog" @submit.prevent="submitForm">
      <div class="row">
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" name="title" id="title" v-model="title">

        </div>
      </div>
      <div class="row">
        <div class="form-group">
          <label for="content">Content</label>
          <textarea class="form-control" name="content" id="content" rows="8" v-model="body"></textarea>
        </div>
      </div>
      <div class="row">
        <div class="form-group">
          <label for="image">Image</label>
          <select  name='image' v-model="picture">
            <option value="sky.jpg">sky</option>
            <option value="ocean.jpg">ocean</option>
          </select>
        </div>
      </div>
      <div class="row">
        <button class="btn btn-primary">
          I like what I see!
        </button>
      </div>
    </form>
    </div>
  </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component write mounted.')
        },


        data() {
          return {
            title: 'Blog Title',
            body: 'Blog Message',
            picture: "sky.jpg"
          };
        },

        validators: {
          title: function (value) {
            return Vue.Validator.value(value).required();
          }
        },

        methods : {
          submitForm: function() {
            const vm = this;
            axios.post('/blog', {
              title: this.title,
              body: this.body,
              image: this.picture
            })
            .then(function (response) {


              if(response.data.operation == "success"){
                Vue.swal({
                  title: 'Success!',
                  text: 'The blog has been saved',
                  type: 'success',
                  confirmButtonText: 'Cool'
                });
                vm.resetForm();
              }

            })
            .catch(function (error) {
              Vue.swal({
                title: 'Failure!',
                text: error.message,
                type: 'warning',
                confirmButtonText: 'Cool'
              });
            });
          } ,

          resetForm: function() {
            this.title = '';
            this.body = '';
            this.picture = '';
          } ,

          testValidation: function(){
            this.Vue.$validate()
              .then(function (success) {
                if (success) {
                  alert('Validation succeeded!');
                }
              });
          }
        },

    }
</script>
