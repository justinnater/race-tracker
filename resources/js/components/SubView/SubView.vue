<template>
    <div class="grid-box">
        <div class="subview-header">
            <span>{{ props.activeCar.driver }}</span>
            <div class="switch-button">
                <input type="checkbox" id="toggle" class="toggleCheckbox" v-model="isTrackerEnabled" />
                <label for="toggle" class='toggleContainer'>
                    <div>Form</div>
                    <div>Track</div>
                </label>
            </div>
        </div>
        <div class="subview-content">
            <CarOverview v-if="!isTrackerEnabled" :activeCar="props.activeCar" :updateCar="props.updateCar" />
            <TrackOverview v-else :cars="props.cars" :activeCar="props.activeCar" />
        </div>
    </div>
</template>

<script setup lang="ts">
import { ref } from "vue";
import { SubViewProps } from "./Types";
import CarOverview from "../CarOverview/CarOverview.vue";
import TrackOverview from "../TrackOverview/TrackOverview.vue";

const props = defineProps<SubViewProps>();
const isTrackerEnabled = ref(false);
</script>

<style scoped>
@import "SubView.css";
</style>
