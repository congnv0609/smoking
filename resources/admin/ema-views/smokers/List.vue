<template>
  <div>
    <CRow>
      <CCol sm="12">
        <CTableWrapper :items="items" :fields="fields">
          <template #header>
            <CIcon name="cil-grid" /> Smokers
            <div class="card-header-actions">
              <a
                href="https://coreui.io/vue/docs/components/nav"
                class="card-header-action"
                rel="noreferrer noopener"
                target="_blank"
              >
                <small class="text-muted">Export</small>
              </a>
            </div>
          </template>
        </CTableWrapper>
      </CCol>
    </CRow>
    <CRow>
      <CCol sm="12">
        <CPagination
          :active-page.sync="query.page"
          :pages="last_page"
        />
      </CCol>
    </CRow>
  </div>
</template>
<script>
import CTableWrapper from "../customization/Table.vue";
import { smokers } from "../../helpers/smoker";
export default {
  name: "Smokers",
  components: { CTableWrapper },
  data() {
    return {
      last_page: 1,
      query: {
        page: 1,
        size: 20,
      },
      fields: ["id", "account", "term", "startDate", "endDate"],
      items: [],
    };
  },
  mounted() {
    this.getList();
  },
  watch: {
    'query.page': function(val, oldVal){
      return this.getList();
    }
  },
  methods: {
    getList() {
      smokers(this.query)
        .then((res) => {
          this.items = res.data;
          this.last_page = res.last_page;
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
};
</script>