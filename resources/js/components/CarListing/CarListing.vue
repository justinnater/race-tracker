<template>
    <div class="grid-box main-box">
        <table class="car-table">
            <thead>
            <tr>
                <th>Car Number</th>
                <th>Driver</th>
                <th>Model</th>
                <th>Team</th>
                <th>Avg Lap Time</th>
            </tr>
            </thead>
            <tbody>
            <tr v-if="cars.length === 0">
                <td colspan="5" class="no-cars">No cars found. Please seed the database php artisan db:seed'.</td>
            </tr>
            <tr
                v-else
                v-for="car in cars"
                :key="car.id"
                :class="{ 'active-row': car === activeCar }"
                @click="setActiveCar(car)"
            >
                <td>{{ car.number }}</td>
                <td>{{ car.driver }}</td>
                <td>{{ car.model }}</td>
                <td>{{ car.team }}</td>
                <td>{{ car.averageLapTime }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script setup lang="ts">

import { CarListingProps } from "./Types";

defineProps<CarListingProps>();

</script>


<style scoped>
@import "CarListing.css";
</style>
