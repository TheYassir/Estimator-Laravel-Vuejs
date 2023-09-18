<template>
  <MainHeader />
  <router-view />
</template>

<script>
import MainHeader from './components/MainHeader.vue';

export default {
  components: {
    MainHeader
  }
};
</script>