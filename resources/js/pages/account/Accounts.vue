
<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard, accounts } from '@/routes';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
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

defineProps({
    userAccounts: Object,
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
            <div class="flex justify-between my-5">
                <h2 class="text-2xl">Accounts</h2>
                <Button>Create new</Button>
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
            <div>
                
            </div>
        </div>
    </AppLayout>
</template>
