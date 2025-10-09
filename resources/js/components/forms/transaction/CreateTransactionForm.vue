<script setup lang="ts">
import { ref } from 'vue';

import {
    Dialog,
    DialogContent,
    DialogDescription,
    DialogHeader,
    DialogTitle,
    DialogTrigger,
} from '@/components/ui/dialog';

import { Button } from '@/components/ui/button';
import { Label } from '@/components/ui/label';

import { Form } from '@inertiajs/vue3';

import { store } from '@/routes/transactions';

import InputError from '@/components/InputError.vue';
import { Input } from '@/components/ui/input';

import VueDatePicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css'

defineProps({
   currentAccount: {
    type: Object,
    required: true,
   }
});

const dialogOpen = ref(false);

const calenderValue = ref<Date>((new Date()));
const calenderFormat = (date:Date) => {
  const day = date.getDate();
  const month = date.getMonth() + 1;
  const year = date.getFullYear();

  return `${day}/${month}/${year}`;
}

</script>

<template>
        <Dialog v-model:open="dialogOpen">
            <DialogTrigger>
                <Button variant="secondary">Create Transaction</Button>
            </DialogTrigger>
            <DialogContent>
                <DialogHeader>
                    <DialogTitle>
                        Create new transaction
                    </DialogTitle>
                    <DialogDescription>
                        Use the form to create a new transaction
                    </DialogDescription>
                </DialogHeader>

                <Form :action="store(currentAccount.id)" class="flex flex-col gap-5" #default="{ errors }" @success="dialogOpen = false">
                    <div class="flex flex-col gap-2">
                        <Label for="name">Name</Label>
                        <Input class="border rounded p-2" type="text" name="name" required/>
                        <InputError :message="errors['name']"/>
                    </div>
                    <div class="flex flex-col gap-2">
                        <Label for="description">Description (optional)</Label>
                        <textarea class="border rounded p-2"  type="text" name="description" maxlength="500"></textarea>
                        <InputError :message="errors['description']"/>
                    </div>
                    <div class="flex flex-col gap-2">
                        <Label for="amount">Amount</Label>
                        <Input class="border rounded p-2"  type="text" name="amount" required/>
                        <InputError :message="errors['amount']"/>
                    </div>
                    <div class="flex flex-col gap-2">
                        <Label for="custom_id">Custom Identifier</Label>
                        <Input class="border rounded p-2"  type="text" name="custom_id"/>
                        <InputError :message="errors['custom_id']"/>
                    </div>
                    <div class="flex flex-col gap-2">
                        <Label for="date">Date</Label>
                        <VueDatePicker v-model="calenderValue" :format="calenderFormat" name="date"></VueDatePicker>
                        <InputError :message="errors['date']"/>
                    </div>
                    <div class="justify-end flex"><Button type="submit" variant="secondary">Save</Button></div>
                </Form>
            </DialogContent>
        </Dialog>
</template>