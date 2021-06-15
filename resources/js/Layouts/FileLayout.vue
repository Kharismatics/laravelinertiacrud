<template>
  <v-row justify="center">
    <v-dialog
      v-model="dialog"
      fullscreen
      hide-overlay
      transition="dialog-bottom-transition"
    >
      <v-card>
        <v-toolbar dark color="primary">
          <v-btn icon dark @click="close">
            <v-icon>mdi-close</v-icon>
          </v-btn>
          <v-toolbar-title>Files</v-toolbar-title>
          <v-spacer></v-spacer>
          <!-- <v-toolbar-items>
            <v-btn dark text @click="dialog = false"> Save </v-btn>
          </v-toolbar-items> -->
        </v-toolbar>
        <slot />
      </v-card>
    </v-dialog>
  </v-row>
</template>
<script>
export default {
  methods: {
    close() {
      (this.dialog = false), this.$inertia.get("/card");
    },
  },
  data() {
    return {
      dialog: true,
    };
  },
};
</script>