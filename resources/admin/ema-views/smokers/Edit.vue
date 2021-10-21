<template>
  <div>
    <CRow>
      <CCol sm="6">
        <CCard>
          <CCardHeader> <strong>Update</strong></CCardHeader>
          <CForm novalidate @submit.prevent="submit">
            <CCardBody>
              <CInput
                label="Account"
                v-model="form.account"
                horizontal
                disabled
              />
              <CInput
                label="Term"
                type="number"
                v-model="form.term"
                horizontal
                disabled
              />
              <CInput
                label="Start Date"
                type="date"
                v-model="form.startDate"
                horizontal
              />
              <CInput
                label="Start Time"
                type="time"
                v-model="form.startTime"
                horizontal
              />
              <CAlert color="danger" closeButton :show.sync="alertError">
                Error!
              </CAlert>
              <CAlert color="success" closeButton :show.sync="alertSuccess">
                Success saved!
              </CAlert>
            </CCardBody>
            <CCardFooter>
              <CButton type="submit" size="sm" color="primary"
                ><CIcon name="cil-check-circle" /> Submit</CButton
              >
              <CButton type="reset" size="sm" color="danger"
                ><CIcon name="cil-ban" /> Reset</CButton
              >
            </CCardFooter>
          </CForm>
        </CCard>
      </CCol>
    </CRow>
  </div>
</template>
<script>
import { get, update } from "../../helpers/smoker";
import moment from "moment";
export default {
  data() {
    return {
      alertError: false,
      alertSuccess: false,
      query: {
        id: undefined,
      },
      form: {
        id: undefined,
        account: undefined,
        term: undefined,
        startDate: "",
        startTime: "",
      },
    };
  },
  mounted() {
    this.query.id = this.$route.params.id;
    this.detail();
  },
  created() {},
  methods: {
    detail() {
      get(this.query)
        .then((res) => {
          this.setData(res);
        })
        .catch((err) => {
          console.log(err);
        });
    },
    submit() {
      this.form.id = this.query.id;
      update(this.form)
        .then((res) => {
          this.alertSuccess = true;
          this.setData(res);
        })
        .catch((err) => {
          this.alertError = true;
          console.log(err);
        });
    },
    setData(res) {
      this.form.account = res.account;
      this.form.term = res.term;
      this.form.startDate = moment(res.startDate).format("YYYY-MM-DD");
      this.form.startTime = moment(res.startDate).format("hh:mm");
    },
  },
};
</script>