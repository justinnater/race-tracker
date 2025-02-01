<template>
    <main>
        <div id="main-content">
            <CarListing :active-car="activeCar" :cars="cars" :setActiveCar="setActiveCar" />
            <template v-if="activeCar">
                <SubView :activeCar="activeCar" :updateCar="updateCar" :cars="cars" />
            </template>
        </div>
    </main>
</template>

<script setup lang="ts">
import { onMounted, ref } from "vue";
import { getCars } from "./Main.helper";
import { Car } from "../../utilities/Parser/Types";
import CarListing from "../CarListing/CarListing.vue";
import SubView from "../SubView/SubView.vue";

const cars = ref<Car[]>([]);
const activeCar = ref<Car | null>(null);

const setActiveCar = (car: Car) => {
    activeCar.value = car;
};

const updateCar = (car: Car, props: Partial<Car> = {}) => {
    const index = cars.value.findIndex((c) => c.id === car.id);
    cars.value[index] = { ...car, ...props };
    activeCar.value = cars.value[index];
};

onMounted(async () => {
    cars.value = await getCars();
    activeCar.value = cars.value[0] || null;
});

</script>

<style scoped>
@import "Main.css";
</style>
