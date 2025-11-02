<template>
    <section class="mt-4">
        <v-data-table
            :items="state.contacts"
            :loading="state.loading"
            class="elevation-1"
        ></v-data-table>
    </section>
</template>

<script setup>
import { reactive } from 'vue'

const state = reactive({
    contacts: [
        {
            id: 1,
            name: 'John Doe',
            email: 'john.doe@example.com',
            telephone: '07123456789',
            primary: true
        },
        {
            id: 2,
            name: 'Jane Smith',
            email: 'jane.smith@example.com',
            telephone: '01258456789',
            primary: false
        }
    ],
    loading : false,
})
</script>