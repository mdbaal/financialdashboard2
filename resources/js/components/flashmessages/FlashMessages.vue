<script setup lang="ts">

import {usePage} from "@inertiajs/vue3";
import FlashItem from "@/components/flashmessages/FlashItem.vue";
import {computed} from "vue";

const page = usePage();

const success = computed(() => {
  return page.props.flash.success
});
const warning = computed(() => {
  return page.props.flash.warning
});
const error = computed(() => {
  return page.props.flash.error
});
const info = computed(() => {
  return page.props.flash.info
});

</script>

<template>
  <div class="flex flex-col gap-4 z-10 top-2 absolute w-1/3 self-center">
    <FlashItem v-if="success" :message="success.message" type="success" :duration="success.duration ?? 0"/>
    <FlashItem v-if="warning" :message="warning.message" type="warning" :duration="warning.duration ?? 0"/>
    <FlashItem v-if="error" :message="error.message" type="error" :duration="error.duration ?? 0"/>
    <FlashItem v-if="info" :message="info.message" type="info" :duration="info.duration ?? 0"/>
  </div>
</template>