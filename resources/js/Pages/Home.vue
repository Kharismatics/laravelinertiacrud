<template>
  <v-app id="inspire">
    <v-main>
      <v-container fill-height fluid>
        <v-row no-gutters align="center" justify="center">
          <v-col>
            <v-card class="mx-auto" color="#26c6da" dark max-width="1000">
              <v-card-title>
                <v-icon large left> mdi-alert-circle </v-icon>
                <span class="text-h6 font-weight-light">Simple CRUD</span>
                <v-spacer></v-spacer>
                <v-btn
                  color="green"
                  class="ma-2 white--text"
                  @click="$inertia.visit(route('card.index'))"
                >
                  Let's Checkout
                  <v-icon right dark>
                    mdi-arrow-right-drop-circle-outline
                  </v-icon>
                </v-btn>
              </v-card-title>
              <v-card-text class="text-h5"> "Welcome To Vuetify" </v-card-text>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
    </v-main>
  </v-app>
</template>

<script>
export default {
  data: () => ({}),
};
</script>