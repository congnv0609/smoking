<template>
  <div>
    <CRow>
      <CCol sm="6">
        <CCard>
          <CCardHeader> <strong>Update</strong></CCardHeader>
          <CForm novalidate>
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
              <CInput label="Start Date" type="date" v-model="form.startdate" horizontal />
              <!-- <div role="group" class="form-group form-row">
                <label class="col-form-label col-sm-3"> Start Date </label>
                <div class="col-sm-9" data-provide="datepicker">
                  <input
                    type="datepicker"
                    class="form-control datepicker"
                    data-date-format="yyyy-mm-dd"
                    v-model="form.startDate"
                  />
                </div>
              </div> -->
              <CInput
                label="Start Time"
                type="time"
                v-model="form.startTime"
                horizontal
              />
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
import { get } from "../../helpers/smoker";
import moment from "moment";
export default {
  data() {
    return {
      query: {
        id: undefined,
      },
      form: {
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
          this.form.account = res.account;
          this.form.term = res.term;
          this.form.startDate = moment(res.startDate).format("DD-MM-YYYY");
          this.form.startTime = moment(res.startDate).format("hh:mm");
          console.log(this.form);
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
};
</script>