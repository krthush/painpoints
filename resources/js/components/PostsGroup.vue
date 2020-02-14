<template>
  
  <div class="row">

    <div class="col">

      <div class="pb-4 w-100">
        <button v-if="!showForm" v-on:click="showForm = true" href="#" class="link-button float-right">{{ showFormText }}</button>
        <transition 
          name="slide"
        >
          <div v-if="showForm" class="form-group">
            <label for="exampleFormControlTextarea1">{{ labelFormText }}</label>
            <textarea class="form-control autoExpand" placeholder="Enter text here..." rows="2" v-model="formContent"></textarea>
            <div class="mt-2 float-right">
              <button v-on:click="showForm = false" type="button" class="btn btn-outline-secondary">Cancel</button>
              <button v-on:click="submitForm()" type="button" class="btn btn-outline-primary">{{ submitFormText }}</button>
            </div>
          </div>
        </transition>   
      </div>

      <h3 v-if="postsType=='problem'" class="pb-3 mb-4" style="text-transform: capitalize;">
        Problems:
      </h3>
      <h3 v-else class="pb-3 mb-4" style="text-transform: capitalize;">
        Solutions/Ideas:
      </h3>

      <post
        v-for="post in posts"
        :content="post.content" 
        :children="post.children"
        :depth="0"
        :id="post.id"
        :popularity="post.popularity"
        v-bind:key="post.id"
      ></post>

    </div>

  </div>

</template>

<script>

  import axios from 'axios';

  export default {

      props: {
        'showFormText' : { 
          type : String,
          default: 'Add Post'
        },
        'labelFormText' : { 
          type : String,
          default: 'Add Post'
        },
        'submitFormText' : { 
          type : String,
          default: 'Add Post'
        },
        'defaultPosts' : { 
          type : Array
        },
        'postsType' : {
          type : String
        }
      },

      data: function() {
          return {
            formContent : '', // empty string initially
            showForm : false, // false initially
            posts : this.defaultPosts,
          }
      },

      methods: {

          submitForm : function () {

            if (this.formContent) {

              axios({
                method: 'post',
                url: '/create-post',
                data: {
                  type: this.postsType,
                  content: this.formContent
                }
              })
              .then((response) => {
                if (response.data.success == true) {
                  this.showForm = false;
                  this.formContent = '';
                }
                this.posts.unshift(response.data.post);
                console.log(response);
              });

            } else {
              alert('Some content is required to create a post!');
            }

          },

      },
    
  };
</script>

<style>
  .slide-enter-active {
     -moz-transition-duration: 0.3s;
     -webkit-transition-duration: 0.3s;
     -o-transition-duration: 0.3s;
     transition-duration: 0.3s;
     -moz-transition-timing-function: ease-in;
     -webkit-transition-timing-function: ease-in;
     -o-transition-timing-function: ease-in;
     transition-timing-function: ease-in;
  }

  .slide-leave-active {
     -moz-transition-duration: 0.3s;
     -webkit-transition-duration: 0.3s;
     -o-transition-duration: 0.3s;
     transition-duration: 0.3s;
     -moz-transition-timing-function: ease-out;
     -webkit-transition-timing-function: ease-out;
     -o-transition-timing-function: ease-out;
     transition-timing-function: ease-out;
  }

  .slide-enter-to, .slide-leave {
     max-height: 100px;
     overflow: hidden;
  }

  .slide-enter, .slide-leave-to {
     overflow: hidden;
     max-height: 0;
  }
</style>