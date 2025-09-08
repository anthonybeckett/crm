import {computed} from "vue"
import {route} from "ziggy-js";
import {router} from "@inertiajs/vue3";

export function useLeadsTable(props) {
	const headers = computed(() => [
		{title: "Name", key: "name", sortable: true},
		{title: "Email", key: "email", sortable: true},
		{title: "Phone", key: "phone_number"},
		{title: "Industry", key: "industry", sortable: true},
	])

	const goToRecord = (row) => {
		router.get(route('lead.show', row.id));
	}

	return {
		headers,
		goToRecord
	}
}
