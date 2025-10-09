<script setup lang="ts">
import {
    Dialog,
    DialogContent,
    DialogHeader,
    DialogTitle,
} from '@/components/ui/dialog';

import { Button } from '@/components/ui/button';

import { Form } from '@inertiajs/vue3';

import { update } from '@/routes/transactions';
import InputError from '@/components/InputError.vue';
import { Input } from '@/components/ui/input';
import  { Label } from '@/components/ui/label';

defineProps({
    currentAccount: {
        type: Object,
        required: true,
    },
    currentTransaction: {
        type: Object,
        required: true,
    },
});

const model = defineModel({type: Boolean, default: false});
</script>

<template>
        <Dialog v-model:open="model">
            <DialogContent>
                <DialogHeader>
                    <DialogTitle>
                        {{ currentTransaction.name }}
                    </DialogTitle>
                </DialogHeader>
                <Form :action="update({account:currentAccount.id, transaction:currentTransaction.id})" class="flex flex-col gap-5" #default="{ errors }" @success="model = false">
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
                    <div class="justify-end flex"><Button type="submit" variant="secondary">Save</Button></div>
                </Form>
            </DialogContent>
        </Dialog>
</template>