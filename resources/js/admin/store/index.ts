import { createStore } from 'vuex'

export default createStore({
  state: {
    isLoading: false,
  },
  getters: {

  },
  mutations: {
    setLoadingStatus(state, status = false) {
        state.isLoading = status
    }
  },
  actions: {
  },
  modules: {
  }
})
