<template>
    <q-layout view="lHh Lpr lFf" class="bg-white">
      <app-header @open="handleDrawer($event)" :drawer-open="leftDrawerOpen"></app-header>

      <q-drawer
        v-model="leftDrawerOpen"
        show-if-above
        bordered
        class="bg-grey-2"
        :width="240"
      >
        <q-toolbar class="text-primary">
            <q-avatar>
                <img :src="'./storage/defaults/avatar.png'" alt="User Avatar" />
            </q-avatar>
            <q-toolbar-title>
                User
            </q-toolbar-title>
        </q-toolbar>
        <app-menu :menu-list="menuList">

        </app-menu>
      </q-drawer>

      <q-page-container>
        <router-view />
      </q-page-container>
    </q-layout>
</template>

<script setup lang="ts">
  import { ref } from "vue";

  import AppMenu from "./components/AppMenu.vue";
  import AppHeader from "./components/AppHeader.vue";
  import { Menu } from "../contracts/ui/IMenu";

  const leftDrawerOpen = ref(false);
  function handleDrawer() {
    leftDrawerOpen.value = !leftDrawerOpen.value;
  }

  const menuList: Menu[] = [
    { icon: "home", text: "Dashboard", link: '/' },
    { icon: "people", text: "Users", children: [
        { icon: "list", text: "Users list", link: '/users' },
        { icon: "admin_panel_settings", text: "Roles", link: '/roles' }
      ]
    }
  ];


</script>

  <style lang="scss">
  .YL {
    &__toolbar-input-container {
      min-width: 100px;
      width: 55%;
    }
    &__toolbar-input-btn {
      border-radius: 0;
      border-style: solid;
      border-width: 1px 1px 1px 0;
      border-color: rgba(0, 0, 0, 0.24);
      max-width: 60px;
      width: 100%;
    }
    &__drawer-footer-link {
      color: inherit;
      text-decoration: none;
      font-weight: 500;
      font-size: 0.75rem;
      &:hover {
        color: #000;
      }
    }
  }
  </style>
