import axios from "axios";
import {
    CarApiResponse, CarApiResponseSchema,
    CarCollectionApiResponse,
    CarCollectionApiResponseSchema,
} from "./Zod";

/**
 * Fetches a list of cars from the API as a JSON API Schema.
 */
export async function fetchCars(): Promise<CarCollectionApiResponse> {
    try {
        const response = await axios.get("/api/car");

        const data =  response.data;
        const parsedResponse = CarCollectionApiResponseSchema.safeParse(data);

        if (!parsedResponse.success) throw new Error("Invalid API response");

        return parsedResponse.data;
    } catch (error) {
        console.error("Error fetching cars:", error);
        throw error;
    }
}

/**
 * Add a lap to a car.
 */
export async function postLap(carId: string, lapTime: string): Promise<CarApiResponse> {
    try {
        const response = await axios.post(`/api/laptime/${carId}`, {
            lap_time: lapTime
        });

        const data =  response.data;
        const parsedResponse = CarApiResponseSchema.safeParse(data);

        if (!parsedResponse.success) throw new Error("Invalid API response");

        return parsedResponse.data;
    } catch (error) {
        console.error("Error adding lap:", error);
        throw error;
    }
}
