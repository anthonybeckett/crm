<template>
	<Head :title="props.title"/>

	<AuthenticatedLayout>
		<v-card class="" :title="props.title">
			<template #text>
				<slot />
			</template>
		</v-card>
	</AuthenticatedLayout>
</template>

<script setup lang="ts">
import {Head} from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

const props = defineProps({
	title: {
		type: String,
		required: true,
	}
})
</script>
