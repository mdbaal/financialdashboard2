<script setup lang="ts">
import { ref } from 'vue';

import {
    Dialog,
    DialogContent,
    DialogDescription,
    DialogFooter,
    DialogHeader,
    DialogTitle,
    DialogTrigger,
} from '@/components/ui/dialog';

import { Button } from '../ui/button';

import { Form } from '@inertiajs/vue3';

import { store } from '@/routes/accounts';

defineProps({
    currencyOptions: Object
});

const dialogOpen = ref(false);

</script>

<template>
        <Dialog v-model:open="dialogOpen">
            <DialogTrigger>
                <Button variant="secondary">Create new</Button>
            </DialogTrigger>
            <DialogContent>
                <DialogHeader>
                    <DialogTitle>
                        Create new Account
                    </DialogTitle>
                    <DialogDescription>
                        Use the form to create a new account
                    </DialogDescription>
                </DialogHeader>

                <Form :action="store()" class="flex flex-col gap-5" #default="{ errors }" @success="dialogOpen = false">
                    <div class="flex flex-col">
                        <input class="border rounded p-2"  type="text" name="account_name" required/>
                        <span class="text-red-500 font-bold text-sm" v-if="errors['account_name']">{{ errors['account_name'] }}</span>
                    </div>
                    <div class="flex flex-col">
                        <input class="border rounded p-2"  type="text" name="account_number" required/>
                        <span class="text-red-500 font-bold text-sm" v-if="errors['account_number']">{{ errors['account_number'] }}</span>
                    </div>

                    <select  class="border rounded p-2" name="currency">
                        <option v-for="currency in currencyOptions" :value="currency.value">
                            {{ currency.name }}
                        </option>
                    </select>
                    <div class="justify-end flex"><Button type="submit" variant="secondary">Save</Button></div>
                </Form>
            </DialogContent>
        </Dialog>
</template>