import { fetchCars, postLap } from "../../utilities/Client/Client";
import {
    parseCarApiResponseToCar,
    parseCarCollectionApiResponseToCars
} from "../../utilities/Parser/CarApiParser";
import { Car } from "../../utilities/Parser/Types";

export const getCars = async (): Promise<Car[]> => {
    const response = await fetchCars();
    return parseCarCollectionApiResponseToCars(response);
}

export const addLap = async (carId: string, lapTime: string): Promise<Car> => {
    const response = (await postLap(carId, lapTime));
    return parseCarApiResponseToCar(response);
}
