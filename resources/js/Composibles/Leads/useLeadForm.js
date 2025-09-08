import { reactive, onMounted } from "vue"

export function useLeadForm(props, emit) {
	const state = reactive({
		lead: {},
		loading: false,
		formIsValid: false,
		recordTypes: [
			{ title: "Lead", value: "lead" },
			{ title: "Prospect", value: "prospect" },
			{ title: "Client", value: "client" },
		],
	})

	const rules = {
		required: (v) => !!v || "This field is required",
	}

	function onSubmit() {
		emit("submit", state.lead)
	}

	onMounted(() => {
		state.lead = { ...props.lead }
	})

	return {
		state,
		rules,
		onSubmit,
	}
}
