<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import {dashboard,} from '@/routes';
import {type BreadcrumbItem} from '@/types';
import {Form, Head} from '@inertiajs/vue3';
import {Table, TableBody, TableCaption, TableCell, TableHead, TableHeader, TableRow,} from '@/components/ui/table';
import {Delete, Ellipsis} from 'lucide-vue-next';
import {destroy, index} from '@/routes/categories';
import CreateCategoryForm from "@/components/forms/category/CreateCategoryForm.vue";
import {ref} from "vue";
import EditCategoryForm from "@/components/forms/category/EditCategoryForm.vue";

const props = defineProps({
  categories: {
    type: Object,
    required: true
  }
});

const breadcrumbs: BreadcrumbItem[] = [
  {
    title: 'Dashboard',
    href: dashboard().url,
  },
  {
    title: 'Categories',
    href: index().url,
  }
];

const categoryViewed = ref(props.categories[0]);
const categoryEditOpen = ref(false);

</script>

<template>
  <Head title="Dashboard"/>

  <AppLayout :breadcrumbs="breadcrumbs">
    <div class="p-10 h-full">
      <div class="flex justify-between my-5 ">
        <h2 class="text-2xl">Categories</h2>
        <CreateCategoryForm/>
      </div>
      <div class="h-full">
        <Table>
          <TableCaption>Categories</TableCaption>
          <TableHeader>
            <TableRow>
              <TableHead>
                Category
              </TableHead>
              <TableHead>Color</TableHead>
              <TableHead>Transactions</TableHead>
              <TableHead>
                <Ellipsis/>
              </TableHead>
            </TableRow>
          </TableHeader>
          <TableBody>
            <TableRow v-for="category in categories" :key="category.id">
              <TableCell class="font-medium" @click="categoryEditOpen=true">
                {{ category.name }}
              </TableCell>
              <TableCell>
                <div class="w-[50px] h-[25px] rounded border-2 border-white"
                     :style="'background-color:' + category.color + ';'"
                ></div>
              </TableCell>
              <TableCell>{{ category.transactions.length }}</TableCell>
              <TableCell class="w-[10px]">
                <Form :action="destroy()">
                  <input name="id" hidden :value="category.id"/>
                  <button class="hover:cursor-pointer" type="submit">
                    <Delete/>
                  </button>
                </Form>
              </TableCell>
            </TableRow>
          </TableBody>
        </Table>
      </div>
      <EditCategoryForm
          v-if="categoryViewed"
          v-model="categoryEditOpen"
          :viewed-category="categoryViewed"
      />
    </div>
  </AppLayout>
</template>
