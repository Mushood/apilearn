<template>
<div class="page_wrapper">
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
          <span v-if="errors.errors">
            <h5 v-if="errors.errors.title"  class="alert alert-danger">{{errors.errors.title[0]}}</h5>
          </span>
        </div>
      </div>
      <div class="row">
        <div class="form-group">
          <label for="content">Content</label>
          <textarea class="form-control" name="content" id="content" rows="8" v-model="body"></textarea>
          <span v-if="errors.errors">
            <h5 v-if="errors.errors.body" class="alert alert-danger">{{errors.errors.body[0]}}</h5>
          </span>
        </div>
      </div>
      <div class="row">
        <div class="form-group">
          <label for="image">Image</label>
          <select  name='image' v-model="picture" @fileUploaded="onFileUpload">
            <option value="upload">Upload a new picture</option>
            <option value="sky.jpg">sky</option>
            <option value="ocean.jpg">ocean</option>
          </select>
          <span v-if="errors.errors">
            <h5 v-if="errors.errors.image" class="alert alert-danger">{{errors.errors.image[0]}}</h5>
          </span>
        </div>
        <div class="form-group" v-if="this.picture == 'upload'">
          <label for="image">Image</label>
          <input type="file" class="form-control" name="uploadedPic">
        </div>
      </div>
      <div class="row">
        <button type="submit" class="btn btn-primary">
          I like what I see!
        </button>
      </div>
    </form>
    </div>
  </div>
  <div class="row">
    <file-upload></file-upload>
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
            title: '',
            body: '',
            picture: "",
            errors: {}
          };
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
                text: error.response.data.message,
                type: 'warning',
                confirmButtonText: "Let's fix it!"
              });

              vm.errors = error.response.data;
            });
          } ,

          resetForm: function() {
            this.title = '';
            this.body = '';
            this.picture = '';
            this.errors = {};
          } ,

          onFileUpload: function() {
            alert("hello");
          }

        },

    }
</script>
