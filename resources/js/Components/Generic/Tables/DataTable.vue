<template>
	<div>
		<v-text-field
			v-if="showSearch"
			prepend-icon="mdi-magnify"
			v-model="filters.search"
			:label="`Search ${title}`"
			@input="onSearch"
			class="mb-2 mt-4"
			variant="outlined"
		/>

		<v-data-table-server
			:items="items.data"
			:items-per-page="options.itemsPerPage"
			:page="options.page"
			:items-length="items.total"
			v-model:options="options"
			:headers="headers"
		>
			<template #item="{ item }">
				<slot name="row" :item="item">
					<tr>
						<td v-for="header in headers" :key="header.key">
							{{ item[header.key] }}
						</td>
					</tr>
				</slot>
			</template>
		</v-data-table-server>
	</div>
</template>

<script setup>
import { router } from "@inertiajs/vue3"
import { route } from "ziggy-js"
import { ref, watch } from "vue"

const props = defineProps({
	title: String,
	items: Object,
	filters: Object,
	headers: Array,
	routeName: String,
	showSearch: { type: Boolean, default: true },
})

const options = ref({
	page: props.items.current_page,
	itemsPerPage: props.items.per_page,
	sortBy: props.filters.sortBy
		? [{ key: props.filters.sortBy, order: props.filters.sortOrder }]
		: [],
})

watch(options, (newOptions) => {
	console.log(props)
	router.get(
		route(props.routeName),
		{
			page: newOptions.page,
			per_page: newOptions.itemsPerPage,
			sortBy: newOptions.sortBy[0]?.key,
			sortOrder: newOptions.sortBy[0]?.order,
			search: props.filters.search,
		},
		{ preserveState: true, replace: true }
	)
})

function onSearch() {
	router.get(
		route(props.routeName),
		{ search: props.filters.search },
		{ preserveState: true, replace: true }
	)
}
</script>
