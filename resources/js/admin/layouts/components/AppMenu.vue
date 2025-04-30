<template>
    <q-scroll-area class="fit">
        <q-list padding>
            <template v-for="menu in menuList">
                <q-expansion-item
                    v-if="menu.children"
                    :icon="menu.icon"
                    :label="menu.text"
                    :key="menu.text"
                >
                    <MenuItem v-for="child in menu.children" :key="child.text" :item="child" :is-child="true" />
                </q-expansion-item>
                <MenuItem v-else :key="menu.text" :item="menu" />
            </template>
            <q-separator class="q-my-md" />
            <slot />
        </q-list>
    </q-scroll-area>
</template>
<script setup lang="ts">

import { Menu } from '../../contracts/ui/IMenu';
import MenuItem from './MenuItem.vue'

const props = defineProps<{
    menuList: Menu[]
}>();
</script>
