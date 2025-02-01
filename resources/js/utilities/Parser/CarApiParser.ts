/** This file is responsible for mapping the Car JSON API Response to the objects as we expect them in the front-end. */

import { CarApiResponse, CarCollectionApiResponse, CarResponse, LapTimeResponse } from "../Client/Zod";
import { Car, LapTime } from "./Types";

/**
 * Parse the Car Schema to a CarModel
 *
 * @param car The Car Schema
 *
 * @returns CarModel The CarModel
 */
export const parseCar = (car: CarResponse): Car => {
    return {
        id: car.id,
        number: car.attributes.number,
        driver: car.attributes.driver,
        model: car.attributes.model,
        team: car.attributes.team,
        color: car.attributes.color,
        averageLapTime: car.attributes.average_lap_time,
        lapTimes: [],
    };
};

/**
 * Parse the LapTime Schema to a LapTimeModel
 *
 * @param lapTime The LapTime Schema
 *
 * @returns LapTimeModel The LapTimeModel
 */
export const parseLapTime = (lapTime: LapTimeResponse): LapTime => {
    return {
        lapNumber: lapTime.attributes.lap_number,
        lapTime: lapTime.attributes.lap_time
    };
};

/**
 * Parse the Car API Response to an array of CarModels
 *
 * @param response The Car API Response
 *
 * @returns CarModel[] The array of CarModels
 */
export const parseCarCollectionApiResponseToCars = (response: CarCollectionApiResponse): Car[] => {
    return response.data.map((car) => {
        const carModel = parseCar(car);

        const lapTimes = car.relationships.lap_times.data
            .map((relation) => response.included.find((lapTime) => lapTime.id === relation.id))
            .filter((lapTime) => lapTime !== undefined);

        lapTimes.forEach((lapTime) => carModel.lapTimes.push(parseLapTime(lapTime)));

        return carModel;
    });
};

export const parseCarApiResponseToCar = (response: CarApiResponse): Car => {
    const carModel = parseCar(response.data);
    const lapTimes = response.data.relationships.lap_times.data
        .map((relation) => response.included.find((lapTime) => lapTime.id === relation.id))
        .filter((lapTime) => lapTime !== undefined);

    lapTimes.forEach((lapTime) => carModel.lapTimes.push(parseLapTime(lapTime)));

    return carModel;
}


