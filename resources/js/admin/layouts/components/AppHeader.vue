<template>
    <q-header elevated class="bg-white text-grey-8 q-py-xs" height-hint="58">
        <q-toolbar>
          <q-btn
            flat
            dense
            round
            @click="toggleLeftDrawer"
            aria-label="Menu"
            icon="menu"
          />

          <q-btn flat no-caps no-wrap class="q-ml-xs" v-if="$q.screen.gt.xs">
            <q-icon name="fas fa-shopping-cart" color="green" size="20px" />
            <q-toolbar-title shrink class="text-weight-bold">
              Starter Kit
            </q-toolbar-title>
          </q-btn>

          <q-space />


          <div class="q-gutter-sm row items-center no-wrap">
            <q-btn round dense flat color="grey-8" icon="message" v-if="$q.screen.gt.sm">
              <q-tooltip>Messages</q-tooltip>
            </q-btn>
            <q-btn round dense flat color="grey-8" icon="notifications">
              <q-badge color="red" text-color="white" floating>
                2
              </q-badge>
              <q-tooltip>Notifications</q-tooltip>
            </q-btn>
            <q-btn round flat>
              <q-avatar size="26px">
                <q-icon name="fas fa-user" />
              </q-avatar>
              <q-tooltip>Account</q-tooltip>
            </q-btn>
          </div>
        </q-toolbar>
      </q-header>
</template>
<script setup lang="ts">
import {ref, Ref } from 'vue';

let drawerHandle: Ref<boolean> = ref(true)

const props = defineProps({
    drawerOpen: Boolean
});

const emit = defineEmits<{
    (e: 'open', drawerValue: boolean ): void
}>();
function toggleLeftDrawer () {
    emit('open', !drawerHandle.value);
}
</script>
