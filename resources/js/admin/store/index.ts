import { reactive } from 'vue'
import { createStore } from 'vuex'

// export default createStore({
//   state: {
//     isLoading: false,
//   },
//   getters: {

//   },
//   mutations: {
//     setLoadingStatus(state, status = false) {
//         state.isLoading = status
//     }
//   },
//   actions: {
//   },
//   modules: {
//   }
// })

export default reactive({
    isLoading: false,
    setLoadingStatus(status = false) {
        this.isLoading = status
    }
});
