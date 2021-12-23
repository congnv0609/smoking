<template>
  <div>
    <CRow>
      <CCol>
        <h3>2 Export Report</h3>
      </CCol>
    </CRow>
    <CRow>
      <CCol>
        <CButton color="info" @click="exportData">Export</CButton>
      </CCol>
    </CRow>
  </div>
</template>
<script>
import { exportData } from "../../helpers/smoker";
export default {
  name: "Users",
  data() {
    return {
      caption: "2 Export Report",
    };
  },
  mounted() {},
  watch: {},
  metaInfo() {
    return {
      title: "2 Export Report",
    };
  },
  methods: {
    exportData() {
      exportData();
    },
  },
};
</script>