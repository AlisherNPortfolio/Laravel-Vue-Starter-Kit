<template>
    <router-view />
    <q-inner-loading :showing="visible">
        <q-spinner-gears size="50px" color="primary" />
      </q-inner-loading>
</template>
<script setup lang="ts">
import { computed, ComputedRef } from "vue";
import store from '../store';

let visible: ComputedRef<boolean> = computed(() => store.state.isLoading);
</script>
