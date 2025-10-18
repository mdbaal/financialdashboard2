<script setup lang="ts">
import {Dialog, DialogContent, DialogHeader, DialogTitle,} from '@/components/ui/dialog';
import {Form} from '@inertiajs/vue3';
import '@vuepic/vue-datepicker/dist/main.css'
import {Button} from "@/components/ui/button";
import {Label} from "@/components/ui/label";
import {Input} from "@/components/ui/input";
import InputError from "@/components/InputError.vue";
import {update} from "@/routes/categories";

defineProps({
  viewedCategory: {
    type: Object,
    required: true
  }
});

const model = defineModel({type: Boolean, default: false});
</script>

<template>
  <Dialog v-model:open="model">
    <DialogContent>
      <DialogHeader>
        <DialogTitle>
          Edit category
        </DialogTitle>
      </DialogHeader>

      <Form :action="update(viewedCategory.id)" class="flex flex-col gap-5" #default="{ errors }"
            @success="model = false">
        <div class="flex flex-col gap-2">
          <Label for="name">Name</Label>
          <Input class="border rounded p-2" type="text" name="name" :model-value="viewedCategory.name" required/>
          <InputError :message="errors['name']"/>
        </div>
        <div class="flex flex-col gap-2">
          <Label for="color">Color</Label>
          <Input class="border rounded p-2" type="color" name="color" :model-value="viewedCategory.color" required/>
          <InputError :message="errors['color']"/>
        </div>
        <Input type="hidden" name="user_id" :model-value="viewedCategory.user_id"/>
        <div class="justify-between flex">
          <Button type="button" variant="secondary" @click="model=false ">Cancel</Button>
          <Button type="submit" variant="secondary">Save</Button>
        </div>
      </Form>
    </DialogContent>
  </Dialog>
</template>