<template>
  <div class="vue-query-builder" :class="{ 'vue-query-builder-styled': styled }">
    <query-builder-group
      :index="0"
      :query.sync="query"
      :ruleTypes="ruleTypes"
      :rules="mergedRules"
      :maxDepth="maxDepth"
      :depth="depth"
      :styled="styled"
      :labels="mergedLabels"
      type="query-builder-group"
      ></query-builder-group>
  </div>
</template>

<script>
//https://github.com/dabernathy89/vue-query-builder
import QueryBuilderGroup from './components/QueryBuilderGroup.vue';
import deepClone from './utilities.js';

var defaultLabels = {
  matchType: Vue.prototype.$t("Match Type"),
  matchTypes: [
    {"id": "all", "label": Vue.prototype.$t("All")},
    {"id": "any", "label": Vue.prototype.$t("Any")},
  ],
  addRule: Vue.prototype.$t("Add Rule"),
  removeRule: Vue.prototype.$t("&times;"),
  addGroup: Vue.prototype.$t("Add Group"),
  removeGroup: Vue.prototype.$t("&times;"),
  textInputPlaceholder: Vue.prototype.$t("value"),
};

export default {
  name: 'vue-query-builder',

  components: {
    QueryBuilderGroup
  },

  props: {
    rules: Array,
    labels: {
      type: Object,
      default () {
        return defaultLabels;
      }
    },
    styled: {
      type: Boolean,
      default: true
    },
    maxDepth: {
      type: Number,
      default: 3,
      validator: function (value) {
        return value >= 1
      }
    },
    value: Object
  },

  data () {
    return {
      depth: 1,
      query: {
        logicalOperator: this.labels.matchTypes[0].id,
        children: []
      },
      ruleTypes: {
        "text": {
          operators: [
            Vue.prototype.$t('equals'),
            Vue.prototype.$t('does not equal'),
            Vue.prototype.$t('contains'),
            Vue.prototype.$t('does not contain'),
            Vue.prototype.$t('smaller'),
            Vue.prototype.$t('bigger')
          ],
          inputType: "text",
          id: "text-field"
        },
        "numeric": {
          operators: ['=','<>','<','<=','>','>='],
          inputType: "number",
          id: "number-field"
        },
        "custom": {
          operators: [],
          inputType: "text",
          id: "custom-field"
        },
        "radio": {
          operators: [],
          choices: [],
          inputType: "radio",
          id: "radio-field"
        },
        "checkbox": {
          operators: [],
          choices: [],
          inputType: "checkbox",
          id: "checkbox-field"
        },
        "select": {
          operators: [],
          choices: [],
          inputType: "select",
          id: "select-field"
        },
        "multi-select": {
          operators: ['='],
          choices: [],
          inputType: "select",
          id: "multi-select-field"
        },
      }
    }
  },

  computed: {
    mergedLabels () {
      return Object.assign({}, defaultLabels, this.labels);
    },

    mergedRules () {
      var mergedRules = [];
      var vm = this;

      vm.rules.forEach(function(rule){
        if ( typeof vm.ruleTypes[rule.type] !== "undefined" ) {
          mergedRules.push( Object.assign({}, vm.ruleTypes[rule.type], rule) );
        } else {
          mergedRules.push( rule );
        }
      });

      return mergedRules;
    }
  },

  mounted () {
    this.$watch(
      'query',
      newQuery => {
        if (JSON.stringify(newQuery) !== JSON.stringify(this.value)) {
          this.$emit('input', deepClone(newQuery));
        }
      }, {
      deep: true
    });

    this.$watch(
      'value',
      newValue => {
        if (JSON.stringify(newValue) !== JSON.stringify(this.query)) {
          this.query = deepClone(newValue);
        }
      }, {
      deep: true
    });

    if ( typeof this.$options.propsData.value !== "undefined" ) {
      this.query = Object.assign(this.query, this.$options.propsData.value);
    }
  }
}
</script>

<style>
  .vue-query-builder-styled .vqb-group .rule-actions {
    margin-bottom: 20px;
  }

  .vue-query-builder-styled .vqb-rule {
    margin-top: 15px;
    margin-bottom: 15px;
    /*background-color: #f5f5f5;*/
    border-color: #ddd;
    padding: 15px;
  }

  .vue-query-builder-styled .vqb-rule label {
    margin-right: 10px;
  }

  .vue-query-builder-styled .vqb-group.depth-1 .vqb-rule,
  .vue-query-builder-styled .vqb-group.depth-2 {
    border-left: 2px solid #8bc34a;
  }

  .vue-query-builder-styled .vqb-group.depth-2 .vqb-rule,
  .vue-query-builder-styled .vqb-group.depth-3 {
    border-left: 2px solid #00bcd4;
  }

  .vue-query-builder-styled .vqb-group.depth-3 .vqb-rule,
  .vue-query-builder-styled .vqb-group.depth-4 {
    border-left: 2px solid #ff5722;
  }

  .vue-query-builder-styled .close {
    opacity: 1;
    color: rgb(150,150,150);
  }

  @media (min-width: 768px) {
    .vue-query-builder-styled .vqb-rule.form-inline .form-group {
      display: block;
    }
  }
</style>