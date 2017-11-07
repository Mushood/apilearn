<template>
<div class="page_wrapper">
  <div class="row">
    <div class="col-md-6">
      <h2>Preview Pictures</h2>
      <div class="col-md-3" v-for="picture in pictures">
        <h4>{{ picture.name }}</h4>
        <img  :src="'/images/'+ picture.value" class="img-responsive" alt="image" />
      </div>
    </div>
    <div class="col-md-6">
      <h2>Gallery Form</h2>
      <form method="POST" action="/blog" @submit.prevent="submitForm">
      <div class="row">
        <div class="form-group">
          <label for="image">Image</label>
        </div>
        <div class="row">
          <multiple-file-uploader postURL="http://127.0.0.1:8000/blog/image/multiple" successMessagePath="Files Upload Successfu" errorMessagePath="Error Occured"></multiple-file-uploader>
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
            console.log('Component gallery mounted.');
        },

        data() {
          return {
            pictures: [
              {name: 'ocean', value:'ocean.jpg'},
              {name: 'sky', value:'sky.jpg'},
            ],
            errors: {}
          };
        },

        methods : {

        },

    }
</script>
