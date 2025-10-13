<script setup lang="ts">
import {ref} from 'vue';

import {
  Dialog,
  DialogContent,
  DialogDescription,
  DialogHeader,
  DialogTitle,
  DialogTrigger,
} from '@/components/ui/dialog';

import {Button} from '@/components/ui/button';

import {Form} from '@inertiajs/vue3';

import {update} from '@/routes/accounts';
import InputError from '@/components/InputError.vue';
import {Input} from '@/components/ui/input';
import {Label} from '@/components/ui/label';

import {Select, SelectContent, SelectItem, SelectTrigger, SelectValue,} from '@/components/ui/select'

defineProps({
  currentAccount: {
    type: Object,
    required: true
  },
  currencyOptions: Object
});

const dialogOpen = ref(false);

</script>

<template>
  <Dialog v-model:open="dialogOpen">
    <DialogTrigger>
      <Button variant="secondary">Edit</Button>
    </DialogTrigger>
    <DialogContent>
      <DialogHeader>
        <DialogTitle>
          Edit Account
        </DialogTitle>
        <DialogDescription>
          Use the form to create a new account
        </DialogDescription>
      </DialogHeader>

      <Form :action="update(currentAccount.id)" class="flex flex-col gap-5" #default="{ errors }"
            @success="dialogOpen = false">
        <div class="flex flex-col gap-2">
          <Label for="account_name">Account Name</Label>
          <Input
              class="border rounded p-2"
              type="text"
              name="account_name"
              :model-value="currentAccount.account_name"
              required/>
          <InputError :message="errors['account_name']"/>
        </div>
        <div class="flex flex-col gap-2">
          <Label for="account_number">Account Number</Label>
          <Input
              class="border rounded p-2"
              type="text"
              name="account_number"
              :model-value="currentAccount.account_number"
              required/>
          <InputError :message="errors['account_number']"/>
        </div>
        <div class="flex flex-col gap-2">
          <Label for="currency">Currency</Label>
          <Select name="currency" :multiple="false" v-model="currentAccount.currency">
            <SelectTrigger>
              <SelectValue>{{ currentAccount.currency }}</SelectValue>
            </SelectTrigger>
            <SelectContent>
              <SelectItem v-for="currency in currencyOptions" :key="currency.name" :value="currency.name">
                {{ currency.name }}
              </SelectItem>
            </SelectContent>
          </Select>
          <InputError :message="errors['currency']"/>
        </div>
        <div class="justify-end flex">
          <Button type="submit" variant="secondary">Save</Button>
        </div>
      </Form>
    </DialogContent>
  </Dialog>
</template>