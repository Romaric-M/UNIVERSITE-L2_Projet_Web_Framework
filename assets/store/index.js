import Vue from 'vue'
import Vuex from 'vuex'
import Axios from 'axios'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    recette : null
  },
  mutations: {
    setData(state, data) {
      state.recette = data
    }
  },
  actions: {
    getData(context) {
      Axios().get('http://127.0.0.1:8000/api/recettes')
          .then(response => response.data )
          .then( donneesQuiz => {
            context.commit("setData", donneesQuiz)
          })
    }
  },
  modules: {
  }
})
