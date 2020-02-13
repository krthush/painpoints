<template>
  <div class="w-100">
    <div :style="indent">
      <section class="px-2 py-2" style="background-color:#f6f6f6;">
        <p>{{ content }}</p>
        <div class="row">
          <div v-if="!showForm" class="ml-3 my-auto">
            Popularity: {{ popularity }}
          </div>
          <div v-if="!showForm" style="width: 30px;">
            <vue-star animate="animated heartBeat" color="#F05654">
              <a @click="popularity++" slot="icon" class="fas fa-heart" style="color: #F05654"></a>
            </vue-star>
          </div>
          <div v-if="!showForm" style="width: 30px;">
            <vue-star animate="animated swing" color="#3490DC">
              <a @click="popularity--" slot="icon" class="fas fa-heart-broken" style="color: #3490dc"></a>
            </vue-star>
          </div>
          <button v-if="!showForm" v-on:click="showForm = true" href="#" class="link-button float-right ml-auto mr-3">{{ showFormText }}</button>
          <transition 
            name="slide"
          >
            <div v-if="showForm" class="w-100 mx-4 form-group">
              <label for="exampleFormControlTextarea1">{{ labelFormText }}</label>
              <textarea class="form-control" placeholder="Enter text here..." rows="2"></textarea>
              <div class="mt-2 float-right">
                <button v-on:click="showForm = false" type="button" class="btn btn-outline-secondary">Cancel</button>
                <button type="button" class="btn btn-outline-primary">{{ submitFormText }}</button>  
              </div>
            </div>
          </transition>
        </div>        
      </section>
      <hr>
    </div>
    <post 
      v-for="child in children" 
      :children="child.children" 
      :content="child.content"
      :depth="depth + 1"
    >
    </post>
  </div>
</template>
<script>

  export default {

    props: [ 'content', 'children', 'depth' ],

    data: function() {
        return {
          showForm : false, // false initially
          showFormText : 'Add Comment',
          labelFormText : 'Add Comment',
          submitFormText : 'Add Comment',
          popularity : 0
        }
    },

    computed: {
      indent() {
        return { transform: `translate(${this.depth * 50}px)`, marginRight: `${this.depth * 50}px` }
      }
    }

  }
  
</script>

<style>

  .VueStar {
      position: relative !important;
      width: 50px !important;
      height: 50px !important;
  }
  .VueStar__ground {
      position: relative !important;
      width: 50px !important;
      height: 50px !important;
  }
  .VueStar__decoration {
      top: -25px !important;
      left: -25px !important;         
  }

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