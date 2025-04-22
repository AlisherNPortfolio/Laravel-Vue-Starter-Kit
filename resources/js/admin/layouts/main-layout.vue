<template>
    <div class="layout-wrapper">
      <Topbar :toggleSidebar="toggleSidebar" />
      <Sidebar :visible="sidebarVisible" />
      <div :class="['layout-main', { 'layout-main-expanded': !sidebarVisible }]">
        <div class="p-4">
          <h1>Dashboard</h1>
          <div class="surface-card p-4 shadow-2 border-round">
            <div class="text-xl text-center mb-5">Welcome to your Admin Dashboard</div>
            <div class="p-4">
              <!-- Empty dashboard content -->
              <p>This is your empty dashboard page. Add your widgets and content here.</p>
            </div>
          </div>
        </div>
        <Footer />
      </div>
    </div>
</template>
<script>
import { ref } from 'vue';
import Topbar from './layouts/top-bar.vue';
import Sidebar from './layouts/side-bar.vue';
import Footer from './layouts/app-footer.vue';

export default {
  components: {
    Topbar,
    Sidebar,
    Footer
  },
  setup() {
    const sidebarVisible = ref(true);

    const toggleSidebar = () => {
      sidebarVisible.value = !sidebarVisible.value;
    };

    return {
      sidebarVisible,
      toggleSidebar
    };
  }
};
</script>
<style>
.layout-wrapper {
  min-height: 100vh;
  display: flex;
  flex-direction: column;
}

.layout-main {
  margin-left: 250px;
  min-height: calc(100vh - 112px);
  transition: margin-left 0.3s;
  padding-top: 64px;
  padding-bottom: 48px;
}

.layout-main-expanded {
  margin-left: 0;
}

</style>
