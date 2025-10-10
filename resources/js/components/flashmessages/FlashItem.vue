<script setup lang="ts">

import {FlashItemProps} from "@/types";
import {computed, ref} from "vue";
import {usePage} from "@inertiajs/vue3";

const page = usePage();

const props = defineProps<FlashItemProps>();

const itemStyle = computed(() => {
  switch (props.type) {
    case 'success':
      return 'border-green-500/70 bg-green-500/10';
    case 'error':
      return 'border-red-500/70 bg-red-500/10';
    case 'warning':
      return 'border-yellow-500/70 bg-yellow-500/10';
    case 'info':
      return 'border-blue-500/70 bg-blue-500/10';
    default:
      return 'border-gray-500/70 bg-gray-500/10';
  }
});

const closed = ref(false);

if (props.duration >= 0) {
  setTimeout(() => {
    closed.value = true;
  }, props.duration);
}
</script>

<template>
  <div
      v-if="!closed"
      class="
        rounded
        shadow-xl
        p-2
        flex
        flex-row
        transition-all
        animate-slide-down-fade-in
        text-[#3b3b3b]
        border-2
        gap-2
      "
      :class="itemStyle"
  >
    <strong>{{ props.type[0].toUpperCase() + props.type.slice(1) }}:</strong>

    <p class="flex-3">{{ props.message }}</p>
    <button class="font-bold text-right cursor-pointer w-fit" @click="closed = true">X</button>
  </div>
</template>
