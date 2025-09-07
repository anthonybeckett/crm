<template>
	<MainLayout title="Leads">
		<DataTable
			title="Leads"
			:items="leads"
			:filters="filters"
			:headers="headers"
			route-name="leads"
		>
			<template #row="{ item }">
				<tr class="hoverable-row">
					<td>{{ item.name }}</td>
					<td>{{ item.email }}</td>
					<td>{{ item.phone_number }}</td>
					<td>{{ item.industry }}</td>
				</tr>
			</template>
		</DataTable>
	</MainLayout>
</template>

<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import {useLeadsTable} from "@/Composibles/Leads/useLeadsTable.js";
import DataTable from "@/Components/Generic/Tables/DataTable.vue";

const props = defineProps({
	leads: Object,
	filters: Object,
})

const { headers } = useLeadsTable(props)
</script>

<style scoped>
.hoverable-row:hover {
	background-color: #e3f2fd;
	cursor: pointer;
}
</style>
