<template>
  <main id="recette">
    <div class="menu_recette">
      <h2>Nos recettes</h2>
      <nav>
        <ul id="menu_type">
          <li class="smenu"><button @click="getTypeID(0)">Toutes les Recettes</button></li>
          <li class="smenu"><button @click="getTypeID(1)">Les Entrées</button></li>
          <li class="smenu"><button @click="getTypeID(2)">Les Plats</button></li>
          <li class="smenu"><button @click="getTypeID(3)">Les Desserts</button></li>
        </ul>
      </nav>
    </div>
    <section id="les_recettes">
      <ul class="liste_recette">
        <ResumeRecettes :recettes="afficheRecette"/>
      </ul>
    </section>
  </main>
</template>

<script>

import ResumeRecettes from "../components/ResumeRecettes";
import Axios from 'axios';

export default {
  name: 'Recettes',
  components: {
    ResumeRecettes
  },
  data(){
    return {
      recettes : null,
      afficheRecette : []
    }
  },
  mounted() {
    Axios.get('http://127.0.0.1:8000/api/recettes')
        .then(reponse=>{
          this.recettes=reponse.data
          this.afficheRecette = this.recettes['hydra:member']
        })
  },
  methods: {
    getTypeID(ID){
      this.afficheRecette = []
      console.log(ID)
      if (ID === 0) {
        this.afficheRecette = this.recettes['hydra:member']
        return null
      }
      let tab = []
      for (let o in this.recettes['hydra:member']){
        if (this.recettes['hydra:member'][o]['type']['id'] === ID){
          tab.push(this.recettes['hydra:member'][o])
        }
      }
      this.afficheRecette = tab
    }
  }
}
</script>

<style scoped>

</style>