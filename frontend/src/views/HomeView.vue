<template>
  <main v-if="estimateField" class="main-content">

    <h1 class="main-title">Calculator</h1>
    <form method="post" class="estimator-form">
      <div class="errors" v-if="FormData.errors.length">
        <ul>
          <li v-for="error in FormData.errors" :key="error.key">{{ error }}</li>
        </ul>
      </div>

      <div v-for="field in estimateField" :key="field.id" class="input-group">
        <div v-if="field.type === 'text'">
          <label class="main-label" :htmlFor="field.slug">{{ field.name }}</label>
          <input v-model="FormData.name" type="text" :id="field.slug" :placeholder="field.name" />
        </div>

        <div v-if="field.type === 'select'">
          <span class="main-label">{{ field.name }}</span>

          <template v-if="field.slug === 'projectType'">
            <select v-model="FormData.projectType">
              <option value="">Choisir un type de projet</option>
              <option v-for="preset in field.preset_values" :key="preset.id" :value="preset.startup_time">{{
                preset.label
              }}</option>
            </select>
          </template>
          <template v-if="field.slug === 'designType'">
            <select v-model="FormData.designType">
              <option value="">Choisir un type de design</option>
              <option v-for="preset in field.preset_values" :key="preset.id" :value="preset.total_percentage">{{
                preset.label
              }}</option>
            </select>
          </template>


        </div>
        <div v-if="field.type === 'checkboxes'">
          <span class="main-label">{{ field.name }}</span>

          <div v-for="preset in field.preset_values" :key="preset.id" class="checkbox-group">
            <input v-model="FormData.generic_templates" multiple type="checkbox" :id="preset.value"
              :value="preset.time" />
            <label :htmlFor="preset.value">{{ preset.label }}</label>
          </div>
        </div>

        <div v-if="field.type === 'multi'">
          <span class="main-label">{{ field.name }}</span>

          <div class="specific-template-list" id="specificTemplateList"></div>

          <button @click="showDev = !showDev" class="button button-icon" type="button" id="addSpecificTemplate">
            <svg v-if="!showDev" xmlns="http://www.w3.org/2000/svg" width="52" height="52" fill="currentColor"
              class="bi bi-plus" viewBox="0 0 16 16">
              <path
                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
            </svg>
            <svg v-if="showDev" xmlns="http://www.w3.org/2000/svg" width="24" height="15" fill="currentColor"
              viewBox="0 0 24 24">
              <path d="M0 10h24v4h-24z" />
            </svg>

          </button>
          <div v-if="showDev">
            <form method="post">
              <div class="input-group">
                <label class="main-label" :htmlFor="field.slug">Nom du développement</label>
                <input type="text" id="specDevName" placeholder="Développement" />
              </div>
              <div class="input-group">
                <label class="main-label" :htmlFor="field.slug">Temps estimé</label>
                <input type="text" id="specDevName" placeholder="Temps en minutes" />
              </div>
              <button @click.prevent="submitSpecDev" class="button">Ajouter</button>
            </form>
          </div>

        </div>
      </div>
      <button @click.prevent="submitForm" class="button">Obtenir l'estimation</button>
    </form>
  </main>
</template>

<script>
export default {
  name: "EstimateFieldsView",
  data() {
    return {
      FormData: {
        name: '',
        projectType: '',
        generic_templates: [],
        designType: '',
        errors: [],
      },
      showDev: false
    };
  },
  methods: {
    submitForm() {
      this.FormData.errors = [];

      if (this.FormData.projectName == '') {
        this.FormData.errors.push("Le nom du projet est obligatoire.");
      }
      if (this.FormData.projectType == '') {
        this.FormData.errors.push("Le type du projet est obligatoire.");
      }
      if (this.FormData.generic_templates.length < 1) {
        this.FormData.errors.push("Veuillez choisir minimum 1 développement.");
      }
      if (this.FormData.designType === null) {
        this.FormData.errors.push("Le design du projet est obligatoire.");
      }

      if (this.FormData.errors.length === 0) {
        this.$store.dispatch("createEstimation", this.FormData);
      }
    },

    submitSpecDev(){
      //Do the method to create some specifics devs
    }
  },

  computed: {
    estimateField() {
      return this.$store.state.estimateFields;
    },
  },

  mounted() {
    this.$store.dispatch("getEstimatesFields");
  },
};
</script>