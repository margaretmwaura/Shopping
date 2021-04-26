import Vue from 'vue';
import Vuex from 'vuex';
Vue.use(Vuex);

const state = {
    show: true,
    reveal: false,
};

const getters = {
    show: state => state.show,
    reveal: state => state.reveal,
};

const mutations = {
    SET_APPLICATION_THEME(state){
        if (state.show === true) {
            state.show = false;
            state.reveal = true;
        } else {
            state.show = true;
            state.reveal = false;
        }
    },
};

const actions = {

};

const store = new Vuex.Store({
    state,
    getters,
    mutations,
    actions,
});

export default store;
