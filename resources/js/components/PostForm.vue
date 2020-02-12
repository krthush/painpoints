<template>
  <div class="my-4">
    <a v-if="!showForm" v-on:click="showForm = true" href="#" class="float-right">{{ showFormText }}</a>
    <transition 
      name="slide"
    >
      <div v-if="showForm" class="form-group">
        <label for="exampleFormControlTextarea1">{{ labelFormText }}</label>
        <textarea class="form-control" placeholder="Enter text here..." rows="2"></textarea>
        <div class="mt-2 float-right">
          <button v-on:click="showForm = false" type="button" class="btn btn-outline-secondary">Cancel</button>
          <button type="button" class="btn btn-outline-primary">Add Post</button>  
        </div>
      </div>
    </transition>   
  </div>
</template>



<script>
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
        },

        data: function() {
            return {
                showForm : false, // false initially
                count : 0
            }
        },

        created () {

        },

      
        mounted() {
            console.log('Component mounted.')
        },

        methods: {

            sampleMethod : function () {

            },

        },

        computed: {

            sampleComputedData : function () {

                var sampleComputedData = null;

                return sampleComputedData;
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