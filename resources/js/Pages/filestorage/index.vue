<template>
  <div>tes</div>
</template>

<script>
import VuetifyLayout from "@/Layouts/VuetifyLayout";
import UploadFileLayout from "@/Layouts/UploadFileLayout";

export default {
  layout: [VuetifyLayout, UploadFileLayout],
  methods: {
    close() {
      console.log("param");
      this.$inertia.get("/card");
    },
  },
  props: [ "pageTitle", "datatables", "model", ],
  data() {
    return {};
  },
  created() {
    console.log(this.model);
  },
};
</script>
