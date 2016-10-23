import Vue from 'vue'
import Vuex from 'vuex'
import { SET_FIRST_CLIENT } from './mutation-types'
import { SET_FIRST_PROJECT } from './mutation-types'
import { SET_FIRST_BRIEF} from './mutation-types'

// Make vue aware of Vuex
Vue.use(Vuex)
Vue.config.debug = true

const debug = process.env.NODE_ENV !== 'production'


// Combine the initial state and the mutations to create a Vuex store.
// This store can be linked to our app.
export default new Vuex.Store({
  	state: {
		  onboarding:{
  				client:{},
  				project:{},
  				brief:{},
  			}, 
  	},
  	mutations: {
  		[SET_FIRST_CLIENT] (state, client) {
  			// Mutate the state 
  			state.onboarding.client = client
  		},
  		[SET_FIRST_PROJECT] (state, project) {
  			// Mutate the state 
  			state.onboarding.project = project 
  		},
      [SET_FIRST_BRIEF] (state, brief) {
        // Mutate the state 
        state.onboarding.brief = brief 
      }
  	}
})