<template>
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Vue Component</div>

                    <div class="card-body">
                        Vue is working on this site.
                    </div>
                </div>
            </div>
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
                object : null, // null initially
                boolean : false, // false initially
                string : '', // empty initially
                array : [], // empty initially
            }
        },

        computed: {

            sampleComputedData : function () {

                var sampleComputedData = null;

                return sampleComputedData;
            },

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
      
    };
</script>

<style>
    
</style>
