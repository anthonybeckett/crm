<template>
	<v-form v-model="state.formIsValid" @submit.prevent="onSubmit" class="mt-4">
		<v-row dense>
			<v-col cols="6" md="6">
				<v-text-field
					v-model="state.lead.name"
					label="Company Name"
					:rules="[rules.required]"
					required
					variant="outlined"
				/>
			</v-col>

			<v-col cols="6" md="6">
				<v-select
					v-model="state.lead.company_type"
					label="Record Type"
					:rules="[rules.required]"
					required
					variant="outlined"
					:items="state.recordTypes"
				/>
			</v-col>
		</v-row>

		<v-divider class="my-4" />
		<h3 class="text-h6 font-weight-medium mt-2 mb-6">Address</h3>

		<v-row dense>
			<v-col cols="6" md="6">
				<v-text-field
					v-model="state.lead.address_line1"
					label="Address Line 1"
					variant="outlined"
				/>
			</v-col>

			<v-col cols="6" md="6">
				<v-text-field
					v-model="state.lead.address_line2"
					label="Address Line 2"
					variant="outlined"
				/>
			</v-col>
		</v-row>

		<v-row dense>
			<v-col cols="6" md="6">
				<v-text-field
					v-model="state.lead.city"
					label="Town/City"
					variant="outlined"
				/>
			</v-col>

			<v-col cols="6" md="6">
				<v-text-field
					v-model="state.lead.state"
					label="County"
					variant="outlined"
				/>
			</v-col>
		</v-row>

		<v-row dense>
			<v-col cols="6" md="6">
				<v-text-field
					v-model="state.lead.postal_code"
					label="Postcode"
					variant="outlined"
				/>
			</v-col>

			<v-col cols="6" md="6">
				<v-text-field
					v-model="state.lead.country"
					label="Country"
					variant="outlined"
				/>
			</v-col>
		</v-row>

		<v-divider class="my-4" />
		<h3 class="text-h6 font-weight-medium mt-2 mb-6">Company Information</h3>

		<v-row dense>
			<v-col cols="6" md="6">
				<v-text-field
					v-model="state.lead.company_number"
					label="Company Number"
					variant="outlined"
				/>
			</v-col>

			<v-col cols="6" md="6">
				<v-text-field
					v-model="state.lead.industry"
					label="Industry"
					variant="outlined"
				/>
			</v-col>
		</v-row>

		<v-row dense>
			<v-col cols="6" md="6">
				<v-text-field
					:model-value="moment(state.lead.created_at).format('DD-MM-YYYY HH:mm:ss')"
					label="Created Date"
					variant="outlined"
					readonly
				/>
			</v-col>

			<v-col cols="6" md="6">
				<v-text-field
					v-if="state.lead.created_at !== state.lead.updated_at"
					:model-value="moment(state.lead.updated_at).format('DD-MM-YYYY HH:mm:ss')"
					label="Last Updated"
					variant="outlined"
					readonly
				/>
			</v-col>
		</v-row>
	</v-form>
</template>

<script setup>
import {useLeadForm} from "@/Composibles/Leads/useLeadForm.js";
import moment from "moment";

const emit = defineEmits(["submit"])

const props = defineProps({
	lead: Object,
	required: true
});

const { state, rules, onSubmit } = useLeadForm(props, emit);
</script>
