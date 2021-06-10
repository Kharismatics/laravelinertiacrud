<template>
  <v-app id="inspire">
    <!-- Page Content -->
    <v-main>
      <v-container fill-height fluid>
        <v-row no-gutters align="center" justify="center">
          <v-col>
            <slot></slot>
          </v-col>
        </v-row>
      </v-container>
    </v-main>
    <!-- Page Content -->
  </v-app>
</template>

<script>
export default {
  components: {
  },
  data: () => ({
  }),
  created() {
  },
  methods: {
  },
};
</script>