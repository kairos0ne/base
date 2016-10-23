// This getter is a function which just returns the count
// With ES6 you can also write it as:
// export const getCount = state => state.count

export function getClientFromOnboarding (state) {
  return state.onboarding.client;
}
export function getProjectFromOnboarding (state) {
  return state.onboarding.project;
}
export function getBriefFromOnboarding (state) {
  return state.onboarding.brief;
}
