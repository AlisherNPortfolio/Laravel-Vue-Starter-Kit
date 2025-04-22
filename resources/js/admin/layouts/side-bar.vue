<template>
    <div :class="['layout-sidebar surface-card shadow-2', { 'layout-sidebar-active': visible }]">
      <div class="sidebar-header p-3 flex align-items-center justify-content-center">
        <img src="https://www.primefaces.org/wp-content/uploads/2021/08/logo-white.svg" alt="Logo" height="40" />
      </div>
      <div class="sidebar-menu p-3">
        <MenuList :model="menuItems" />
      </div>
    </div>
  </template>

  <script setup>
  import { ref } from 'vue';
  import MenuList from 'primevue/menu';

  const props = defineProps({
    visible: {
      type: Boolean,
      default: true
    }
  });

  const menuItems = ref([
    {
      label: 'Dashboard',
      icon: 'pi pi-home',
      url: '/'
    },
    {
      label: 'Analytics',
      icon: 'pi pi-chart-bar',
      url: '/analytics'
    },
    {
      label: 'User Management',
      icon: 'pi pi-users',
      items: [
        {
          label: 'Users',
          icon: 'pi pi-user',
          url: '/users'
        },
        {
          label: 'Roles',
          icon: 'pi pi-id-card',
          url: '/roles'
        }
      ]
    },
    {
      label: 'Reports',
      icon: 'pi pi-file',
      url: '/reports'
    },
    {
      label: 'Settings',
      icon: 'pi pi-cog',
      url: '/settings'
    }
  ]);
  </script>

  <style scoped>
  .layout-sidebar {
    position: fixed;
    left: 0;
    top: 0;
    width: 250px;
    height: 100%;
    padding-top: 64px;
    z-index: 998;
    transition: transform 0.3s;
    overflow-y: auto;
  }

  .layout-sidebar:not(.layout-sidebar-active) {
    transform: translateX(-100%);
  }

  .sidebar-header {
    height: 60px;
    border-bottom: 1px solid var(--surface-border);
  }

  .sidebar-menu {
    padding-bottom: 80px;
  }
  </style>
