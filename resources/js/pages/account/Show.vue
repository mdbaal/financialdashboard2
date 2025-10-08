
<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard, accounts,  } from '@/routes';
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
import { destroy } from '@/routes/accounts';
import { Ellipsis } from 'lucide-vue-next';
import EditAccountForm from '@/components/forms/account/EditAccountForm.vue';

const props = defineProps({
    accountViewed: {
        type: Object,
        required: true
    },
    transactions: Object,
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
    },
    {
        title: props.accountViewed.account_name,
        href: accounts().url + '/' + props.accountViewed.id
    }
    
];

</script>

<template>
    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="p-10 h-full">
            <div class="flex justify-between my-5 ">
                <h2 class="text-2xl">{{ accountViewed.account_name }}</h2>
            </div>
            <div>
                <EditAccountForm :current-account="accountViewed" :currency-options="currencyOptions"/>
            </div>
             <Table>
                    <TableCaption>Transactions</TableCaption>
                    <TableHeader>
                    <TableRow>
                        <TableHead>Transaction</TableHead>
                        <TableHead>Description</TableHead>
                        <TableHead>Amount</TableHead>
                        <TableHead><Ellipsis /></TableHead>
                    </TableRow>
                    </TableHeader>
                    <TableBody>
                    <TableRow v-for="transaction in transactions">
                        <TableCell class="font-medium">
                        {{ transaction.name }}
                        </TableCell>
                        <TableCell>{{ transaction.description }}</TableCell>
                        <TableCell>{{transaction.currency + transaction.amount }}</TableCell>
                        <TableCell>
                            <Form :action="destroy()">
                                <input name="id" hidden :value="transaction.id"/>
                                <button type="submit"><Delete/></button>
                            </Form>
                        </TableCell> 
                    </TableRow>
                    </TableBody>
                </Table>
        </div>
    </AppLayout>
</template>
