<template>
  <section id="home" class="parallaxHome">
      <div class="container-fluid ">
          <div class="row">
            <div class="col-md-6">
               <h1>Blogs</h1>
               <ul>
                 <li v-for="blog in blogs">
                   <a href="#" :blog_id="blog.id" v-on:click="getBlogShow">
                     {{ blog.title }}
                   </a>
                 </li>
               </ul>
            </div>
            <div class="col-md-6">
              <h2>{{blogShow.title}}</h2>
              <p>
                  {{blogShow.body}}
              </p>
              <img :src="'/images/'+ blogShow.image" class="img-responsive col-md-10" alt="image" />
            </div>
          </div>
      </div>
  </section>
</template>

<script>
    export default {
        mounted() {
            console.log('Component home mounted.')
            axios.get('/blog').then(
              response => {
                this.blogs = response.data.blogs;
                this.blogShow = response.data.blogs[0];
              }
            );

        },

        data() {
          return {
            blogs: [],
            blogShow: {}
          };
        },

        methods : {

          getBlogShow: function(e) {
            const vm = this;
            var element = e.target;
            var id = element.getAttribute('blog_id');
            axios.get('/blog/'+id).then(response => vm.blogShow = response.data.blog);
          }
        },
    }
</script>
