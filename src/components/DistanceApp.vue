<template>
  <div class="row">
    <div class="large-6 medium-6 small-6 column text-center">
      <label for="lng">Podaj szerkość geograficzną punktu A:</label>
      <br />
      <input
        type="number"
        name="lata"
        id="lata"
        step="0.0000001"
        v-model="points.pointA.lat"
      />
      <br />
      <label for="lng">Podaj długość geograficzną punktu A:</label>
      <br />
      <input
        type="number"
        name="lnga"
        id="lnga"
        step="0.0000001"
        v-model="points.pointA.lng"
      />
    </div>
    <div class="large-6 medium-6 small-6 column text-center">
      <label for="lng">Podaj szerkość geograficzną punktu B:</label>
      <br />
      <input
        type="number"
        name="latb"
        id="latb"
        step="0.0000001"
        v-model="points.pointB.lat"
      />
      <br />
      <label for="lng">Podaj długość geograficzną punktu B:</label>
      <br />
      <input
        type="number"
        name="lngb"
        id="lngb"
        step="0.0000001"
        v-model="points.pointB.lng"
      />
    </div>
    <div class="large-12 medium-12 small-12 column text-center">
      <button @click="countDistance">Sprawdź odległość</button>
    </div>
    <div
      class="large-12 medium-12 small-12 column text-center"
      v-if="result != null"
    >
      <p>Odległość w metrach: {{ result }}</p>
      <p>Odległość w kilometrach: {{ result / 1000 }}</p>
    </div>
    <div class="large-12 medium-12 small-12 column text-center" v-if="err != 0">
      <p>Pojawił się błąd: {{ err }}</p>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      points: {
        pointA: {
          lng: 0,
          lat: 0
        },
        pointB: {
          lng: 0,
          lat: 0
        }
      },
      result: null,
      err: 0,
      title:
        'Obliczanie odległości pomiędzy dwoma punktami z podanych współrzędnych'
    };
  },
  methods: {
    countDistance() {
      fetch('http://localhost/distance-app/backend/countDistance.php', {
        method: 'POST',
        dataType: 'JSON',
        body: JSON.stringify(this.points)
      })
        .then(response => {
          return response.json();
        })
        .then(data => {
          if (!data.status_id) {
            this.result = data.distance_m;
          } else {
            this.err = data.status_id;
          }
        });
    }
  }
};
</script>

<style></style>
