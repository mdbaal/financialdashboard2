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

import { Form } from '@inertiajs/vue3';

import { store } from '@/routes/transactions';

import InputError from '@/components/InputError.vue';
import { Input } from '@/components/ui/input';

defineProps({
   viewedAccount: {
    type: Object,
    required: true,
   }
});

const dialogOpen = ref(false);

</script>

<template>
        <Dialog v-model:open="dialogOpen">
            <DialogTrigger>
                <Button variant="secondary">Create Transaction</Button>
            </DialogTrigger>
            <DialogContent>
                <DialogHeader>
                    <DialogTitle>
                        Create new transacion
                    </DialogTitle>
                    <DialogDescription>
                        Use the form to create a new transaction
                    </DialogDescription>
                </DialogHeader>

                <Form :action="store(viewedAccount.id)" class="flex flex-col gap-5" #default="{ errors }" @success="dialogOpen = false">
                    <div class="flex flex-col">
                        <Input class="border rounded p-2" type="text" name="account_name" required/>
                        <InputError :message="errors['name']"/>
                    </div>
                    <div class="flex flex-col">
                        <textarea class="border rounded p-2"  type="text" name="description" maxlength="500"></textarea>
                        <InputError :message="errors['description']"/>
                    </div>
                    <div class="flex flex-col">
                        <Input class="border rounded p-2"  type="text" name="amount" required/>
                        <InputError :message="errors['amount']"/>
                    </div>
                    <div class="flex flex-col">
                        <Input class="border rounded p-2"  type="text" name="custom_id"/>
                        <InputError :message="errors['custom_id']"/>
                    </div>
                    <div class="justify-end flex"><Button type="submit" variant="secondary">Save</Button></div>
                </Form>
            </DialogContent>
        </Dialog>
</template>