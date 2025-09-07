import {computed} from "vue"

export function useLeadsTable(props) {
	const headers = computed(() => [
		{title: "Name", key: "name", sortable: true},
		{title: "Email", key: "email", sortable: true},
		{title: "Phone", key: "phone_number"},
		{title: "Industry", key: "industry", sortable: true},
	])

	return {
		headers,
	}
}
