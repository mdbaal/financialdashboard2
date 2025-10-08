
<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard, accounts,  } from '@/routes';
import { type BreadcrumbItem } from '@/types';
import { Head, Form, Link } from '@inertiajs/vue3';
import {
  Table,
  TableBody,
  TableCaption,
  TableCell,
  TableHead,
  TableHeader,
  TableRow,
} from '@/components/ui/table';
import CreateAccountForm from '@/components/forms/account/CreateAccountForm.vue';
import { Ellipsis, Delete } from 'lucide-vue-next';
import { destroy } from '@/routes/accounts';
import { show } from '@/routes/account';

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
                <CreateAccountForm :currency-options="currencyOptions" />
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
                        <TableHead><Ellipsis /></TableHead>
                    </TableRow>
                    </TableHeader>
                    <TableBody>
                        <TableRow v-for="account in userAccounts">
                            <TableCell class="font-medium">
                            <Link :href="show(account.id)" class="block">{{ account.account_name }}</Link>
                            </TableCell>
                            <TableCell>{{ account.account_number }}</TableCell>
                            <TableCell>{{account.currency + account.balance }}</TableCell>
                            <TableCell class="w-[10px]">
                                <Form :action="destroy()">
                                    <input name="id" hidden :value="account.id"/>
                                    <button class="hover:cursor-pointer" type="submit"><Delete/></button>
                                </Form>
                            </TableCell>
                        </TableRow>
                    </TableBody>
                </Table>
            </div>
            
        </div>
    </AppLayout>
</template>
