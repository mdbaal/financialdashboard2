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
} from '@/components/ui/table'

import { Button } from '@/components/ui/button';

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
                    <TableCaption>A list of your recent invoices.</TableCaption>
                    <TableHeader>
                    <TableRow>
                        <TableHead class="w-[100px]">
                        Invoice
                        </TableHead>
                        <TableHead>Status</TableHead>
                        <TableHead>Method</TableHead>
                        <TableHead class="text-right">
                        Amount
                        </TableHead>
                    </TableRow>
                    </TableHeader>
                    <TableBody>
                    <TableRow>
                        <TableCell class="font-medium">
                        INV001
                        </TableCell>
                        <TableCell>Paid</TableCell>
                        <TableCell>Credit Card</TableCell>
                        <TableCell class="text-right">
                        $250.00
                        </TableCell>
                    </TableRow>
                    </TableBody>
                </Table>
            </div>
        </div>
    </AppLayout>
</template>
