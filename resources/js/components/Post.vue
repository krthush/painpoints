<template>
  <div class="w-100">
    <div :style="indent">
      <section class="px-2 py-2" style="background-color:#f6f6f6;">
        <p style="white-space: pre-line; overflow: hidden;">{{ content }}</p>
        <div class="row">
          <div v-if="!showForm" class="ml-3 my-auto">
            Popularity: {{ postPopularity }}
          </div>
          <div v-if="!showForm" style="width: 30px;">
            <vue-star animate="animated heartBeat" color="#F05654">
              <a @click="incrementPopularity()" slot="icon" class="fas fa-heart" style="color: #F05654"></a>
            </vue-star>
          </div>
          <div v-if="!showForm" style="width: 30px;">
            <vue-star animate="animated swing" color="#3490DC">
              <a @click="decrementPopularity()" slot="icon" class="fas fa-heart-broken" style="color: #3490dc"></a>
            </vue-star>
          </div>
          <div class="mx-4 my-auto">
            <small><i>{{ created_at }}</i></small>
          </div>
          <button v-if="!showForm" v-on:click="showForm = true" href="#" class="link-button float-right ml-auto mr-3">{{ showFormText }}</button>
          <transition 
            name="slide"
          >
            <div v-if="showForm" class="w-100 mx-4 form-group">
              <label for="exampleFormControlTextarea1">{{ labelFormText }}</label>
              <textarea class="form-control autoExpand" placeholder="Enter text here..." rows="2" v-model="formContent"></textarea>
              <div class="mt-2 float-right">
                <button v-on:click="hideForm()" type="button" class="btn btn-outline-secondary">Cancel</button>
                <button v-on:click="submitForm()" type="button" class="btn btn-outline-primary">{{ submitFormText }}</button>
              </div>
            </div>
          </transition>
        </div>        
      </section>
      <hr>
    </div>
    <post 
      v-for="child in postChildren" 
      :children="child.children" 
      :content="child.content"
      :created_at="child.created_at"
      :depth="depth + 1"
      :id="child.id"
      v-bind:popularity="child.popularity"
      v-on:update:popularity="updatePopularity(child, $event)"
      v-bind:key="child.id"
    >
    </post>
  </div>
</template>
<script>

  import _ from 'lodash';

  export default {


    props: {
        'content' : { 
            type : String,
        },
        'children' : { 
            type : Array,
        },
        'depth' : { 
            type : Number,
        },
        'id' : { 
            type : Number
        },
        'popularity' : { 
            type : Number
        },
        'created_at' : {
            type : String
        }
    },

    data: function() {
        return {
          formContent : '', // empty string initially
          showForm : false, // false initially
          showFormText : 'Add Comment',
          labelFormText : 'Add Comment',
          submitFormText : 'Add Comment',
          postChildren: this.children,
          postPopularity : this.popularity
        }
    },

    computed: {
      indent() {
        return { transform: `translate(${this.depth * 50}px)`, marginRight: `${this.depth * 50}px` }
      }
    },

    mounted() {
        _.orderBy(this.postChildren, 'popularity', 'desc');
    },

    methods: {

      hideForm : function () {

        this.showForm = false;
        this.formContent = '';

      },

      submitForm : function () {

        if (this.formContent) {

          axios({
            method: 'post',
            url: '/add-comment',
            data: {
              id: this.id,
              content: this.formContent,
            }
          })
          .then((response) => {
            if (response.data.success == true) {
              this.showForm = false;
              this.formContent = '';
            }
            this.postChildren.unshift(response.data.post);
            console.log(response);
          });

        } else {
          alert('Some content is required to create a post!');
        }

      },

      updatePopularity : function (child, popularity) {

        child.popularity = popularity;

        // TODO: Need to find a nice way of doing fluid reordering -> standard re-ordering leads to user accidental missclicks happening

        // _.debounce(function () {
        //   this.postChildren = _.orderBy(this.postChildren, 'popularity', 'desc');
        // }, 2000);

      },

      incrementPopularity : function () {

        this.postPopularity++;

        this.$emit('update:popularity', this.postPopularity);

        axios({
          method: 'post',
          url: '/update-popularity',
          data: {
            id: this.id,
            popularity: this.postPopularity,
          }
        })
        .then((response) => {
          if (response.data.success == true) {
            this.showForm = false;
          }
          console.log(response);
        });

      },

      decrementPopularity : function () {

        this.postPopularity--;

        this.$emit('update:popularity', this.postPopularity);

        axios({
          method: 'post',
          url: '/update-popularity',
          data: {
            id: this.id,
            popularity: this.postPopularity,
          }
        })
        .then((response) => {
          if (response.data.success == true) {
            this.showForm = false;
          }
          console.log(response);
        });

      },

    },

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
</style>