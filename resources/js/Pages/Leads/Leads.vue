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
			<template #item="{ item }">
				<tr class="hoverable-row">
					<td>{{ item.name }}</td>
					<td>{{ item.email }}</td>
					<td>{{ item.phone_number }}</td>
					<td>{{ item.industry }}</td>
				</tr>
			</template>
		</v-data-table-server>
	</MainLayout>
</template>

<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import {route} from "ziggy-js";
import {router} from "@inertiajs/vue3";
import {useLeadsTable} from "@/Composibles/Leads/useLeadsTable.js";

const props = defineProps({
	leads: Object,
	filters: Object,
})

const { options, headers } = useLeadsTable(props)
</script>

<style scoped>
.hoverable-row:hover {
	background-color: #e3f2fd;
	cursor: pointer;
}
</style>
