<template>
  <main id="index">
    <section class="presentation">
      <h2>Les recettes de Jean-bob</h2>
      <p>Bienvenue sur le site des recettes de Jean-bob !</p>
      <p>Jean-bob c'est un bon gars qui fait de la bonne cuisine !</p>
      <p>Sur ce site nous vous donnons les recettes de Jean-bob pour que vous puissiez les reproduires à la maison.</p>
      <p>Si vous le souhaitez et avez du temps libre vous pouvez aussi réserver une place dans un cours de cuisine.</p>
    </section>
    <section class="suggestion">
      <h2>Recettes qui peuvent vous plaire...</h2>
      <ul id="suggestion_list">
      <ResumeRecettes :recettes="recettes"/>
      </ul>
    </section>
  </main>
</template>

<script>

import ResumeRecettes from "../components/ResumeRecettes";
import Axios from 'axios';

export default {
  name: 'Home',
  components: {
    ResumeRecettes
  },
  data(){
    return {
      recettes : null
    }
  },
  mounted() {
    Axios.get('http://127.0.0.1:8000/api/recettes')
    .then(reponse=>{
      this.recettes=reponse.data
      this.recettes=this.recettes['hydra:member']
    })
  }
}
</script>
