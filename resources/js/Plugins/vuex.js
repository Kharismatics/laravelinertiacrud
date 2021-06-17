import Vue from 'vue';
import Vuex from 'vuex';
Vue.use(Vuex)
const store = new Vuex.Store({
    state: {
        count: 0,
        FileDrawerNav: false,
        FileBucket: Array,
        DetailDrawerDialog: false
    },
    mutations: {
        increment(state) {
            state.count++
        },
        stateFileDrawerNav(state) {
            state.FileDrawerNav = !state.FileDrawerNav
            if (state.FileDrawerNav === false) {
                // state.FileBucket = null
            }
        },
        // stateFileBucket(state,{model,id,item}) {
        stateFileBucket(state,{model,id,item}) {
            console.log("ini mutasi");
            console.log(model);
            console.log(id);
            console.log(item);
            state.FileBucket = item ;
        },
        stateDetailDrawerDialog(state) {
            state.DetailDrawerDialog = !state.DetailDrawerDialog
        }
    }
})
export default store