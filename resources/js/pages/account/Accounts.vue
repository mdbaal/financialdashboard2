
<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard, accounts,  } from '@/routes';
import { type BreadcrumbItem } from '@/types';
import { Form, Head } from '@inertiajs/vue3';
import {
  Table,
  TableBody,
  TableCaption,
  TableCell,
  TableHead,
  TableHeader,
  TableRow,
} from '@/components/ui/table';

import {
  Dialog,
  DialogContent,
  DialogDescription,
  DialogFooter,
  DialogHeader,
  DialogTitle,
  DialogTrigger,
} from '@/components/ui/dialog';

import { Button } from '@/components/ui/button';

import { store } from '@/routes/accounts/';
 
defineProps({
    userAccounts: Object,
    currencyOptions: Object,
});

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: dashboard().url,
    },
    {
        title: 'Accounts',
        href: accounts().url,
    }
];
</script>

<template>
    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="p-10 h-full">
            <div class="flex justify-between my-5 ">
                <h2 class="text-2xl">Accounts</h2>
                <div>
                    <Dialog>
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

                            <Form :action="store()" class="flex flex-col gap-5" #default="{ errors }">
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
                                <button type="submit">Save</button>
                            </Form>

                            <DialogFooter>

                            </DialogFooter>
                        </DialogContent>
                    </Dialog>
                </div>
            </div>
            <div class="h-full">
                <Table>
                    <TableCaption>Your account.</TableCaption>
                    <TableHeader>
                    <TableRow>
                        <TableHead>
                        Account
                        </TableHead>
                        <TableHead>Account Number</TableHead>
                        <TableHead>Balance</TableHead>
                    </TableRow>
                    </TableHeader>
                    <TableBody>
                    <TableRow v-for="account in userAccounts">
                        <TableCell class="font-medium">
                        {{ account.account_name }}
                        </TableCell>
                        <TableCell>{{ account.account_number }}</TableCell>
                        <TableCell>{{account.currency + account.balance }}</TableCell> 
                    </TableRow>
                    </TableBody>
                </Table>
            </div>
            
        </div>
    </AppLayout>
</template>
