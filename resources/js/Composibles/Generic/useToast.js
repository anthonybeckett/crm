import {inject} from "vue";



export function useToast() {
	const showToast = inject('showToast')

	function success(message) {
		showToast(message);
	}

	function error(message) {
		showToast(message, "error");
	}

	return {success, error};
}
