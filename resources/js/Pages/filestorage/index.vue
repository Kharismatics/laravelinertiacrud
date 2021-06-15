<template>
  
</template>

<script>
import VuetifyLayout from "@/Layouts/VuetifyLayout";
import FileLayout from "@/Layouts/FileLayout";

export default {
  layout: [VuetifyLayout, FileLayout],
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
