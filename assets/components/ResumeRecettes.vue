<template>
  <div id="ResumeRecettes">
    <li class="liste_recette_accueil" v-for="(recette, index) in recettes" :key="index">
      <ResumeRecette :recette="recette"/>
    </li>
  </div>
</template>

<script>

import ResumeRecette from "./ResumeRecette";
export default {
  name: "ResumeRecettes",
  components: {
    ResumeRecette
  },
  props: {
    recettes: Array
  }
}
</script>

<style scoped>

</style>