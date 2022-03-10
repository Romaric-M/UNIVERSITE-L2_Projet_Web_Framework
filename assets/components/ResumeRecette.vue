<template>
  <div id="ResumeRecette">
    <h3>{{recette.nom}}</h3>
    <img :src="require('../images/'+recette.image)">
    <router-link :to="{name: 'VoirRecette', params: {id: recette.id}}">Voir la recette</router-link>
  </div>
</template>

<script>
export default {
  name: "ResumeRecette",
  props: {
    recette: Object
  }
}
</script>

<style scoped>

</style>