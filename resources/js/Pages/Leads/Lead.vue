<template>
	<MainLayout :title="props.lead.name">
		<ShowLeadForm :lead="props.lead" />
	</MainLayout>
</template>

<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import ShowLeadForm from "@/Components/Leads/ShowLeadForm.vue";

const props = defineProps({
	lead: Object,
	required: true
})
</script>
