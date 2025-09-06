<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Home" />

    <AuthenticatedLayout>
		<v-card class=""  title="Home">
			<template #text>
				Welcome to the CRM!
			</template>
		</v-card>
    </AuthenticatedLayout>
</template>
