<template>
	<MainLayout :title="props.lead.name">
		<v-tabs color="primary" v-model="state.tab">
			<v-tab value="details">Details</v-tab>
			<v-tab value="contacts">Contacts</v-tab>
		</v-tabs>

		<v-divider></v-divider>

		<v-tabs-window v-model="state.tab">
			<v-tabs-window-item key="details" value="details">
				<ShowLeadForm :lead="props.lead" />
			</v-tabs-window-item>

			<v-tabs-window-item key="contacts" value="contacts">
				<Contacts />
			</v-tabs-window-item>
		</v-tabs-window>
	</MainLayout>
</template>

<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import ShowLeadForm from "@/Components/Leads/ShowLeadForm.vue";
import { reactive, ref } from "vue";
import Contacts from "@/Components/Leads/Contacts.vue";

const props = defineProps({
	lead: Object,
	required: true
})

const state = reactive({
	tab: 'details'
})
</script>
