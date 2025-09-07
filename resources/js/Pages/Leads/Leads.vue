<template>
	<MainLayout title="Leads">
		<v-text-field
			prepend-icon="mdi-magnify"
			v-model="props.filters.search"
			label="Search Leads"
			@input="router.get(route('leads'), { search: props.filters.search }, { preserveState: true, replace: true })"
			class="mb-2 mt-4"
			variant="outlined"
		/>
		
		<v-data-table-server
			:items="props.leads.data"
			:items-per-page="options.itemsPerPage"
			:page="options.page"
			:items-length="props.leads.total"
			v-model:options="options"
			:headers="headers"
		>
		</v-data-table-server>
	</MainLayout>
</template>

<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import {computed, ref, watch} from "vue";
import {route} from "ziggy-js";
import {router} from "@inertiajs/vue3";

const props = defineProps({
	leads: Object,
	filters: Object,
})

const options = ref({
	page: props.leads.current_page,
	itemsPerPage: props.leads.per_page,
	sortBy: props.filters.sortBy ? [{key: props.filters.sortBy, order: props.filters.sortOrder}] : [],
})

const headers = computed(() => {
	return [
		{title: 'Name', key: 'name', sortable: true},
		{title: 'Email', key: 'email', sortable: true},
		{title: 'Phone', key: 'phone_number'},
		{title: 'Industry', key: 'industry', sortable: true}
	]
})

watch(options, (newOptions) => {
	router.get(route('leads'), {
		page: newOptions.page,
		per_page: newOptions.itemsPerPage,
		sortBy: newOptions.sortBy[0]?.key,
		sortOrder: newOptions.sortBy[0]?.order,
		search: props.filters.search,
	}, {
		preserveState: true,
		replace: true,
	})
})
</script>
