<template>
  <article id="detail_recette">
    <h2>{{ uneRecette.nom }}</h2>
    <div class="bloc_detail_recette">
      <img :src="require('../images/'+uneRecette.image)">
      <div class="sousbloc_detail_recette">
        <strong>Pour {{ uneRecette.nb_personne }} Personnes</strong>
        <p>{{ uneRecette.ingredients }}</p>
        <p>{{ uneRecette['la_recette'] }}</p>
      </div>
    </div>
  </article>
</template>

<script>
import Axios from "axios";

export default {
  name: "VoirRecette",
  data() {
    return {
      recettes : null,
      uneRecette : null
    }
  },
  mounted() {
    Axios.get('http://127.0.0.1:8000/api/recettes')
        .then(reponse=>{
          this.recettes=reponse.data
          this.getID()
        })
  },
  methods: {
    getID() {
      for (let c in this.recettes['hydra:member']) {
        if (this.recettes['hydra:member'][c]['id']===this.$route.params.id){
          this.uneRecette = this.recettes['hydra:member'][c]
        }
      }
    }
  }
}
</script>

<style scoped>

</style>