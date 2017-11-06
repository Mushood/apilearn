<template>
<div class="page_wrapper">
  <div class="row">
    <div class="col-md-6">
      <h1>Preview</h1>
      <h2 v-if="title">{{title}}</h2>
      <p v-if="body">
          {{body}}
      </p>
      <img :src="'/images/'+ picture" class="img-responsive col-md-10" alt="image" v-if="picture"/>
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
          <select  name='image' v-model="picture">
            <option value="upload">Upload a new picture</option>
            <option v-for="picture in pictures" :value="picture.value">{{picture.name}}</option>
          </select>
          <span v-if="errors.errors">
            <h5 v-if="errors.errors.image" class="alert alert-danger">{{errors.errors.image[0]}}</h5>
          </span>
        </div>
        <div class="row" v-if="this.picture == 'upload'">
          <file-upload></file-upload>
        </div>
      </div>
      <hr />
      <div class="row">
        <button type="submit" class="btn btn-primary">
          I like what I see!
        </button>
      </div>
    </form>
    </div>
  </div>

</div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component write mounted.');
            let vm = this;
            Event.$on('fileUploaded', function(event){
              console.log(event.filename);
              vm.onFileUpload(event.filename);
            });
        },


        data() {
          return {
            title: '',
            body: '',
            picture: "",
            pictures: [
              {name: 'ocean', value:'ocean.jpg'},
              {name: 'sky', value:'sky.jpg'},
            ],
            errors: {}
          };
        },

        methods : {
          submitForm: function() {
            const vm = this;
            if(this.picture == 'upload'){
              this.picture = '';
            }
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

          onFileUpload: function(filename) {
            let originalFile = filename.split("_")[1];
            let originalName = originalFile.split(".")[0];

            this.pictures.push({name: originalName, value: filename});
            this.picture = filename;
          }

        },

    }
</script>
