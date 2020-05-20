import Vue from "vue"
import Vuex, { StoreOptions } from "vuex"
import { RootState, Profile } from "../types/store";
import axios from "axios"

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    profile: {}
  },

  actions: {
    async fetchProfile({ commit }) {
      return commit('setProfile', await axios.get('/api/me'))
    }
  },

  mutations: {
    setProfile(state: RootState, profile: Profile) {
      state.profile = profile
    }
  }
} as StoreOptions<RootState>)
