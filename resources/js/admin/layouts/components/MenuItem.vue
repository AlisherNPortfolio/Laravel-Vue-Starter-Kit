<template>
    <q-item v-ripple clickable :to="props.item.link">
        <q-item-section avatar :class="{'items-end': props.isChild}">
            <q-icon :color="props.isChild ? 'grey' : ''" :name="props.item.icon" />
        </q-item-section>
        <q-item-section>
            <q-item-label>{{ props.item.text }}</q-item-label>
        </q-item-section>
    </q-item>
</template>
<script setup lang="ts">
import { PropType } from 'vue';
import { Menu } from '../../contracts/ui/IMenu'

const props = defineProps({
    item: {
        type: Object as PropType<Menu>
    },
    isChild: {
        type: Boolean,
        default: false
    }
})
</script>
