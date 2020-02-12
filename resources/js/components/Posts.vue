<template>
  <div class="posts">
    <div :style="indent">{{ label }}</div>
    <posts 
      v-for="node in nodes" 
      :nodes="node.nodes" 
      :label="node.label"
      :depth="depth + 1"
    >
    </posts>
  </div>
</template>
<script>

  export default { 
    props: [ 'label', 'nodes', 'depth' ],
    computed: {
      indent() {
        return { transform: `translate(${this.depth * 50}px)` }
      }
    }
  }
  
</script>