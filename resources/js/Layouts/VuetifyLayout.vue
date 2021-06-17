<template>
  <!-- <v-app id="inspire">
    <v-navigation-drawer v-model="drawer" app>
    </v-navigation-drawer>
    <v-app-bar app>
      <v-app-bar-nav-icon @click="drawer = !drawer"></v-app-bar-nav-icon>
      <v-toolbar-title>Application</v-toolbar-title>
    </v-app-bar>
    <v-main>
      <v-container fill-height fluid>
        <v-row no-gutters align="center" justify="center">
          <v-col>
            <slot></slot>
          </v-col>
        </v-row>
      </v-container>
    </v-main>
  </v-app> -->
  <v-app id="inspire">
    <v-navigation-drawer
      v-model="drawer"
      :clipped="$vuetify.breakpoint.lgAndUp"
      app
    >
      <v-list dense nav>
        <v-list-item-group v-model="selectedMenu">
          <v-list-item>
            <v-list-item-icon>
              <v-icon>mdi-home</v-icon>
            </v-list-item-icon>
            <v-list-item-content>
              <v-list-item-title>Home</v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </v-list-item-group>
        <template v-for="item in items">
          <v-row v-if="item.heading" :key="item.heading" align="center">
            <v-col cols="6">
              <v-subheader v-if="item.heading">
                {{ item.heading }}
              </v-subheader>
            </v-col>
            <v-col cols="6" class="text-center">
              <a href="#!" class="body-2 black--text">EDIT</a>
            </v-col>
          </v-row>
          <v-list-group
            v-else-if="item.children"
            :key="item.text"
            v-model="item.model"
            :prepend-icon="item.model ? item.icon : item['icon-alt']"
            append-icon=""
          >
            <template v-slot:activator>
              <v-list-item-content>
                <v-list-item-title>
                  {{ item.text }}
                </v-list-item-title>
              </v-list-item-content>
            </template>
            <v-list-item v-for="(child, i) in item.children" :key="i" link>
              <v-list-item-action v-if="child.icon">
                <v-icon>{{ child.icon }}</v-icon>
              </v-list-item-action>
              <v-list-item-content>
                <v-list-item-title>
                  {{ child.text }}
                </v-list-item-title>
              </v-list-item-content>
            </v-list-item>
          </v-list-group>
          <v-list-item v-else :key="item.text" link>
            <v-list-item-action>
              <v-icon>{{ item.icon }}</v-icon>
            </v-list-item-action>
            <v-list-item-content>
              <v-list-item-title>
                {{ item.text }}
              </v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </template>
      </v-list>
    </v-navigation-drawer>

    <v-app-bar
      :clipped-left="$vuetify.breakpoint.lgAndUp"
      app
      color="blue darken-3"
      dark
      dense
    >
      <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
      <v-toolbar-title style="width: 300px" class="ml-0 pl-4">
        <span class="hidden-sm-and-down">Google</span>
      </v-toolbar-title>
      <v-text-field
        flat
        solo-inverted
        hide-details
        prepend-inner-icon="mdi-magnify"
        label="Search"
        class="hidden-sm-and-down"
      ></v-text-field>
      <v-spacer></v-spacer>
      <v-btn icon>
        <v-icon>mdi-bell</v-icon>
      </v-btn>
      <v-menu left bottom>
        <template v-slot:activator="{ on, attrs }">
          <v-btn icon v-bind="attrs" v-on="on">
            <v-icon>mdi-dots-vertical</v-icon>
          </v-btn>
        </template>
        <v-list>
          <v-list-item v-for="n in 5" :key="n" @click="() => {}">
            <v-list-item-title>Option {{ n }}</v-list-item-title>
          </v-list-item>
        </v-list>
      </v-menu>
    </v-app-bar>
    <v-main>
      <v-container fill-height fluid>
        <v-row no-gutters align="center" justify="center">
          <v-col>
            <upload-file-layout/>
            <!-- <v-navigation-drawer
              app
              clipped
              right
              v-model="$store.state.FileDrawerNav"
              temporary
              v-bind:width="500"
            >
            <upload-file-layout>

            </upload-file-layout>
              <template v-slot:append>
                <div class="pa-2">
                  <v-btn
                    color="primary"
                    block
                    @click.stop="$inertia.get('/card');
                      $store.state.FileDrawerNav = !$store.state.FileDrawerNav
                    "
                  >
                    Close
                  </v-btn>
                </div>
              </template>
            </v-navigation-drawer> -->
            <slot></slot>
          </v-col>
        </v-row>
      </v-container>
    </v-main>
    <v-btn bottom color="pink" dark fab fixed right>
      <v-icon>mdi-plus</v-icon>
    </v-btn>
  </v-app>
</template>

<script>
import UploadFileLayout from "@/Layouts/UploadFileLayout";
export default {
  components: { UploadFileLayout },
  data: () => ({
    dialog: false,
    drawer: false,
    selectedMenu: null,
    items: [
      { icon: "mdi-apps", text: "Apps" },
      { heading: "heading" },
      { icon: "mdi-history", text: "Frequently contacted" },
      {
        icon: "mdi-chevron-up",
        "icon-alt": "mdi-chevron-down",
        text: "Labels",
        model: true,
        children: [{ icon: "mdi-plus", text: "Create label" }],
      },
      {
        icon: "mdi-chevron-up",
        "icon-alt": "mdi-chevron-down",
        text: "More",
        model: false,
        children: [
          { text: "Import" },
          { text: "Export" },
          { text: "Print" },
          { text: "Undo changes" },
          { text: "Other contacts" },
        ],
      },
    ],
  }),
  created() {},
  methods: {},
};
</script>