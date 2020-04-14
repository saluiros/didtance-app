<template>
  <div>
    <div class="row">
      <div class="large-12 medium-12 small-12 column text-center">
        <h1>Obliczanie odległości pomiędzy dwoma punktami z podanych współrzędnych</h1>
      </div>
    </div>
    <DistanceApp />
  </div>
</template>

<script>
import Distance from "./components/DistanceApp.vue";
export default {
  components: {
    DistanceApp: Distance
  }
};
</script>