<template>
  <main class="main-content">
    <h1 class="main-title">Dernières estimations</h1>
    <ul class="estimation-list">
      <li v-for="estimate in $store.state.estimatesList" :key="estimate.id">
        <router-link :to="`/estimation/${estimate.id}`" class="estimation-card">
          <span class="project-name">{{ estimate.name }}</span>
          <span class="project-time">{{ minutes_to_hours(estimate.total_time) }}h</span>
        </router-link>
      </li>
    </ul>
  </main>
</template>

<script>

export default {
  name: "EstimateListView",
  created() {
    this.$store.dispatch("getEstimatesList");
  },
  methods: {
    minutes_to_hours($minutes) {
      return ($minutes / 60).toFixed(1)
    }
  },
  computed: {
  },


}

</script>