import { createStore } from "vuex";
import axios from "axios";

export default createStore({
  state: {
    estimatesList: null,
    singleEstimation: null,
    estimateFields: null,
  },
  getters: {},
  mutations: {
    getEstimatesListMutation(state, estimatesData) {
      state.estimatesList = estimatesData;
    },

    getEstimation(state, estimateData) {
      state.singleEstimation = estimateData;
    },

    addEstimatesMutation(state, estimateData) {
      state.estimatesList = estimateData;
    },

    getEstimatesFieldsMutation(state, fields) {
      state.estimateFields = fields
    },
  },
  actions: {
    async getEstimatesList(context) {
      try {
        const response = await axios.get(
          "http://doublet-kevin-server.eddi.cloud/api/estimates"
        );

        context.commit("getEstimatesListMutation", response.data);
      } catch (err) {
        console.error(err);
      }
    },

    async getEstimatesListById(context, id) {
      let response = await axios.get(
        `http://doublet-kevin-server.eddi.cloud/api/estimates/${id}`
      );
      context.commit("getEstimation", response.data);
    },

    async getEstimatesFields(context) {
      try {
        const response = await axios.get(
          "http://doublet-kevin-server.eddi.cloud/api/estimatefields"
        );
        context.commit("getEstimatesFieldsMutation", response.data);
      } catch (err) {
        console.error(err);
      }
    },

    async createEstimation(context, data) {
      try {
        const response = await axios.post(
          "http://doublet-kevin-server.eddi.cloud/api/estimates", data
        )
        console.log(response);
      } catch (err) {
        console.error(err);
      }
    },

  },
  modules: {},
});
