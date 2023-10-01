<template>
  <r-heading level="2">
    <slot />
  </r-heading>
</template>

<script>
import { h } from 'vue';

export default {
  components: {
    RHeading: {
      props: {
        level: {
          type: Number,
          required: true,
        },
      },
      render() {
        return h(`h${this.level}`, this.$slots.default());
      },
    },
  },
};
</script>
