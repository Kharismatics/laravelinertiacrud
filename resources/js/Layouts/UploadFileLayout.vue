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
    <form @submit.prevent="submit">
      <input type="text" v-model="form.name" />
      <input type="file" @input="form.avatar = $event.target.files[0]" />
      <progress
        v-if="form.progress"
        :value="form.progress.percentage"
        max="100"
      >
        {{ form.progress.percentage }}%
      </progress>
      <button type="submit">Submit</button>
    </form>
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
            // $inertia.get('/card');
            $store.state.FileDrawerNav = !$store.state.FileDrawerNav
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
    },
    submit() {
      // console.log(this.$store.state.FileBucket.data);
      // this.form.post("/card/" + this.item.id + "/file")

      console.log("zzz");
      console.log(this.$store.state.FileBucket);
    },
  },
  props:["zzz"],
  data() {
    return {
      dialog: true,
      items: [
        { title: "Dashboard", icon: "mdi-view-dashboard" },
        { title: "Photos", icon: "mdi-image" },
        { title: "About", icon: "mdi-help-box" },
      ],
      right: null,
      form: this.$inertia.form({
        name: null,
        avatar: null,
      }),
    };
  },
  created() {
    console.log('formupload');
    console.log("this.$store.state.FileBucket");
    console.log(this.$store.state.FileBucket);
  },
};
</script>