<script setup lang="ts">
import {
    Dialog,
    DialogContent,
    DialogHeader,
    DialogTitle,
} from '@/components/ui/dialog';

import { ref } from "vue";

import { Button } from '@/components/ui/button';
import { Form } from '@inertiajs/vue3';
import { update } from '@/routes/transactions';
import InputError from '@/components/InputError.vue';
import { Input } from '@/components/ui/input';
import  { Label } from '@/components/ui/label';

import VueDatePicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css'

const props = defineProps({
    currentAccount: {
        type: Object,
        required: true,
    },
    currentTransaction: {
        type: Object,
        required: true,
    },
});

const calenderValue = ref<Date>((new Date(props.currentTransaction.date)));

const model = defineModel({type: Boolean, default: false});

const calenderFormat = (date:Date) => {
  const day = date.getDate();
  const month = date.getMonth() + 1;
  const year = date.getFullYear();

  return `${day}/${month}/${year}`;
}

</script>

<template>
        <Dialog v-model:open="model">
            <DialogContent>
                <DialogHeader>
                    <DialogTitle>
                        {{ currentTransaction.name }}
                    </DialogTitle>
                </DialogHeader>
                <Form
                    :action="update({account:currentAccount.id, transaction:currentTransaction.id})"
                    class="flex flex-col gap-5"
                    #default="{ errors }"
                    @success="model = false"
                >
                     <div class="flex flex-col gap-2">
                        <Label for="name">Name</Label>
                        <Input
                            class="border rounded p-2"
                            type="text" name="name"
                            :model-value="currentTransaction.name"
                            required/>
                        <InputError :message="errors['name']"/>
                    </div>
                    <div class="flex flex-col gap-2">
                        <Label for="description">Description (optional)</Label>
                        <textarea 
                            class="border rounded p-2"
                            type="text"
                            name="description"
                            maxlength="500"
                            :model-value="currentTransaction.description"
                        >
                        </textarea>
                        <InputError :message="errors['description']"/>
                    </div>
                    <div class="flex flex-col gap-2">
                        <Label for="amount">Amount</Label>
                        <Input
                            class="border rounded p-2"
                            type="text"
                            name="amount"
                            :model-value="currentTransaction.amount"
                            required/>
                        <InputError :message="errors['amount']"/>
                    </div>
                    <div class="flex flex-col gap-2">
                        <Label for="custom_id">Custom Identifier</Label>
                        <Input
                            class="border rounded p-2"
                            type="text"
                            name="custom_id"
                            :model-value="currentTransaction.custom_id"
                            />
                        <InputError :message="errors['custom_id']"/>
                    </div>
                    <div class="flex flex-col gap-2">
                        <Label for="date">Date</Label>
                        <VueDatePicker v-model="calenderValue" :format="calenderFormat" name="date"></VueDatePicker>
                        <InputError :message="errors['date']"/>
                    </div>
                    <div class="flex justify-between">
                        <Button type="button" variant="secondary" @click="model=false">Cancel</Button>
                        <Button type="submit" variant="secondary">Save</Button>
                    </div>
                </Form>
            </DialogContent>
        </Dialog>
</template>