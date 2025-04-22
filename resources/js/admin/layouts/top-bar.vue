<template>
    <div class="layout-topbar flex justify-content-between align-items-center px-4">
      <div class="flex align-items-center">
        <Button icon="pi pi-bars" severity="secondary" text rounded @click="$emit('toggle-sidebar')" />
        <span class="text-xl font-bold ml-3">Admin Dashboard</span>
      </div>
      <div class="flex align-items-center">
        <Button icon="pi pi-bell" severity="secondary" text rounded class="mr-2" />
        <Button icon="pi pi-user" severity="secondary" text rounded />
      </div>
    </div>
  </template>

  <script setup>
  const emit = defineEmits(['toggle-sidebar']);
  </script>

  <style scoped>
  .layout-topbar {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 64px;
    z-index: 999;
    background-color: #ffffff;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }
  </style>
