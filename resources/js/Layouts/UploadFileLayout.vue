<template>
  <v-navigation-drawer
    app
    clipped
    right
    v-model="$store.state.FileDrawerNav"
    temporary
    v-bind:width="500"
  >
    <v-list-item>
      <v-list-item-content>
        <v-list-item-title class="text-h6"> Files </v-list-item-title>
        <v-list-item-subtitle> bucket </v-list-item-subtitle>
      </v-list-item-content>
    </v-list-item>
    <v-divider></v-divider>

    <v-container>
      <form ref="addImageForm" lazy-validation>
        <v-file-input
          ref="fileupload"
          v-model="singlefile"
          clearable
          chips
          label="File input w/ chips"
        ></v-file-input>
      </form>
      <v-btn @click="submit()">Submit</v-btn>
    </v-container>

    <v-divider></v-divider>
    <v-list dense nav>
      <v-list-item v-for="item in items" :key="item.title" link>
        <v-list-item-icon>
          <v-icon>{{ item.icon }}</v-icon>
        </v-list-item-icon>
        <v-list-item-content>
          <v-list-item-title>{{ item.title }}</v-list-item-title>
        </v-list-item-content>
      </v-list-item>
    </v-list>
    <template v-slot:append>
      <div class="pa-2">
        <v-btn
          color="primary"
          block
          @click.stop="
            close();
            $store.state.FileDrawerNav = !$store.state.FileDrawerNav;
          "
        >
          Close
        </v-btn>
      </div>
    </template>
  </v-navigation-drawer>
</template>
<script>
export default {
  methods: {
    close() {
      console.log("cloes");
      this.$refs.addImageForm.reset();
      // this.$refs.fileupload.value = null;
    },
    change() {},
    submit() {
      console.log(this.$refs.fileupload.value);
      // // console.log(this.$store.state.FileBucket);
      this.form.model = this.$store.state.FileBucket.model;
      this.form.model_id = this.$store.state.FileBucket.id;
      this.form.singlefile = this.singlefile;
      this.$inertia
        .form(this.form)
        .post("/card/" + this.$store.state.FileBucket.id + "/file", this.form, {
          forceFormData: true,
        });
    },
  },
  computed: {},
  props: [],
  data() {
    return {
      items: [
        { title: "Dashboard", icon: "mdi-view-dashboard" },
        { title: "Photos", icon: "mdi-image" },
        { title: "About", icon: "mdi-help-box" },
      ],
      right: null,
      singlefile: null,
      clearable: true,
      form: {},
    };
  },
  created() {
    // console.log("formupload");
    // console.log("this.$store.state.FileBucket");
    // console.log(this.$store.state.FileBucket);
  },
};
</script>