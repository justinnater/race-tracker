<template>
    <div class="car-overview">
        <div class="table-container">
            <table class="car-table">
                <thead>
                <tr>
                    <th>Lap Number</th>
                    <th>Time</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="lap in activeCar.lapTimes" :key="lap.lapNumber">
                    <td>{{ lap.lapNumber }}</td>
                    <td>{{ lap.lapTime.slice(4) }}</td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="add-lap-time">
            <input
                type="number"
                v-model.number="newLapTime"
                placeholder="Enter seconds (60-90) (Ex: 76.123)"
            />
            <button  @click="addLapTime">Add Lap Time</button>
        </div>
    </div>
</template>

<script setup lang="ts">
import { nextTick, ref } from "vue";
import { CarOverviewProps } from "./Types";
import { formatLapTime, validInput } from "./CarOverview.helper";
import { addLap } from "../Main/Main.helper";

const props = defineProps<CarOverviewProps>();

const newLapTime = ref<number | null>(null);

const addLapTime = () => {
    const lapTime = newLapTime.value;
    if (lapTime && validInput(lapTime)) {
        addLap(props.activeCar.id, formatLapTime(lapTime)).then((car) => {
            props.updateCar(props.activeCar, car);
            newLapTime.value = null;
            nextTick(() => {
                const table = document.querySelector(".table-container");
                table?.scrollTo({ top: table.scrollHeight, behavior: "smooth" });
            })
        })
    } else {
        alert("Please enter a valid lap time between 60-90\n\nExample: 76.123\n\nProper UI rendering of errors should be implemented");
    }
};
</script>

<style scoped>
@import "../../../css/button.css";
@import "CarOverview.css";
</style>
