<template>
  <main v-if="this.$store.state.singleEstimation" class="main-content">
    <h1 class="main-title">Résultat de l'estimation</h1>
    <p class="project-name">
      Estimations de temps pour le projet :
      {{ $store.state.singleEstimation.name }}
    </p>
    <table class="table-result">
      <thead>
        <tr>
          <th>Développements</th>
          <th>Temps</th>
        </tr>
      </thead>
      <tbody v-if="$store.state.singleEstimation.lenght != 0">
        <tr
          v-for="estimation in $store.state.singleEstimation.lines"
          :key="estimation.id"
        >
          <template v-if="estimation.type == 'general'">
            <td>{{ estimation.label }}</td>
            <td>{{ minutes_to_hours(estimation.time) }}h</td>
          </template>
        </tr>
        <tr class="project-infos">
          <td>Spécificités</td>
          <td>Temps supplémentaire</td>
        </tr>
        <tr
        v-for="estimation in $store.state.singleEstimation.lines"
          :key="estimation.id"
        >
          <template v-if="estimation.type == 'additional'">
            <td>{{ estimation.label }}</td>
            <td>{{ minutes_to_hours(estimation.time) }}h</td>
          </template>
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <td>Total</td>
          <td>
            {{ minutes_to_hours($store.state.singleEstimation.total_time) }}h
          </td>
        </tr>
      </tfoot>
    </table>
  </main>
</template>

<script>
export default {
  name: "EstimateView",
  methods: {
    minutes_to_hours($minutes) {
      return ($minutes / 60).toFixed(1)
    }
  },
  mounted() {
    this.$store.dispatch("getEstimatesListById", this.$route.params.id);
  },
};
</script>
