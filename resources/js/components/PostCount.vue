<template>
  <div class="row">
    <div class="ml-3 my-auto">
      Popularity: {{ count }}
    </div>
    <div style="width: 25px;">
      <vue-star animate="animated heartBeat" color="#3490dc">
        <a @click="count++" slot="icon" class="fas fa-arrow-up" style="color: #3490dc"></a>
      </vue-star>
    </div>
    <div style="width: 25px;">
      <vue-star animate="animated heartBeat" color="#F05654">
        <a @click="count--" slot="icon" class="fas fa-arrow-down" style="color: #F05654"></a>
      </vue-star>
    </div>
  </div>
</template>

<script>
    export default {

        props: {
            'objectProp' : { 
                type : Object,
                default: null
            },
        },

        data: function() {
            return {
                count : 0, // 0 initially
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