
<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard, accounts,  } from '@/routes';
import { type BreadcrumbItem } from '@/types';
import { Head, Form } from '@inertiajs/vue3';
import {
  Table,
  TableBody,
  TableCaption,
  TableCell,
  TableHead,
  TableHeader,
  TableRow,
} from '@/components/ui/table';
import { destroy } from '@/routes/transactions';
import { Ellipsis, Delete } from 'lucide-vue-next';
import EditAccountForm from '@/components/forms/account/EditAccountForm.vue';
import CreateTransactionForm from '@/components/forms/transaction/CreateTransactionForm.vue';
import EditTransactionForm from '@/components/forms/transaction/EditTransactionForm.vue';
import { ref } from 'vue';

const props = defineProps({
    accountViewed: {
        type: Object,
        required: true
    },
    transactions: {
        type: Object,
        required: true,
    },
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

const dialogOpen = ref(false);
const transactionViewed = ref(props.transactions[0]);

</script>

<template>
    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="p-10 h-full">
            <div class="flex my-5 ">
                <h2 class="text-2xl">{{ accountViewed.account_name }}</h2>
            </div>
            <div> 
                <EditAccountForm :current-account="accountViewed" :currency-options="currencyOptions"/>
                
            </div>

            <div class="flex flex-col gap-2 mt-10">
                <div>
                    <CreateTransactionForm :current-account="accountViewed"></CreateTransactionForm>
                </div>
                <Table>
                    <TableCaption>Transactions</TableCaption>
                    <TableHeader>
                    <TableRow>
                        <TableHead>Transaction</TableHead>
                        <TableHead>Description</TableHead>
                        <TableHead>Amount</TableHead>
                        <TableHead>Custom Identifier</TableHead>
                        <TableHead>Date</TableHead>
                        <TableHead><Ellipsis /></TableHead>
                    </TableRow>
                    </TableHeader>
                    <TableBody>
                    <TableRow v-for="transaction in transactions">
                        <TableCell class="font-medium" @click="transactionViewed=transaction;dialogOpen=true">
                        {{ transaction.name }}
                        </TableCell>
                        <TableCell>{{ transaction.description }}</TableCell>
                        <TableCell>{{transaction.currency + transaction.amount }}</TableCell>
                        <TableCell>{{transaction.custom_id }}</TableCell>
                        <TableCell>{{transaction.date }}</TableCell>
                        <TableCell>
                            <Form :action="destroy(accountViewed.id)">
                                <input name="id" hidden :value="transaction.id"/>
                                <button type="submit" class="hover:cursor-pointer"><Delete/></button>
                            </Form>
                        </TableCell> 
                    </TableRow>
                    </TableBody>
                </Table>
                <EditTransactionForm
                    v-model="dialogOpen"
                    :current-account="accountViewed"
                    :current-transaction="transactionViewed"
                /> 
            </div>
        </div>
    </AppLayout>
</template>
