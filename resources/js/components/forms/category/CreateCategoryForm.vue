<script setup lang="ts">
import {ref} from 'vue';

import {Dialog, DialogContent, DialogHeader, DialogTitle, DialogTrigger,} from '@/components/ui/dialog';

import {Button} from '@/components/ui/button';
import {Label} from '@/components/ui/label';

import {Form, usePage} from '@inertiajs/vue3';

import {store} from '@/routes/categories';

import InputError from '@/components/InputError.vue';
import {Input} from '@/components/ui/input';


defineProps({});

const user = usePage().props.auth.user;

const dialogOpen = ref(false);
</script>

<template>
  <Dialog v-model:open="dialogOpen">
    <DialogTrigger>
      <Button variant="secondary">Create category</Button>
    </DialogTrigger>
    <DialogContent>
      <DialogHeader>
        <DialogTitle>
          Create new category
        </DialogTitle>
      </DialogHeader>

      <Form :action="store()" class="flex flex-col gap-5" #default="{ errors }"
            @success="dialogOpen = false">
        <div class="flex flex-col gap-2">
          <Label for="name">Name</Label>
          <Input class="border rounded p-2" type="text" name="name" required/>
          <InputError :message="errors['name']"/>
        </div>
        <div class="flex flex-col gap-2">
          <Label for="color">Color</Label>
          <Input class="border rounded p-2" type="color" name="color" required/>
          <InputError :message="errors['color']"/>
        </div>
        <input type="hidden" name="user_id" :value="user.id"/>
        <div class="justify-end flex">
          <Button type="submit" variant="secondary">Save</Button>
        </div>
      </Form>
    </DialogContent>
  </Dialog>
</template>