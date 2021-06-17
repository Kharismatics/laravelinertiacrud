<template>
  
</template>

<script>
import VuetifyLayout from "@/Layouts/VuetifyLayout";
import SubDetailLayout from "@/Layouts/SubDetailLayout";

export default {
  layout: [VuetifyLayout, SubDetailLayout],
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
