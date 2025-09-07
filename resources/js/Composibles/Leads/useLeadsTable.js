import {ref, computed, watch} from "vue"
import {router} from "@inertiajs/vue3"
import {route} from "ziggy-js"

export function useLeadsTable(props) {
	const options = ref({
		page: props.leads.current_page,
		itemsPerPage: props.leads.per_page,
		sortBy: props.filters.sortBy
			? [{key: props.filters.sortBy, order: props.filters.sortOrder}]
			: [],
	})

	const headers = computed(() => [
		{title: "Name", key: "name", sortable: true},
		{title: "Email", key: "email", sortable: true},
		{title: "Phone", key: "phone_number"},
		{title: "Industry", key: "industry", sortable: true},
	])

	// Sync state changes back to server
	watch(options, (newOptions) => {
		router.get(
			route("leads"),
			{
				page: newOptions.page,
				per_page: newOptions.itemsPerPage,
				sortBy: newOptions.sortBy[0]?.key,
				sortOrder: newOptions.sortBy[0]?.order,
				search: props.filters.search,
			},
			{
				preserveState: true,
				replace: true,
			}
		)
	})

	return {
		options,
		headers,
	}
}
