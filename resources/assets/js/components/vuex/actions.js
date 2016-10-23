// An action will receive the store as the first argument.
// Since we are only interested in the dispatch (and optionally the state)
// we can pull those two parameters using the ES6 destructuring feature
export const setClientInOnboarding = ({ dispatch }, client) => {
  if (client.id > 0) {
    dispatch('SET_FIRST_CLIENT', client)
  }
};
export const setProjectInOnboarding = ({ dispatch }, project) => {
  if (project.id > 0) {
    dispatch('SET_FIRST_PROJECT', project)
  }
};
export const setBriefInOnboarding = ({ dispatch }, brief) => {
  if (brief.id > 0) {
    dispatch('SET_FIRST_BRIEF', brief)
  }
};